<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />
<block name="content">

    <!-- 正文 -->
    <article class="am-article">
        <div class="am-article-hd">
            <h1 class="am-article-title">{$data.name}{$data.cac_name}{$data.title}</h1>
            <p class="am-article-meta">地址：{$data.addr}{$data.cac_addr}{$data.display_area}</p>
        </div>

        <div class="am-article-bd">
            <switch name="Think.get.type">
            <case value="cac">
            <!-- comartcenter -->
            {$data['publish_content']|htmlspecialchars_decode}
            </case>
            <case value="library">
            <!-- library -->
            <img src="{$data.picture}" alt="">
            <p>联系电话：{$data.telephone}</p>
            <p>占地面积：{$data.covered_area}</p>
            <p>总藏书量：{$data.num_totle}万册</p>
            <p>年总流通人次：{$data.ser_people_count}万人</p>
            <p>书刊文献年外借册次：{$data.ser_borrow_num}万册</p>
            <p>官网地址：{$data.dig_website}</p>
            <p>简介：{$data.abstract}</p>
            </case>
            <case value="theatre">
            <!-- theatre -->
            {$data.publish_content}
            <?php $images =  explode(",",$data['drama_picture_url']);?>
                <volist name="images" id="im">
                    <img src="{$im}" alt="">
                </volist>
            </case>
            </switch>
        </div>
    </article>

</block>