<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />

<block name="content">

    <!-- 正文 -->
    <article class="am-article">
        <div class="am-article-hd">
            <h1 class="am-article-title">{$data.title}{$data.re_projectname}{$data.com_name}{$data.publish_name}{$data.name}{$data.cac_name}</h1>
            <p class="am-article-meta">
                <!-- 非遗展示 -->
                {$data.updatetime}
                <!-- 文化艺术     -->
                <notempty name="data['unit']"><br>表演单位：{$data.unit}<br></notempty>
                <notempty name="data['region']">流域分布：{$data.region}<br></notempty>
                <notempty name="data['awards']">获奖情况：{$data.awards}<br></notempty>
                <notempty name="data['authorname']">作者：{$data.authorname}</notempty>
                <!-- 公共文化：图书馆 -->
                {$data.addr}
                <!-- 公共文化：文化馆 -->
                {$data.cac_addr}
                <!-- 公共文化：剧院 -->
                {$data.display_area}
                <!-- 文化产业 -->
                <notempty name="data['com_name']"><br>企业名称：{$data.com_name}<br></notempty>
                <notempty name="data['com_phone']">联系方式：{$data.com_phone}<br></notempty>
                <notempty name="data['com_addr']">企业地址：{$data.com_addr}</notempty>
                <!-- 文化政策 -->
                <notempty name="data['publish_agency']"><br>发布机构：{$data.publish_agency}<br></notempty>
                <notempty name="data['publish_order']">文号：{$data.publish_order}<br></notempty>
                <notempty name="data['publish_topword']">主题词：{$data.publish_topword}<br></notempty>
            </p>
        </div>
        <div class="am-article-bd">
            <!-- 文化艺术 -->
            {$data['introduction']}
            <!-- 公共文化：图书馆 -->
            <notempty name="data['picture']"><img src="{$data.picture}" alt=""></notempty>
            <notempty name="data['telephone']"><p>联系电话：{$data.telephone}</p></notempty>
            <notempty name="data['covered_area']"><p>占地面积：{$data.covered_area}</p></notempty>
            <notempty name="data['num_totle']"><p>总藏书量：{$data.num_totle}万册</p></notempty>
            <notempty name="data['ser_people_count']"><p>年总流通人次：{$data.ser_people_count}万人</p></notempty>
            <notempty name="data['ser_borrow_num']"><p>书刊文献年外借册次：{$data.ser_borrow_num}万册</p></notempty>
            <notempty name="data['dig_website']"><p>官网地址：{$data.dig_website}</p></notempty>
            <notempty name="data['abstract']"><p>简介：{$data.abstract}</p></notempty>
            <!-- 公共文化：文化馆 --> <!-- 文化政策 --><!-- 公共文化：剧院 -->
            {$data['publish_content']|htmlspecialchars_decode}
            
            <?php 
                $images =  isset($data['image'])?explode(",",$data['image']):null;
                if(!$images){
                    $images =  isset($data['drama_picture_url'])?explode(",",$data['drama_picture_url']):null;
                }
            ?>
            <volist name="images" id="im">
                <img src="{$im}" alt="">
            </volist>
            <!-- 非遗展示 -->
            {$data.content}
            <!-- 文化产业 -->
            {$data.survey}{$data.intro}
            <notempty name="data['acrobatics_picture_url']">{$data.acrobatics_picture_url}</notempty>
        </div>
    </article>

</block>