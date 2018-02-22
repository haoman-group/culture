<div class="table_list">
        <div class="table_full">
            <form class="J_ajaxForm" action="" method="get">
            <input type="hidden" name="g" value="Admin">
            <input type="hidden" name="m" value="Immaterial">
            <input type="hidden" name="a" value="index">
            <table cellpadding="2" cellspacing="1" class="table_form" width="">
                <tr>
                    <th width="147">类目：</th>
                    <td>
                        <div id="category" style="display:inline-block;">
                            <select id="parentItems" name="parent_cid" onchange="getchildlist(this)">
                                <option value='0'>--请选择--</option>
                                <volist name="result" id="ca">
                                    <option value="{$ca['cid']}">{$ca['name']}</option>
                                </volist>
                            </select>
                            <div id="childItems" style="display:inline-block;"></div>
                        </div>
                    </td>
                    
                    <th>名称:</th>
                    <td>
                     <input type="text" name="re_projectname" value="{$Think.get.re_projectname}" class="input">
                    </td>
                    <th>
                     所属:
                     <td>
                      <select name="author" id="author_select">
                     <option value="mine">我的</option>
                     <option value="all">全部</option>
                     </select>
                     </td>
                    </th>
                    <th>审核状态:</th>
                    <td>
                    <select name="auditstatus">
                   <option value="" >全部</option>
                   <option value="-1" <if condition="$Think.get.auditstatus eq '-1' "> selected="selected" </if>>未审核</option>
                    <option value="35" <if condition="$Think.get.auditstatus eq '35' "> selected="selected" </if> >审核通过</option>
                    <option value="40" <if condition="$Think.get.auditstatus eq '40' "> selected="selected" </if> >驳回</option>
                    </select>
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