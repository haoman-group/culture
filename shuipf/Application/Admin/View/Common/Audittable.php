<if condition="$_GET['audit_fail'] eq '1'">
<style>
    .audit-fail th{line-height: 40px;text-align: center;font-size: 16px;font-weight: 600;}
    .audit-fail td{line-height: 40px;font-size: 14px;}
</style>
<div style="padding: 15px;margin-top:50px;">
    <table width="100%" cellspacing="0" border="1" class="audit-fail">
         <thead>
             <tr>                   
                 <th align="center">ID</th>
                 <th align="center">审核者</th>
                 <th align="center">状态</th>
                 <th align="center">原因</th>
                 <th align="center">审核时间</th>                    
             </tr>
         </thead>
         <tbody>
             <volist name="data['audit']" id="vo">
                 <tr>                        
                     <td align="center">{$vo.id_au}</td>
                     <td align="center">{$vo.author}</td>
                     <?php if($vo['auditstatus']==5||$vo['auditstatus']==25 ||$vo['auditstatus']==15 || $vo['auditstatus']==35){?>
                     <td align="center">审核成功</td>
                     <?php }else{?>
                     <td align="center" style="color: red;">审核失败</td>
                     <?php  }?>
                     <td align="center">{$vo.reason}</td>
                     <td align="center">{$vo.addtime}</td>                              
                 </tr>
             </volist>
         </tbody>
     </table>
</div>
   
</if>