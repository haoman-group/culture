<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<style type="text/css">
    .table_full th { width: 147px; }
    .list li { float: left; margin: 40px 5% 0;position: relative; }
    .list li img { width: 200px; height: 200px; }
    .list li h5 { font-size: 20px; font-weight: normal; text-align: center; }
    .list li a { position: absolute;top: 0;right: 0;text-decoration: none;cursor: pointer;padding: 5px;background-color: #f00;color: #fff;display: none; }
    .list li:hover a{ display: block; }
    
</style>
<body>
<div class="wrap">
    <div class="nav">
        <ul class="cc">
            <!-- <li><a href="{:U('index')}">文化艺术</a></li> -->
            <li class="current"><a href="###">设置</a></li>
        </ul>
    </div>
    <div class="table_list table_art">
        <div class="table_full">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">                
                <tr name="selectshow">
                    <th>所属类别：</th>
                    <td>
                        <div class="classify">
                            <select name="tabname" id="paraItem" onchange="getselect()">
                                <option value="--请选择--">--请选择--</option>
                                <option value="1" >图书馆</option>
                                <option value="2" >文化馆</option>
                            </select>
                            <select name="id" id="chilItem" onchange="childSelect()">
                                <option value="">--请选择--</option>
                            </select>
                        </div>
                            
                    </td>
                </tr>
            </table>
            <div class="list">
                <ul>
                    <volist name="data" id="vo">
                    <li paraId="{$vo['tabname']}" Id="{$vo['id']}">
                        <img src="{$vo['picture']}" >
                        <a class="delete">删除</a>
                        <h5><if condition="$vo['name'] neq '' ">{$vo['name']}<else/>{$vo['cac_name']}</if></h5>
                    </li>
                </volist>
                    <!-- <li>
                        <img src="" alt="山西文化云平台">
                        <h5>山西文化云平台</h5>
                    </li>
                    <li>
                        <img src="" alt="山西文化云平台">
                        <h5>山西文化云平台</h5>
                    </li>
                    <li>
                        <img src="" alt="山西文化云平台">
                        <h5>山西文化云平台</h5>
                    </li>
                    <li>
                        <img src="" alt="山西文化云平台">
                        <h5>山西文化云平台</h5>
                    </li>
                    <li>
                        <img src="" alt="山西文化云平台">
                        <h5>山西文化云平台</h5>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        
        // console.log($("#paraItem").val());
        
    });
    function getselect(){
        var tabname=$("#paraItem").val();
        $.ajax({
                type:"POST",
                url:'{:U("Admin/Show/getselect")}',
                dataType:'json',
                data:{'tabname':tabname},

                success:function(data){
                    if(data.status == 0){
                        // console.log(data);
                       var str = '';
                       $.each(data.msg,function(i,v){
                            // console.log(v.name);
                            str += '<option value="'+v.id+'">'+v.name+'</option>';
                       });
                       $("#chilItem").html("<option>--请选择--</option>"+str);                     

                    }else{
                      
                    }
                }

            });
        
    };

    function childSelect(){
        var tabname=$("#paraItem").val();
         
        var chilname=$("#chilItem").val();
         if($(".list ul li").length < 6 ){
        $.ajax({
            type:"POST",
            url:'{:U("Admin/Show/getimg")}',
            dataType:'json',
            data:{'tabname':tabname,'id':chilname},
             
            success:function(data){
                if(data.status == 0){

                        $(".list ul").append("<li paraid='"+tabname+"' id='"+chilname+"'><img src='"+data.msg.picture+"'><a class='delete'>删除</a><h5>"+data.msg.name+"</h5></li>"); 
               
                }else{
                  
                }
            }

        });}else{
             alert("最多添加6张");
        }
    };

    $(".delete").click(function(){
       var tabname=$(this).parent("li").attr("paraid");
       
        var chilname=$(this).parent("li").attr("id");
        var $this = $(this);
        $.ajax({
            type:"POST",
            url:'{:U("Admin/Show/deleteimg")}',
            dataType:'json',
            data:{'tabname':tabname,'id':chilname},
             
            success:function(data){
                if(data.status == 0){
                   
                    $this.parents("li").remove();                                 

                }else{
                  
                }
            }

        });
    })
</script>

</body>
</html>