 <block name="styles">
       
        <link rel="stylesheet" href="{$config_siteurl}statics/cu/webuploader/xb-webuploader.css" />
        <link rel="stylesheet" href="{$config_siteurl}statics/cu/font/font-awesome.css" />
        <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
    </block>
</block>
 
 
<block name="content">  
<div class="admin-content">  
     
     
        
             
           
               <input type="file" name="filename" value="" id="filename"> 
             
              <input type="button" id="buttonUpload"  class="btn" value="开始上传" style="widht:100px;height:23px;"> 
</div>  
   </block> 
      
 
   <script type="text/javascript" src="{$config_siteurl}statics/ci/js/jquery.min.js"></script>
   <script type="text/javascript"  src="{$config_siteurl}statics/js/ajaxfileupload.js" ></script>
<script>
    $("#buttonUpload").click(function () {
       
        $.ajaxFileUpload ({
            url:"{:U('Supply/file')}", 
            secureuri:false, 
            fileElementId:'filename',
            success: function(data) {
                if(data.status == 1){
                 
                  $(".filetext", window.parent.document).val(data.data.filename.name);
                   $(".name", window.parent.document).val(data.data.filename.root);
                    $(".savepath", window.parent.document).val(data.data.filename.root);
                    $(".buttonUpload").val('成功!').attr('disabled','disabled');
                }else{
                    alert('发生错误:'+data.msg);
                }
            },
            error:function(data,xhr, status, e){
                console.log(data);
                console.log(xhr);
                console.log(status);
                console.log(e);
                alert('发生错误:'+data.msg);
            }
        })
    });
   </script>
  