<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
 <block name="after_styles">
           <link rel="stylesheet" href="{$config_siteurl}statics/ci/css/industry_supply.css" />
           
      
 </block>
<block name="content">
  
<div class="wap">
<div class="industrytop">
  <div class="ggwh_Content" style="margin-top: 25px;">
				<div class="sx">
					<div class="pull-left ggwh_SelectName" >地区：</div>
					<div class="a-box">
                        <a href="{:U('supply')}" name="city">山西</a>
                        <volist name="area_array" id="aa">
                            <if condition="$aa['id'] neq 25120000">
                                <a href="{:U('supply',['area_id'=>$aa['id']])}" name="city">{$aa.name}市</a>
                            </if>
                        </volist>
					</div>					
				</div>
			<div class="sx">
					<div class="pull-left ggwh_SelectName" >大类：</div>
					<div class="a-box">
						<volist name="category_array" id="ca">
              <a  href="{:U('supply',['category'=>$key])}" name="category">{$ca}</a>
            </volist>
					</div>					
				</div>
			</div>
</div>

    <div class="search">
        <form action="" method="get">
           <input type="hidden" name="g" value="Industry">
            <input type="hidden" name="m" value="Supply">
            <input type="hidden" name="a" value="supply">
        <span>公司名称:</span> <input type="text" name="name" value="{$Think.get.name}" placeholder="请输入公司名">
        <button class="butt" >搜索</button>
        </form>

    </div>
    <div class="list">
        <div class="type">
             <a href="###"><span class="supp on" data-type="1" >供应方</span></a>
             <a href="{:U('demand')}"><span data-type="2" class="supp" >需求方</span></a>
        </div>
        <div class="table">
        <table width="100%" cellspacing="0" class="table1">
        <thead>
          <tr style="height:40px;line-height:40px;font-size:16px; background-color:#f1f0ef;">
            <td  align="center" ><input type="checkbox">公司名</td>
            <!-- <td align="center">上传者</td> -->
            <td align="center" >大类</td>
            <td align="center">主营品种</td> 
            <td align="center">资源单说明</td>
            <td align="center">上传时间</td>
            <td align="center" class="arrow-up">下载数</td>
            <td align="center">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr style="height:60px;lin-height:60px;font-size:16px;">
              <td align="center"><input type="checkbox">{$vo.name}</td>
              <!-- <td align="center">{$vo.author}</td> -->
              <td align="center">{$category_array[$vo['category']]}</td>
              <td align="center">{$vo.sub_category}</td> 
              <td align="center">{$vo.intro}</td>
              <td align="center">{$vo.addtime|date="Y-m-d",###}</td>
              <td align="center">{$vo.download|default="0"}</td>
              <td align="center"><a href="{:U('down',array('id'=>$vo['id']))}">下载</a></td>
             
            </tr>
            </volist>
        </tbody>
      </table>
        <div class="page">
				{$pageinfo.page}
			</div>
        </div>

    </div>
    <!--添加-->
    <div class="hideadd">
        <div class="buttonadd">
            <button class="button">添加</button>
            <!--<button class="button edit" style="margin-left:15px;">修改</button>-->
        </div>

       <div class="addcontent" style="display:none;">
            <form action="{:U('add')}" method="post">
             <input type="hidden" value="supply" name="style">
               <dl>  
                    <dt>供需方:</dt>
                    <dd><select select  class="attendance_num" name="role" id="role">
                     <option value="supply">供方</option>
                     <option value="demand">需求方</option>
                    </select>
                    </dd>
                    <dt style="margin-top:25px;">个人/企业:</dt>
                    <dd style="margin-top:25px;"><select select  class="attendance_num" name="type" id="type">
                     <option value="personal">个人</option>
                    <option value="company">企业</option>
                    </select>
                    </dd>
                    <dt style="margin-top:25px;">地区:</dt>
                    <dd style="margin-top:25px;">
                    <select select  class="attendance_num" name="area_id" id="type">    
                      <volist name="area_array" id="a">
                           <if condition="$a['id'] neq 25120000">
                            <option value="{$a.id}">{$a.name}</option>
                            </if>
                        </volist>
                    </select>
                    </dd>
                    <dt style="margin-top:25px;">名称:</dt>
                    <dd><input type="text"   class="telnum"  name="name" value="" placeholder="请输入个人名称或者企业名称"></dd>
                    <dt style="margin-top:25px;">主营品种:</dt>
                    <dd><input type="text"   class="telnum"  name="sub_category" id="sub_category" value="" placeholder="主营品种"></dd>
                    <dt style="margin-top:25px;">项目分类:</dt>
                    <dd style="margin-top:25px;"><select select  class="attendance_num" name="category" id="category">
                     <volist name="category_array" id="ca">
                    <option value="{$key}">{$ca}</option>
                  </volist>
                    </select>
                    </dd>
                    
                    <dt style="margin-top:25px;">简介:</dt>
                    <dd style="margin-top:25px;"><textarea name="intro" id="" cols="30" rows="10" class="intro"></textarea></dd>
                    <dt style="margin-top:25px;">附件:</dt>
                     <dd style="margin-top:35px;margin-left:15%;width:50px;height:28px;float:left;">
                       <input type="hidden" name="savepath" value="" class="savepath">
                      <input type="text" name="filename" value="" class="filetext" style="width:100px;height:28px;">
                    </dd>
            
                    
                   
                    <dt></dt>
                    <dd></dd>
                    
                    <dd><a style="margin-top:20px;background-color:#93272D;color:#fff;" href="javascript:file();" class="btn" >上传</a><input class="btn " type="submit" value="提交"></dd>
                </dl>
            </form>
           </div> 

    </div>
    <div class="editcontent" style="display:none;">
            <form action="{:U('edit')}" method="post">
            
               <dl>  
                    <dt>供需方:</dt>
                    <dd><select select  class="attendance_num" name="role" id="role">
                     <option value="supply">供方</option>
                     <option value="demand">需求方</option>
                    </select>
                    </dd>
                    <dt style="margin-top:25px;">个人/企业:</dt>
                    <dd style="margin-top:25px;"><select select  class="attendance_num" name="type" id="type">
                     <option value="personal">个人</option>
                    <option value="company">企业</option>
                    </select>
                    </dd>
                    <dt style="margin-top:25px;">名称:</dt>
                    <dd><input type="text"   class="telnum"  name="name" value="" placeholder="请输入个人名称或者企业名称"></dd>
                    <dt style="margin-top:25px;">主营品种:</dt>
                    <dd><input type="text"   class="telnum"  name="sub_category" id="sub_category" value="" placeholder="主营品种"></dd>
                    <dt style="margin-top:25px;">项目分类:</dt>
                    <dd style="margin-top:25px;"><select select  class="attendance_num" name="category" id="category">
                     <volist name="category_array" id="ca">
                    <option value="{$key}">{$ca}</option>
                  </volist>
                    </select>
                    </dd>
                    
                    <dt style="margin-top:25px;">简介:</dt>
                    <dd style="margin-top:25px;"><textarea name="intro" id="" cols="30" rows="10" class="intro"></textarea></dd>
                    
                    <dt></dt>
                    <dd><input class="btn " type="submit" value="提交"></dd>
                </dl>
            </form>
           </div> 
</div>

</block>
<!--<script>
var c=$('##buttonUpload', window.parent.document)
console.log(c);
</script>-->
 
