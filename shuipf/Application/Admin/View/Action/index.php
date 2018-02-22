<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />
<style>
    table th,table td{text-align: center;}
</style>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav" />
    <!-- <div class="h_a">代办事项</div> -->
    <div>
        <!-- <ul>
            <li>文化艺术: <a href="{:U('lists',array('type'=>'ReCulture'))}">待审数目:<?php //echo count($data_no_audit['ReCulture']);?></a> <a href="{:U('lists',array('type'=>'ReCulture','audit_fail'=>true))}">审核失败:<?php //echo count($data_audit_fail['ReCulture']);?></a></li>
            <li>公共文化:<a href="{:U('lists',array('type'=>'Library'))}">待审数目-图书馆:<?php //echo count($data_no_audit['Library']);?></a>  <a href="{:U('lists',array('type'=>'Comartcenter'))}"> 待审数目-文化馆:<?php //echo count($data_no_audit['Comartcenter']);?></a><a href="{:U('lists',array('type'=>'Library','audit_fail'=>true))}">审核失败-图书馆:<?php //echo count($data_audit_fail['Library']);?></a>
              <a href="{:U('lists',array('type'=>'Comartcenter','audit_fail'=>true))}">审核失败-文化馆:<?php //echo count($data_audit_fail['Comartcenter']);?></a>
            </li>
            <li>非遗项目:<a href="{:U('lists',array('type'=>'Immaterial'))}">待审数目:<?php //echo count($data_no_audit['Immaterial']);?></a> <a href="{:U('lists',array('type'=>'Immaterial','audit_fail'=>true))}">审核失败:<?php //echo count($data_audit_fail['Immaterial']);?></a></li>
            <li>文化产业:<a href="{:U('lists',array('type'=>'Industry'))}">待审数目:<?php //echo count($data_no_audit['Industry']);?></a> <a href="{:U('lists',array('type'=>'Industry','audit_fail'=>true))}">审核失败:<?php //echo count($data_audit_fail['Industry']);?></a></li>
            <li>文化政策:<a href="{:U('lists',array('type'=>'Policy'))}">待审数目:<?php //echo count($data_no_audit['Policy']);?></a> <a href="{:U('lists',array('type'=>'Policy','audit_fail'=>true))}">审核失败:<?php //echo count($data_audit_fail['Policy']);?></a></li>
        </ul> -->
        <table width="100%" cellspacing="0" class="action-index">
            <tr>
                <th>类目</th>
                <th>子类目</th>
                <?php if(\Libs\System\RBAC::authenticate("Admin/Action/noaudit")){
                    echo "<th>待审数目</th>";
                }
                if(\Libs\System\RBAC::authenticate("Admin/Action/audited")){
                    echo "<th>被驳回</th>";
                }
                if(\Libs\System\RBAC::authenticate("Admin/Action/myaudit")){
                    echo "<th>我的驳回</th>";
                }
                ?>
            </tr>
            <tr>
                <td>文化艺术：</td>
                <td></td>
                <?php if(\Libs\System\RBAC::authenticate("Admin/Action/noaudit")){
                    echo "<td><a href=".U('lists',array('type'=>'ReCulture')).">待审数目:<span>".count($data_no_audit['ReCulture'])."</span></a></td>";
                 }
                if(\Libs\System\RBAC::authenticate("Admin/Action/audited")){
                    echo "<td><a href=".U('lists',array('type'=>'ReCulture','audit_fail'=>true)).">审核失败:<span>".count($data_audit_fail['ReCulture'])."</span></a></td>";
                }
                if(\Libs\System\RBAC::authenticate("Admin/Action/myaudit")){
                    echo "<td><a href=".U('myaudit',array('type'=>'ReCulture')).">我的驳回:<span>".$data_my_audit_fail['ReCulturecount']."</span></a></td>";
                }
                ?>
            </tr>
            <tr>
                <td rowspan="2">公共文化：</td>
                <td>图书馆</td>
                 <?php if(\Libs\System\RBAC::authenticate("Admin/Action/noaudit")){
                    echo "<td><a href=".U('lists',array('type'=>'Library')).">待审数目:<span>".count($data_no_audit['Library'])."</span></a></td>";
                 } 
                if(\Libs\System\RBAC::authenticate("Admin/Action/audited")){
                    echo "<td><a href=".U('lists',array('type'=>'Library','audit_fail'=>true)).">审核失败:<span>".count($data_audit_fail['Library'])."</span></a></td>";
                }
                if(\Libs\System\RBAC::authenticate("Admin/Action/myaudit")){
                    echo "<td><a href=".U('myaudit',array('type'=>'Library')).">我的驳回:<span>".$data_my_audit_fail['Librarycount']."</span></a></td>";
                }
                ?>              
            </tr>
            <tr>   
                <td>文化馆</td>     
                 <?php if(\Libs\System\RBAC::authenticate("Admin/Action/noaudit")){      
                    echo "<td><a href=".U('lists',array('type'=>'Comartcenter'))."> 待审数目:<span>".count($data_no_audit['Comartcenter'])."</span></a></td>";
                } 
                if(\Libs\System\RBAC::authenticate("Admin/Action/audited")){
                    echo "<td><a href=".U('lists',array('type'=>'Comartcenter','audit_fail'=>true)).">审核失败:<span>".count($data_audit_fail['Comartcenter'])."</span></a></td>";
                }
                if(\Libs\System\RBAC::authenticate("Admin/Action/myaudit")){
                    echo "<td><a href=".U('myaudit',array('type'=>'Comartcenter')).">我的驳回:<span>".$data_my_audit_fail['Comartcentercount']."</span></a></td>";
                }
                ?> 
            </tr>
            <tr>
                <td>非遗项目：</td>
                <td></td>
                 <?php if(\Libs\System\RBAC::authenticate("Admin/Action/noaudit")){
                    echo "<td><a href=".U('lists',array('type'=>'Immaterial'))."> 待审数目:<span>".count($data_no_audit['Immaterial'])."</span></a></td>";
                } 
                if(\Libs\System\RBAC::authenticate("Admin/Action/audited")){
                    echo "<td><a href=".U('lists',array('type'=>'Immaterial','audit_fail'=>true)).">审核失败:<span>".count($data_audit_fail['Immaterial'])."</span></a></td>";
                }
                if(\Libs\System\RBAC::authenticate("Admin/Action/myaudit")){
                    echo "<td><a href=".U('myaudit',array('type'=>'Immaterial')).">我的驳回:<span>".$data_my_audit_fail['Immaterialcount']."</span></a></td>";
                }
                ?>
            </tr>
            <tr>
                <td>文化产业：</td>
                <td></td>
                 <?php if(\Libs\System\RBAC::authenticate("Admin/Action/noaudit")){
                    echo "<td><a href=".U('lists',array('type'=>'Industry'))."> 待审数目:<span>".count($data_no_audit['Industry'])."</span></a></td>";
                } 
                if(\Libs\System\RBAC::authenticate("Admin/Action/audited")){
                    echo "<td><a href=".U('lists',array('type'=>'Industry','audit_fail'=>true)).">审核失败:<span>".count($data_audit_fail['Industry'])."</span></a></td>";
                }
                if(\Libs\System\RBAC::authenticate("Admin/Action/myaudit")){
                    echo "<td><a href=".U('myaudit',array('type'=>'Industry')).">我的驳回:<span>".$data_my_audit_fail['Industrycount']."</span></a></td>";
                }
                ?>
            </tr>
            <tr>
                <td>文化政策：</td>
                <td></td>
                 <?php if(\Libs\System\RBAC::authenticate("Admin/Action/noaudit")){
                    echo "<td><a href=".U('lists',array('type'=>'Policy'))."> 待审数目:<span>".count($data_no_audit['Policy'])."</span></a></td>";
                } 
                if(\Libs\System\RBAC::authenticate("Admin/Action/audited")){
                    echo "<td><a href=".U('lists',array('type'=>'Policy','audit_fail'=>true)).">审核失败:<span>".count($data_audit_fail['Policy'])."</span></a></td>";
                }
                if(\Libs\System\RBAC::authenticate("Admin/Action/myaudit")){
                    echo "<td><a href=".U('myaudit',array('type'=>'Policy')).">我的驳回:<span>".$data_my_audit_fail['Policycount']."</span></a></td>";
                }
                ?>
            </tr>
        </table>
    </div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>
</body>
</html>