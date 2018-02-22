<div id="addFollowing" class="following_dialog_add">
  <div class="box">
    <div class="check"> <span>
      <input type="checkbox" name="checkbox" value="1"  id="is_quietly" checked="checked"/>
      </span>
      <label for="is_quietly">悄悄关注&nbsp;&nbsp;(对方和其他人不会知道您关注了他。)</label>
    </div>
  </div>
  <div class="selection">为“<a href="/944531/" target="_blank">{$nickname}</a>”选择分组：</div>
  <div class="box">
    <div class="group">
      <ul class="radio" id="aa">
      <volist name="friendsGroup" id="vo">
        <li id="followingGroupLine1_{$vo.gid}"> 
        <span><input type="radio" name="fgid" value="{$vo.gid}"  id="radio_{$vo.gid}" <if condition=" $vo['gid'] eq $fgid ">checked</if>/></span>
          <label for="radio_{$vo.gid}">{$vo.name}{$fgid}</label>
          <span class="option"> 
          <a class="icon edit" title="编辑" onClick="$('#editGroup').show();$('#addfgName1').attr('value', '{$vo.name}'); $('#radio_{$vo.gid}').attr('checked', 'checked');$('#addGroup').hide(); $('#edit').attr('fgid', '{$vo.gid}')"; href="javascript:;"></a> 
          <a class="icon del" title="删除" onClick="fans.followingGroupDel({$vo.gid}, 1, '{$vo.name}');" href="javascript:;"></a> 
          </span> 
         </li>
       </volist>
      </ul>
      <div class="create_group"> <a herf="javascript:;" id="foundGroup">+创建分组</a> </div>
      <div id="addGroup" style="display:none;">
        <input type="text" maxlength="7" style="width:121px;" class="input_normal" id="addfgName2">
        <span class="button-main"> <span>
        <button type="button" uid="{$uid}" nickname="" id="adds">添加</button>
        </span> </span> <span class="cancel button2-main"><span><a href="#" id="cancel1">取消</a></span></span> </div>
      <div id="editGroup" style="display:none;">
        <div class="create_group"> 编辑分组 </div>
        <input type="text" maxlength="7" style="width:121px;" class="input_normal" id="addfgName1">
        <span class="button-main"> <span>
        <button type="button" uid="{$uid}" nickname="" id="edit">编辑</button>
        </span> </span> <span class="cancel button2-main"><span><a href="#" id="cancel2">取消</a></span></span> </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	fans.submit();
</script>