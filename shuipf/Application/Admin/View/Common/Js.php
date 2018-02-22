<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "{$config_siteurl}",
	JS_ROOT: "{$config_siteurl}statics/js/"
};
</script>
<script src="{$config_siteurl}statics/js/wind.js"></script>
<script src="{$config_siteurl}statics/js/jquery.js"></script>
<script src="{$config_siteurl}statics/js/jquery-migrate-1.1.1.js"></script>
<script src="{$config_siteurl}statics/js/validate.js"></script>
<script src="{$config_siteurl}statics/cu/js/Comm/Category.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/linkagesel/linkagesel-min.js"></script>
<if condition="$_GET['type'] neq 'edit' ">
<script>
$(function(){
    var opts = {
        ajax: '/Api/Address/getArea',
        selStyle: 'margin-left: 3px;',
        select: "#area",
        loaderImg:'/statics/js/linkagesel/ui-anim_basic_16x16.gif',
        defVal: [<?php echo (!empty($data['default_area']) ? $data['default_area'] : $userInfo['default_area']); ?>]
    }
    var linkageSel = new LinkageSel(opts);
    
    linkageSel.onChange(function() {
      
        var selected = linkageSel.getSelectedValue();
        //console.log(selected);
        $(".area").val(selected.toString());
        var addr = "<?php echo  $data['default_area_level'] ?>";
          $(".LinkageSel").eq(0).val()!=='' ? $(".LinkageSel").eq(0).attr("disabled",true) : '';
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
        $(".LinkageSel").eq(0) ? $(".LinkageSel").eq(0).after("<span>省</span>") : '';
        $(".LinkageSel").eq(1) ? $(".LinkageSel").eq(1).after("<span>市</span>") : '';
        $(".LinkageSel").eq(2) ? $(".LinkageSel").eq(2).after("<span>县(区)</span>") : '';
        
        $(".LinkageSel").on("change",function(){
            $(".LinkageSel:hidden").next("span").remove();
        });
    });


});
</script>
<else/>
<script>
$(function(){
    var opts = {
        ajax: '/Api/Address/getArea',
        selStyle: 'margin-left: 3px;',
        select: "#area",
        loaderImg:'/statics/js/linkagesel/ui-anim_basic_16x16.gif',
        defVal: [<?php echo (!empty($data['default_area']) ? $data['default_area'] : $userInfo['default_area']); ?>]
    }
    var linkageSel = new LinkageSel(opts);
    
    linkageSel.onChange(function() {
      
        var selected = linkageSel.getSelectedValue();
        //console.log(selected);
        $(".area").val(selected.toString());   
        $(".LinkageSel").next("span") ? $(".LinkageSel").next("span").remove() : '';
        $(".LinkageSel").eq(0) ? $(".LinkageSel").eq(0).after("<span>省</span>") : '';
        $(".LinkageSel").eq(1) ? $(".LinkageSel").eq(1).after("<span>市</span>") : '';
        $(".LinkageSel").eq(2) ? $(".LinkageSel").eq(2).after("<span>县(区)</span>") : '';
        
        $(".LinkageSel").on("change",function(){
            $(".LinkageSel:hidden").next("span").remove();
        })
    });


});
</script>
</if>
