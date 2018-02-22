<div class="comment">
    <div class="write-comment">
        <h5 class="title">评论（<span>{$comment.num_person}</span>人参与，<span>{$comment.num}</span>条评论）</h5>
        <form action="{:U('Pubservice/Comment/add')}" method="post" onsubmit="return false;">
            <dl class="comment-box">
                <dt class="img"><img src="{$config_siteurl}statics/cu/images/public-service/ax1.jpg" alt=""></dt>
                <dd class="txt">
                    <script type="text/plain" id="publish_content" name="publish_content"></script>
                    <?php echo Form::editor('publish_content', 'basic', 'Cudatabase'); ?>
                </dd>
                <input type="hidden" name="username" value="{$username}">
                <input type="hidden" name="userid" value="{$id}">
                <input type="hidden" name="tablename" value="{$_GET['tablename']}">
                <input type="hidden" name="show_id" value="{$_GET['id']}">
            </dl>
            <!--				<div class="btn"><if condition="($username eq '') and ($userInfo['username'] eq '')"><a class="applyBtn" href="javascript:$('#login').modal();">发布</a><else/><input type="submit" value="发&nbsp;&nbsp;布"></if></div>-->
            <div class="btn">
                <if condition="($username eq '') and ($userInfo['username'] eq '')"><a class="applyBtn"
                                                                                       href="javascript:volid(0);" data-toggle="modal" data-target="#login">发布</a>
                    <else/>
                    <input type="submit" value="发&nbsp;&nbsp;布"/>
                </if>
            </div>
        </form>
    </div>
    <div id="show-comment" class="show-comment">
        <h5 class="title">最新评论：</h5>
        <volist name="comment['data']" id="vo" offset="0" length='3'>
            <dl class="list">
                <dt class="img"><img src="{$vo['picture']}" alt=""></dt>
                <dd class="txt clearfix">
                    <div class="name clearfix">
                        <h6>{$vo.username}<i>1</i><em>潜水</em></h6>
                        <span>{$vo.addtime}</span>
                    </div>
                    <div class="desc clearfix">
                        <if condition="$vo[status] eq '0' ">
                            <p>{$vo.publish_content}</p>
                            <else/>
                            <p>该条评论已被举报，不能正常显示</p>
                        </if>

                    </div>
                    <volist name="vo['reply']" id="wo">
                        <div class="reply-txt clearfix" style="float: none;">
                            <p>回复：{$wo.content}</p>
                            <span>{$wo.addtime}</span>
                        </div>
                    </volist>
                    <div class="btn">
                        <if condition="$userInfo['id'] eq $vo['author_id']"><a href="javascript:void(0)" class="reply">回复</a>
                            <else/>
                            <a href="javascript:void(0)" class="noreply">回复</a></if>
                        <a href="{:U('Pubservice/Comment/report',array('id'=>$vo['id']))}">举报</a>
                    </div>

                    <form action="{:U('Pubservice/Comment/reply')}" class="reply-form" method="post">
                        <textarea name="content" cols="30" rows="10" placeholder="请输入..."></textarea>
                        <input type="hidden" name="commit_id" value="{$vo['id']}">
                        <input type="submit" value="提交">
                    </form>
                </dd>
            </dl>
        </volist>
        <if condition="count($comment['data']) gt 3 ">
        <div class="more"><a  onclick="subgo()">查看更多</a></div>
        </if>
        
    </div>

    <div id="more-comment"  class="show-comment" style="display:none;">
        <h5 class="title">最新评论：</h5>
        <volist name="comment['data']" id="vo" >
            <dl class="list">
                <dt class="img"><img src="{$vo['picture']}" alt=""></dt>
                <dd class="txt clearfix">
                    <div class="name clearfix">
                        <h6>{$vo.username}<i>1</i><em>潜水</em></h6>
                        <span>{$vo.addtime}</span>
                    </div>
                    <div class="desc clearfix">
                        <if condition="$vo[status] eq '0' ">
                            <p>{$vo.publish_content}</p>
                            <else/>
                            <p>该条评论已被举报，不能正常显示</p>
                        </if>

                    </div>
                    <volist name="vo['reply']" id="wo">
                        <div class="reply-txt clearfix" style="float: none;">
                            <p>回复：{$wo.content}</p>
                            <span>{$wo.addtime}</span>
                        </div>
                    </volist>
                    <div class="btn">
                        <if condition="$userInfo['id'] eq $vo['author_id']"><a href="javascript:void(0)" class="reply">回复</a>
                            <else/>
                            <a href="javascript:void(0)" class="noreply">回复</a></if>
                        <a href="{:U('Pubservice/Comment/report',array('id'=>$vo['id']))}">举报</a>
                    </div>

                    <form action="{:U('Pubservice/Comment/reply')}" class="reply-form" method="post">
                        <textarea name="content" cols="30" rows="10" placeholder="请输入..."></textarea>
                        <input type="hidden" name="commit_id" value="{$vo['id']}">
                        <input type="submit" value="提交">
                    </form>
                </dd>
            </dl>
        </volist>
        
       
        <div class="page">
				{$pageinfo.page}
			</div>
        
    </div>
</div>
<script>
  function subgo(){
     $('#show-comment').hide();
     $('#more-comment').show();
  }
  
    $(function () {
        $(".reply-form").hide();
        $(".reply").on("click", function () {
            $(this).parents(".txt").find(".reply-form").show();
        })
    });
    $(function () {

        $(".noreply").on("click", function () {
            alert('您没有回复权限');
        })
    });
    $(function () {
        $("form").find("div.btn input").on("click", function () {
            var _this = $(this).parents("form");
            $.ajax({
                type: 'POST',
                url: "{:U('Pubservice/Comment/add')}",
                dataType: 'json',
                data: _this.serialize(),
                success: function (result) {
                    if (result.status == 1) {
                        var comment_html = '<dl class="list"><dt class="img"><img src="' + result.picture + '" alt=""></dt>' +
                            '<dd class="txt clearfix">' +
                            '<div class="name clearfix">' +
                            '<h6>' + result.data.username + '<i>1</i><em>潜水</em></h6>' +
                            '<span>' + result.data.addtime + '</span>' +
                            '</div>' +
                            '<div class="desc clearfix">' +
                            '<if condition="' + result.data.status + ' eq 0 ">' +
                            '<p>' + result.data.publish_content + '</p>' +
                            '<else/>' +
                            '<p>该条评论已被举报，不能正常显示</p>' +
                            '</if>' +
                            '</div>' +
                            '<div class="btn"><if condition="$userInfo.id eq ' +
                            result.data.author_id +
                            '"><a href="javascript:void(0)" class="reply">回复</a><else/><a href="javascript:void(0)" class="noreply">回复</a></if><a href="{:U(\'Pubservice/Comment/report\')}' + '&id=' + result.data.id + '">举报</a></div>' +
                            '<form action="{:U(\'Pubservice/Comment/reply\')}" class="reply-form" method="post" style="display:none">' +
                            '<textarea name="content" cols="30" rows="10" placeholder="请输入..."></textarea>' +
                            '<input type="hidden" name="commit_id" value="' +
                            result.data.id +
                            '">' +
                            '<input type="submit" value="提交">' +
                            '</form>' +
                            '</dd></dl>';
                        $(comment_html).insertAfter(".show-comment h5");
                        $(".write-comment h5").find("span").last().text(result.comment_num);
                        $(".write-comment h5").find("span").first().text(result.comment_person_num);
                        $(".show-comment dl").first().delegate("dd .btn a", "click", function () {
                            $("dd form").first().slideToggle();
                        });
                    }
                }
            });
        });
    });
</script>