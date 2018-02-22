<?php if (!defined('SHUIPF_VERSION')) exit(); ?>

<Admintemplate file="Common/Head"/>
<style type="text/css">
    .table_full th {
        width: 147px;
    }

    /*.nav{background: #72A8CF;}
    .nav li a{line-height: 35px;}
    .nav li a:hover{border-bottom: none;}
    .nav li.current a{border-bottom: none;}
    .table_full th{width: 247px;text-align: right;padding-left: 10px;background: none;border-right: none;vertical-align: middle;}
    .table_list tr,.table_list th,.table_list td{background: none;padding: 0;}
    .table_list th,.table_list td{padding: 5px 0;}
    .table_list td{padding-left: 5px;}
    .table_list tr{border-bottom: 1px solid #f5f5f5;}
    textarea.input_txt{width: 620px;height: 28px;box-sizing: border-box;}
    select{width: 200px;}
    select.cid{margin-left: 10px;}
    select.LinkageSel{width: 176px;}
    select.LinkageSel:not(.select_area1){margin-left: 13px !important;}
    .explain{margin-bottom: 0;}
    .table_art td .img li.noimg{border: 1px solid #ccc;box-shadow: 2px 2px 2px #f0f0f0 inset;background-color: #fff;}
    .btn_wrap_pd{padding-left: 557px;}*/
</style>
<body>
<div class="wrap">
    <div class="nav">
        <ul class="cc">
            <li><a href="{:U('index')}">演出活动新闻简报</a></li>
            <li class="current"><a href="###">修改</a></li>
            <!--<li ><a value="手机扫描" class='  btn_add1' onclick="tel()"  />文本扫描</a></li>
            <li ><a value="手机扫描" class='  btn_add1'  onclick="tel()" />语音录入</a></li>
            <li ><a value="手机扫描" class='  btn_add' data-type="web"  />网络采集</a></li>-->
        </ul>
    </div>
    <div class="table_list table_art">
        <div class="table_full">
           
            </table>
            <form class="J_ajaxForm" action="{:U('edit')}" method="post"  >
                <input type="hidden"  name="id" class="area" value="{$data.id}"/>
                
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th>标题：</th>
                        <td>
                            <!-- <input type="text" class="input" name="region" id="name" size="50" value="{$data.region}" /> -->
                            <input name="title" class="input" value="{$data.title}" />
                        </td>
                    </tr>
                    <tr>
                        <th>第几期：</th>
                        <td>
                            <!-- <input type="text" class="input" name="region" id="name" size="50" value="{$data.region}" /> -->
                            <input name="issue" class="input" value="{$data.issue}" />(期)
                        </td>
                    </tr>
                    <tr>
                        <th>内容：</th>
                        <td>
                            <script type="text/plain" id="publish_content" name="content">{$data.content}</script>
                                <?php echo Form::editor('publish_content','full','Cudatabase'); ?>
                        </td>
                    </tr>

                </table>
                <!-- </div> -->
                <div class="">
                    <div class="btn_wrap_pd">
                        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
                    </div>
                </div>
            </form>
           
           
           
            
          
           
        </div>
    </div>
</div>
</body>

</html>