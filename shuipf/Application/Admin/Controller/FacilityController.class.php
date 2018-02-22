<?php
namespace Admin\Controller;

use Common\Controller\AdminBase;

require 'vendor/autoload.php';
use Admin\Service\User;
use League\Csv\Writer;
use PDO;
use SplTempFileObject;

class FacilityController extends AdminBase
{
    protected $Page_Size = 20;

    protected $bespeak = null;

    protected function _initialize()
    {
        parent::_initialize();
        $this->bespeak = D('Admin/Bespeak');
    }

    public function lists()
    {
        $pagenum = I('get.page', '1', '');
        $where = self::_search();
        $count = D('Admin/Bespeak')->where($where)->count();
        $page = new \Libs\Util\Page($count, $this->Page_Size, $pagenum);
        $page->SetPager('sellercenter', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        $data = D('Admin/Bespeak')->where($where)->page($pagenum . ',' . $this->Page_Size)->order("appointment_time desc,id desc")->select();
        
        foreach ($data as $key => $value) {
            $data[$key]['tel']=explode(',',$value['tel']);
             $data[$key]['credential_no']=explode(',',$value['credential_no']);
            switch ($value['tablename']) {
                case 'Active':
                    $data[$key]['them'] = M('Active')->where(array('id' => $value['tab_cid']))->getField('training_title');
                    break;
                case 'active':
                    $data[$key]['them'] = M('Active')->where(array('id' => $value['tab_cid']))->getField('training_title');
                    break;
                default:
                case 'Comartcenter':
                    $data[$key]['them'] = M('Comartcenter')->where(array('id' => $value['tab_cid']))->getField('cac_name');
                    break;
                case 'Library':
                    $data[$key]['them'] = M('Library')->where(array('id' => $value['tab_cid']))->getField('name');
                    break;
                    # code...
                    break;
            }
        }
        // echo D('Admin/Bespeak')->getLastsql();exit;
        $pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
       // var_dump($data);exit;
        $this->assign('data', $data);
        $this->assign('pageinfo', $pageinfo);
        $this->display();

    }

    public function export()
    {
        //获取查询条件
        $where = self::_search();
        //获取待执行的sql语句
        $sql = D('Admin/Bespeak')->field("id,tablename,permanent_name,permanent_address,document_type,credential_no,tel,email,attendance_num,adult_num,student_num,elder_num,child_num,appointment_time,time_interval,addtime")->where($where)->buildSql();
        try {
            //配置PDO模式的数据库链接
            $dbh = new PDO('mysql:dbname=' . C('DB_NAME') . ';host=' . C('DB_HOST'), C('DB_USER'), C('DB_PWD'));
            //修改字符集
            $dbh->exec("SET names utf8");
            //执行sql,获取结果集
            $sth = $dbh->prepare($sql);
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute();
        } catch (PDOException $e) {
            throw new PDOException("Error  : " . $e->getMessage());
        }
        //创建CSV对象
        $csv = Writer::createFromFileObject(new SplTempFileObject());
        //设置字符集
        $csv->setEncodingFrom('GBK');
        //插入标题
        $csv->insertOne(['序号', '馆名类别', '预约人姓名', '户籍', '证件类型', '证件号', '联系电话', '电子邮箱', '预约参观人数', '成人', '学生', '老人', '小孩', '预约参观日期', '时段', '时间']);
        $csv->insertAll($sth);
        //客户端下载文件
        $csv->output(date("Y-m-d") . '参加预约.csv');
        exit;
    }

    private function _search()
    {
        $area_id = \Admin\Service\User::getInstance()->area;
        //var_dump($area_id);exit;
        $level = D('Admin/area')->getUserLevel($area_id);
        $condition = array();
        $condition['isdelete'] = 0;
        $comm = array();
        switch ($level) {
            case '100':
                $condition['area'] = array('between', array($area_id, $area_id + 100));
                break;
            case '10000':
                $condition['area'] = array('between', array($area_id, $area_id + 10000));
                break;
            case '1000000':
                $condition['area'] = array('between', array($area_id, $area_id + 1000000));
                break;
            default:
                # code...
                break;
        }

        return $condition;
    }

    public function breakshow()
    {
        $id = I('id');
        $data = M('Bespeak')->where(array('id' => $id))->find();
        $data['tel']=explode(',',$data['tel']);
        $data['credential_no']=explode(',',$data['credential_no']);
        $this->assign('data', $data);
        $this->display();
    }
}