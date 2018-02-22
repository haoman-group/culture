 <div class="h_a">搜索</div>
    <div class="table_list">
        <div class="table_full">
            <form class="J_ajaxForm" action="{:U('index')}" method="get">
            <input type="hidden" name="g" value="Admin">
            <input type="hidden" name="m" value="Art">
            <input type="hidden" name="a" value="index">
            <input type="hidden" name="art_cid" value="">
            <table cellpadding="2" cellspacing="1" class="table_form" width="">
                <tr>
                    <th width="147">类目：</th>
                    <td>
                        <div id="category" style="display:inline-block;">
                            <select id="parentItems" name="art_cid" onchange="getchildlist(this)" value="{$Think.get.art_cid}">
                                <option value='0'>--请选择--</option>
                                <volist name="result" id="ca">
                                    <option value="{$ca['cid']}">{$ca['name']}</option>
                                </volist>
                            </select>
                            <div id="childItems" style="display:inline-block;"></div>
                        </div>
                    </td>
                     <th>审核状态:</th>
                    <td>
                    <select name="auditstatus" >
                    <option value="" >全部</option>
                   <option value="-1" <if condition="$Think.get.auditstatus eq '-1' "> selected="selected" </if>>未审核</option>
                    <option value="35" <if condition="$Think.get.auditstatus eq '35' "> selected="selected" </if> >审核通过</option>
                    <option value="40" <if condition="$Think.get.auditstatus eq '40' "> selected="selected" </if> >驳回</option>
                    </select>
                    </td>

                    <th>标题:</th>
                    <td>
                     <input type="text" name="title" value="{$Think.get.title}" class="input">
                    </td>
                    <td>
                      <button class="btn btn_submit mr10 J_ajax_submit_btn" >搜索</button>
                      <a style="" href="{:U('index')}" class="btn">清除条件</a>
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
    