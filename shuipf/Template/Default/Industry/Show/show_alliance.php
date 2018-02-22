<extend name="shuipf/Template/Default/Industry/common/_layout.php" />
<block name="after_styles">
	<link rel="stylesheet" href="{$config_siteurl}statics/ci/css/card.css" />
</block>
<block name="content">
	<!--头部导航-->
	<div id="nav">
		<div class="container">
			<ul>
				<li>
					<a href="{:U('Industry/Index/index')}" class="home_src">首页</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href=".{:getCategory(16,'url')}">消费服务</a>
				</li>
				<li><span>></span></li>
				<li>
					<a href="javascript:;">商家联盟</a>
				</li>
				<li><span>></span></li>
                <li>{$title|str_cut=###,30}</li>
			</ul>
			<form action="">
				<input type="text" placeholder="输入你要搜索的关键字" />
				<input type="submit" value="搜索" />
			</form>
		</div>
	</div>
<div id="content">
			<div class="container clearfix">
				<div class="yuda">
					<h5>宇达集团</h5>
					<div class="txt">
						<p>
						山西宇达青铜文化艺术股份有限公司是从事青铜文化产业的专业化公司，是国家文化产业示范基地、国家文化出口重点企业、国家级重合同守信用单位、国家对外贸易诚信AAA级企业、中国雕塑企业20强、中国艺术铸造产业基地。是专业化创意设计制造青铜巨型大型雕塑、高端创意青铜艺术礼品、青铜艺术品收藏品拍卖品、青铜雕塑艺术衍生品、青铜旅游纪念品为主的大型文化产业集团化公司。公司成立于 1992年，占地面积300亩，现有员工500人，属民营企业。目前公司拥有资产1.9亿元，年实现产值2亿元。拥有宇达青铜文化产业园、宇达大型青铜雕塑厂、宇达青铜艺术礼品厂、宇达青铜艺术品收藏品厂等三个工厂；拥有宇达青铜雕塑艺术馆、宇达青铜雕塑画廊、宇达（香港）青铜雕塑拍卖公司、宇达太原艺术馆；拥有宇达古代青铜技术研究中心、宇达巨型雕塑放样三轴加工中心、宇达机器人CNC七轴雕塑中心、宇达三维扫描3D打印中心、宇达大型雕塑理化试验室、宇达青铜表面热着色中心、山西省青铜雕塑文化工程技术研究中心等科技研发中心。其产品为山西省名牌产品，宇达牌商标为山西省著名商标。
						<p>
						宇达已成为中国美术家协会雕塑艺术委员会定点青铜雕塑制造企业、全国城市雕塑指导委员会艺术委员会定点青铜雕塑制造企业、中国雕塑院定点青铜雕塑制造企业、中国雕塑学会定点青铜雕塑制造企业、中国美术家协会韩美林工作室青铜雕塑定点制造企业。是中央美术学院、清华大学美术学院、中国美术学院、鲁迅美术学院、广州美术学院、西安美术学院、中国雕塑院等知名学府的实习创作基地。被誉为中国的雕塑家之家。
						</p>
						<p>
						宇达的青铜雕塑、青铜高端艺术礼品、青铜雕塑艺术品等产品覆盖全国三十余个省、市、自治区、直辖市，特别行政区，出口美国、德国、英国、法国、瑞士、丹麦、日本、奥地利、越南、新加坡、韩国、赤道几内亚、西班牙等十三个国家和地区。
						</p>
						<p>
						山西宇达青铜文化艺术股份有限公司董事长卫恩科，是全国城市雕塑建设指导委员会艺术委员会特邀委员、中国传统工艺研究会副会长，亚州铜装饰协会副会长，中国铸造协会常务理事，中国铸造协会艺术铸造分会副会长，山西省人大代表、山西省雕塑家协会副主席，荣获山西省劳动模范，山西省优秀企业家，山西省十大文化领军人物，山西省十大文化创新人物，晋商100佳等荣誉称号。						
						</p>
					</div>
					<content action="lists" catid="$catid" order="id DESC" num="12" page='$page'>
							<ul class="clearfix">
								<volist name="data" id="vo">
									<li>
										<img src="{:thumb($vo['thumb'],228,207)}" alt="" style="height: 207px;width: 228px;">
										<h6>{$vo.title|str_cut=###,15} </h6>
									</li>
								</volist>		
							</ul>
					</content>
				</div>
			</div>
		</div>		
</block>
