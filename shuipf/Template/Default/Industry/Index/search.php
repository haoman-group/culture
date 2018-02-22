<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/policy.css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/page_common.css" />
      <style>
     .select_area{
         display:none;
     }
    </style>   
</block>

<block name="content">
    <div id="nav">
        <div class="container">
        <span style="color:#962626;font-size:24px;">搜索结果</span>
    </div>
    </div>
    <div id="content">
        <div class="container industry clearfix" >
            <div class="industry-right" style="float:left;width:100%;">
                <h5><span>搜索结果</span></h5>
                <ul class="list">

                       
                        <volist name="data" id="vo">

<!--                            <li>{$i}<a href="{$vo.url}">{$vo.title|str_cut=###,40}</a> <span> {$vo.inputtime|date="Y-m-d",###}</span></li>-->

                                <li style="display: block;">{$i}<a href="{:U("Industry/Index/policyshow",array('id'=>$vo['id']))}">{$vo.publish_name|str_cut=###,30}</a>  <span>{$vo.addtime}</span> <span></span> </li>
                        </volist>

                </ul>
                <div class="page">
				{$pageinfo.page}
			</div>
            </div>
        </div>
    </div>
</div>
</block>
<block name="after_scripts">
<script src="{$config_siteurl}statics/cu/js/Comm/Category.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/linkagesel/linkagesel-min.js"></script>
    <script type="text/javascript" >
        function text(){
            var value = document.getElementById("b").value;
            var val =document.getElementById("c").value;
            window.location.href='{:U("Search/index")}&key='+value+'&val='+val;
        }
    </script>
    <script>
$(function(){
    var opts = {
        ajax: '/Api/Address/Area',
        selStyle: 'margin-left: 3px;',
        select: "#area",
        loaderImg:'/statics/js/linkagesel/ui-anim_basic_16x16.gif',
       
    }
    var linkageSel = new LinkageSel(opts);
    
    linkageSel.onChange(function() {
      
        var selected = linkageSel.getSelectedValue();
        //console.log(selected);
        $(".area").val(selected.toString());
        var addr = "<?php echo  $data['default_area_level'] ?>";
        //   $(".LinkageSel").eq(0).val()!=='' ? $(".LinkageSel").eq(0).attr("disabled",true) : '';
         if($(".LinkageSel").eq(1).val() !==''){
          if(($(".LinkageSel").eq(1).val())%addr==0){
             $(".LinkageSel").eq(1).attr("disabled",true);
          }else{
              $(".LinkageSel").eq(1).attr("disabled",false);
          }
          };
           if($(".LinkageSel").eq(2).val() !==''){
          if(($(".LinkageSel").eq(2).val())%addr==0){
             $(".LinkageSel").eq(2).attr("disabled",true);
          }else{
              $(".LinkageSel").eq(2).attr("disabled",false);
          }
      };
         
        $(".LinkageSel").next("span") ? $(".LinkageSel").next("span").remove() : '';
        // console.log($(".LinkageSel:hidden").next("span"));
        // $(".LinkageSel").eq(0) ? $(".LinkageSel").eq(0).after("<span>省</span>") : '';
        // $(".LinkageSel").eq(1) ? $(".LinkageSel").eq(1).after("<span>市</span>") : '';
        // $(".LinkageSel").eq(2) ? $(".LinkageSel").eq(2).after("<span>县(区)</span>") : '';
        
        $(".LinkageSel").on("change",function(){
            $(".LinkageSel:hidden").next("span").remove();
        });
    });


});
$(".enhanced").click(function(){
    $(".enhancedsearch").show();
    $(".search").hide();
});

$(".searchback").click(function(){
    $(".enhancedsearch").hide();
    $(".search").show();
});


$("#parentItems").change(function(){
    
    if($("#parentItems").val() == 176){
       $("#grandsonItems").show();
    }else{
         $("#grandsonItems").hide();
    }
});
$("#parentItemssearch").change(function(){
    if($("#parentItemssearch").val() == 176){
       $("#grandsonItemssearch").show();
    }else{
         $("#grandsonItemssearch").hide();
    }
});
</script>
</block>