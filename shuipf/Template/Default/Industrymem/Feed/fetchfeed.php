<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<if condition=" empty($dongtai) ">
<div class="feed_item">还没有任何内容喔~(┬＿┬)！</div>
<else/>
<ul class="me">
  <volist name="dongtai" id="vo">
  <php> $params = unserialize($vo['params']); </php>
  <li>
    <div class="avatar"><a href="{:UM('Home/index',array('userid'=>$vo['userid']))}" target="_blank" class="user_card" uid="{$vo.userid}"><img src="{:U('Api/Avatar/index',array('uid'=>$vo['userid'],'size'=>45))}" onerror="this.src='{$model_extresdir}images/noavatar.jpg'"></a></div>
    <i class="square"></i>
    <div class="feedContent">
      <switch name="vo.typeid" >
          <case value="1">
              <div class="feedName">
                  <a href="javascript:;" style="float:left;"><img width="16" height="16" class="feedIcon"  src="{$model_extresdir}images/icon/icon_mini_dance.gif" /></a>
                  <a href="{:UM('Home/index',array('userid'=>$vo['userid']))}" target="_blank" class="user_card" uid="{$vo.userid}">{$vo.username}</a> 分享了新的资讯&nbsp;
                  <span class="createTime">({$vo.datetime|format_date})</span>
              </div>
              <div class="line">
                <volist name="params" id="rs">
              	   <div class="detail">
                   分享的《{$rs.title}》通过审核 <span class="createTime">{$vo.datetime|format_date}</span><a href="{$rs.url}" target="p">查看</a>
                   </div>
                 </volist>
              </div>
          </case>
          <case value="2">
              <div class="feedName">
                  <a href="javascript:;" style="float:left;"><img width="16" height="16" class="feedIcon"  src="{$model_extresdir}images/icon/icon_mini_album.gif" /></a>
                  <a href="{:UM('Home/index',array('userid'=>$vo['userid']))}" target="_blank" class="user_card" uid="{$vo.userid}">{$vo.username}</a> 更新了动态&nbsp;
                  <span class="createTime">({$vo.datetime|format_date})</span>
              </div>
              <div class="detail">
                  <strong>{$vo.username}</strong> 喜欢了 <a href="{:UM('Home/index',array('userid'=>$params['byuserid']))}" target="_blank" class="user_card" uid="{$params.byuserid}"  style="float:none;margin-left:0">{$params.byusername}</a> 相册编号ID为 {$params.picid} 的照片
                  &nbsp;&nbsp;<a class="look" href="{:UM('Home/album',array('userid'=>$params['byuserid'],'id'=>$params['picid']))}" target="_blank">查看照片</a>
                  <br/><a href="{:UM('Home/album',array('userid'=>$params['byuserid'],'id'=>$params['picid']))}" target="_blank"><img onerror="$call(function(){libs.imageError(this);}, this)" src="{$params.thumb}" class="summaryimg"></a>
              </div>
          </case>
          <case value="4">
              <div class="feedName">
                  <a href="javascript:;" style="float:left;"><img width="16" height="16" class="feedIcon"  src="{$model_extresdir}images/icon/icon_mini_miniblog.gif" /></a>
                  <a href="{:UM('Home/index',array('userid'=>$vo['userid']))}" target="_blank" class="user_card" uid="{$vo.userid}">{$vo.username}</a> 更新了说说&nbsp;
                  <span class="createTime">({$vo.datetime|format_date})</span>
              </div>
              <div class="detail">{$params.content}&nbsp;&nbsp;<a class="look" href="{:UM('Home/miniblog',array('userid'=>$vo['userid'],'id'=>$vo['relevance']))}" target="_blank">评论</a></div>
          </case>
          <case value="5">
              <div class="feedName">
                  <a href="javascript:;" style="float:left;"><img width="16" height="16" class="feedIcon"  src="{$model_extresdir}images/icon/icon_mini_album.gif" /></a>
                  <a href="{:UM('Home/index',array('userid'=>$vo['userid']))}" target="_blank" class="user_card" uid="{$vo.userid}">{$vo.username}</a> 更新了照片墙&nbsp;
                  <span class="createTime">({$vo.datetime|format_date})</span>
              </div>
              <div class="detail">
               <volist name="params" id="rs">
            <a href="{:UM('Home/album',array('userid'=>$vo['userid'],'id'=>$rs['id']))}" target="_blank"><img onerror="$call(function(){libs.imageError(this);}, this)" src="{$rs.thumb}" class="summaryimg"></a>
               </volist>
              </div>
          </case>
      </switch>
      </div>
    </div>
  </li>
  </volist>
</ul>
</if>