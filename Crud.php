<?php
//一键生成后台CRUD模板
define('APPROOT',__DIR__."/shuipf/Application/Admin/");
date_default_timezone_set('Asia/Shanghai');
class crud {
    private $tableName = 'links';
    private $tableComment = null;
    private $controllerName = null;
    private $config = ['form_ignore_columns'=>['id','create_time','update_time','addtime','updatetime']];
    private $pdo = null;
    private $tableInfo = null;
    private $columnsInfo = null;

    function __construct($config,$tableName = null){
        if(!$tableName){
            die();
        }else{
            $this->tableName = $tableName;
        }
        $this->config = array_merge($this->config,$config);
        try{
            $this->pdo = new PDO("mysql:host=".$this->config['DB_HOST'].";dbname=".$this->config['DB_NAME'].";port=3306;",$this->config['DB_USER'],$this->config['DB_PWD']);
            $this->pdo->exec('set names utf8;');
            $this->getTableInfo();
            $this->getColumnsInfo();
        }catch(PDOException $e){
            print $e->getMessage();
            die();
        }
        $this->controllerName = ucfirst(strtolower($this->tableName));
    }
    function getTableInfo(){
        $sql = "SELECT * FROM `information_schema`.`tables` "
                . "WHERE TABLE_SCHEMA = '".$this->config['DB_NAME']."' AND table_name = '".$this->config['DB_PREFIX'].$this->tableName."' ";
        try{
            $res = $this->pdo->query($sql);
            $this->tableInfo = $res->fetch();
            if(empty($this->tableInfo)){
                echo "Error!\n table isn't exist!!\n";exit;
            }
            $this->tableComment = ($this->tableInfo['TABLE_COMMENT']?$this->tableInfo['TABLE_COMMENT']:$this->tableName);
        }catch(PDOException $e){
            throw $e;
        }
        echo "get Table Info success!\n";
        return true;
    }
    function getColumnsInfo(){
        $sql = "SELECT * FROM `information_schema`.`columns` "
                . "WHERE TABLE_SCHEMA = '".$this->config['DB_NAME']."' AND table_name = '".$this->config['DB_PREFIX'].$this->tableName."' "
                . "ORDER BY ORDINAL_POSITION";
        try{
            $res = $this->pdo->query($sql);
            $this->columnsInfo = $res->fetchAll();
        }catch(PDOException $e){
            throw $e;
        }
        echo "get Columns Info success";
        return true;
    }
    function generateAdd(){
        $template = file_get_contents(APPROOT."/Template/add.php");
        $data =[
            '{{controller}}'=>$this->controllerName,
            '{{table}}'=>$this->tableInfo['TABLE_COMMENT'].'列表',
            '{{content}}'=>$this->generateForm()
        ];
        $content = str_replace(array_keys($data),array_values($data),$template);
        $path = APPROOT."/View//".$this->controllerName."/add.php";
        $this->writeToFile($content,$path);
    }
    function generateEdit(){
        $template = file_get_contents(APPROOT."/Template/edit.php");
        $data =[
            '{{controller}}'=>$this->controllerName,
            '{{table}}'=>$this->tableInfo['TABLE_COMMENT'].'列表',
            '{{content}}'=>$this->generateForm(true)
        ];
        $content = str_replace(array_keys($data),array_values($data),$template);
        $path = APPROOT."/View//".$this->controllerName."/edit.php";
        $this->writeToFile($content,$path);
    }
    function generateIndex(){
        $template = file_get_contents(APPROOT."/Template/index.php");
        $theader = [];
        $tbody = [];
        foreach($this->columnsInfo as $row){
            $columnName = $row['COLUMN_COMMENT']?$row['COLUMN_COMMENT']:$row['COLUMN_NAME'];
            $theader[] = '
                <td align="center">'.$columnName.'</td>';
            if(in_array($row['COLUMN_NAME'],['create_time','update_time','addtime','updatetime'])){
                $tbody[] ='
                    <td align="center">{$vo.'.$row['COLUMN_NAME'].'|date="Y-m-d H:i:s",###}</td>';
            }else{
                $tbody[] ='
                    <td align="center">{$vo.'.$row['COLUMN_NAME'].'}</td>';
            }
        }
        $theader[] = '
            <td align="center">操作</td>';
        $tbody[] = '
            <td align="center"><a href="{:U(\'Admin/'.$this->controllerName.'/edit\', array(\'id\'=>$vo[\'id\']))}">[修改]</a>&nbsp;|&nbsp;<a
                            href="{:U(\'Admin/'.$this->controllerName.'/delete\', array(\'id\'=>$vo[\'id\']))}" class="J_ajax_del">[删除]</a></td>';
        $data =[
            '{{controller}}'=>$this->controllerName,
            '{{table}}'=>$this->tableInfo['TABLE_COMMENT'].'列表',
            '{{theader}}'=>implode("",$theader),
            '{{tbody}}'=>implode("",$tbody)
        ];
        $content = str_replace(array_keys($data),array_values($data),$template);
        $path = APPROOT."/View//".$this->controllerName."/index.php";
        $this->writeToFile($content,$path);
    }
    function generateController(){
        $template = file_get_contents(APPROOT."/Template/Controller.php");
        $data = [
            '{{datetime}}'=>date("Y-m-d H:i:s"),
            '{{controllerName}}'=>$this->controllerName,
            '{{tableName}}'=>$this->tableComment
        ];
        $content = str_replace(array_keys($data),array_values($data),$template);
        $path = APPROOT."/Controller//".$this->controllerName."Controller.class.php";
        $this->writeToFile($content,$path);
    }
    function generateModel(){
        $template = file_get_contents(APPROOT."/Template/Model.php");
        $data = [
            '{{datetime}}'=>date("Y-m-d H:i:s"),
            '{{controllerName}}'=>$this->controllerName,
            '{{tableName}}'=>$this->tableComment
        ];
        $content = str_replace(array_keys($data),array_values($data),$template);
        $path = APPROOT."/Model//".$this->controllerName."Model.class.php";
        $this->writeToFile($content,$path);
    }
    function generateForm($edit = false){
        $form = [];
        foreach($this->columnsInfo as $row){
            if(in_array($row['COLUMN_NAME'],$this->config['form_ignore_columns'])){continue;}
            if(in_array($row['DATA_TYPE'],['int','tinyint','smallint','mediumint'])){
                $form[] ='
                <tr>
                    <th width="147">'.($row['COLUMN_COMMENT']?$row['COLUMN_COMMENT']:$row['COLUMN_NAME']).'</th>
                    <td>
                    <input type="number" class="input" name="'.$row['COLUMN_NAME'].'" value="'.($edit?"{\$data.".$row['COLUMN_NAME']."}":"").'" '.($row['IS_NULLABLE']=='NO'?'required="required"':'').'>
                    </td>
                </tr>';
            }elseif(in_array($row['DATA_TYPE'],['text','tinytext','longtext','mediumtext'])){
                $form[] ='
                <tr>
                    <th width="147">'.($row['COLUMN_COMMENT']?$row['COLUMN_COMMENT']:$row['COLUMN_NAME']).'</th>
                    <td>
                        <script type="text/plain" id="'.$row['COLUMN_NAME'].'" name="'.$row['COLUMN_NAME'].'">'.($edit?"{\$data.".$row['COLUMN_NAME']."}":"").'</script>
                        <?php echo Form::editor("'.$row['COLUMN_NAME'].'","full","Cudatabase"); ?> 
                    </td>
                </tr>';
            }elseif(in_array($row['DATA_TYPE'],['varchar'])){
                $form[] ='
                <tr>
                    <th width="147">'.($row['COLUMN_COMMENT']?$row['COLUMN_COMMENT']:$row['COLUMN_NAME']).'</th>
                    <td>
                        <input type="text" maxlength="'.$row['CHARACTER_MAXIMUM_LENGTH'].'" class="input" name="'.$row['COLUMN_NAME'].'" value="'.($edit?"{\$data.".$row['COLUMN_NAME']."}":"").'" '.($row['IS_NULLABLE']=='NO'?'required="required"':'').'>
                    </td>
                </tr>';
            }else{
                $form[] ='
                <tr>
                    <th width="147">'.($row['COLUMN_COMMENT']?$row['COLUMN_COMMENT']:$row['COLUMN_NAME']).'</th>
                    <td>
                    <input type="text" class="input" name="'.$row['COLUMN_NAME'].'" value="'.($edit?"{\$data.".$row['COLUMN_NAME']."}":"").'" '.($row['IS_NULLABLE']=='NO'?'required="required"':'').'>
                    </td>
                </tr>';
            }
        }
        return implode("",$form);
    }
    function writeToFile($content,$path){
        if (!is_dir(dirname($path)))
        {
            mkdir(dirname($path), 0755, true);
        }
        echo "\n ------ \n generate file ".$path;
        return file_put_contents($path,$content);
    }
    function __destruct(){
        $this->pdo = null;
    }
}
$param = getopt('t:');
if(empty($param) || !array_key_exists('t',$param)){
    echo "Error!!\n";
    echo " Usage:  php Crud.php -t <table name> \n";exit;
}
if($param['t'] ==''){
    echo "please input table name!\n"; exit;
}
$db_config = require(__DIR__.'/shuipf/Common/Conf/dataconfig.php');
$crud = new crud($db_config,$param['t']);
$crud->generateController();
$crud->generateModel();
$crud->generateAdd();
$crud->generateEdit();
$crud->generateIndex();
