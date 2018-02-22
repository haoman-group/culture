
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/adress.css">
        <link rel="stylesheet" href="{$config_siteurl}statics/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/swiper.css" />
        <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/style.css" />
        <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/base.css" />
        <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/member.css" />

    <div class="col-md-9" >
     <volist name="data" id='vo'>
      <if condition="$i lt 4">
        <div class="moren" >

            <p class="title">{$vo['address'][0]['name']}{$vo['address'][1]['name']}&nbsp;{$vo.name}收</p>

            <hr style="border:1px dotted #036" />
            <span>{$vo['address'][0]['name']}{$vo['address'][1]['name']}{$vo['address'][2]['name']}</span> <span>{$vo.name}</span><br>
            <span>{$vo.detailed}</span><br>
            <span>联系电话：{$vo.phone}</span>
        </div>
      </if>
     </volist>
        


        <div class="tianjia" style="margin-left: 100px;">
            <h3 style="text-align: center;margin-top: 20px;">添加新地址</h3>
            <div  style="margin-left: 60px;margin-top: 20px;">
                <form method="post" action="">
                    <dl class="dluform">
                        <dt>地区</dt>
                        <dd>
                        <select id="area" class="LinkageSel" name="area[]"></select>
                        <input type="hidden" name="area" class="area" value=""/>
                         <input type="hidden" name = "region" value="">
                    </dd>
                        <dt>详细地址</dt>
                        <dd><input type="text" name="detailed" value="" placeholder="请输入您的详细地址"></dd>

                        <dt>邮政编码</dt>
                        <dd><input type="text" name="code" value="" placeholder="请输入您的邮政编码" ></dd>
                        <dt>姓名</dt>
                        <dd><input type="text" name="name" value="" placeholder="请输入您的姓名  " ></dd>
                        <dt>联系电话</dt>
                        <dd><input type="text" name="phone" value="" placeholder="请输入您的联系电话"></dd>
                        <input type="hidden" name="uid" value="{$uid}">
                        <dd class="ddbtns">

                            <input type="button" value="确认修改" class="preservation add">
                            <input type="button" class="btncancel" value="取消">
                        </dd>
                    </dl>
                </form>

            </div>
        </div>

    </div>
    <script src="{$config_siteurl}statics/js/wind.js"></script>

   <script type="text/javascript" src="{$config_siteurl}statics/ci/js/jquery.min.js"></script>
     <script type="text/javascript" src="{$config_siteurl}statics/ci/js/linkagesel/comm.js"></script>
     <script type="text/javascript" src="{$config_siteurl}statics/ci/js/linkagesel/linkagesel.js"></script>
    
<script>

        var opts = {
            ajax: "/index.php?g=Api&m=Area&a=ajax",
            selStyle: 'margin-left: 6px;',
            select:  '#area',
            head: '请选择',
            defVal: [4,84,],
            selName:'area[]',
            level: 3,
        };
        var linkageSel = new LinkageSel(opts);

        linkageSel.onChange(function() {
            var selected = linkageSel.getSelectedArr();
           
            $(".area").val(selected.toString());
        });
    </script>
        <script type="text/javascript">
        //全局变量
        var GV = {
            DIMAUB: "{$config_siteurl}",
            JS_ROOT: "{$config_siteurl}statics/js/"
        };
    </script>
   
    
    
