
    <div class="ggwh_Content" style="margin-top: 20px;padding:20px;border: 1px solid #E4E4E4;padding-bottom: 100px;margin-bottom: 80px;">
        <h3>{$data.content_title}</h3>
        <div style="margin-top: 20px;">
            <span style="color: #969696;">主讲人：</span>{$data.lecturer}
            <span style="color: #969696;margin-left: 65px;">开讲时间：</span>{$data.act_time}</div>
        <hr />
        {$data.publish_content}
        <!-- <div class="newsTab">
            <div class="newsTabContent" style="visibility: visible;">
                <img src="img/zlQygXcDetail1.jpg" />
                <p>在每次服务项目汇报演出中，盲童孩子乐观、自信的演出让人们欣慰也更加鼓舞着每一个文化志愿者，志愿者也从盲童孩子身上学到了他们自强不息、积极向上的精神、增加了每个人的幸福指数</p>
            </div>
            <div class="newsTabContent">
                <img src="img/zlQygXcDetail2.jpg" />
                <p>“我们的中国梦·文化志愿者服务基层行”</p>
            </div>
            <div class="newsTabContent">
                <img src="img/zlQygXcDetail3.jpg" />
                <p>老鼓书艺术家李文刚不顾高龄且手术初愈，积极参加文化志愿者活动，专门为盲童孩子创作编排了曲艺《良心》，把他的绝活毫无保留地传授盲童孩子。杨晋瑜老师看到盲童没有乐器便把自己心爱的琵琶捐赠给盲童孩子。</p>
            </div>
            <div class="newsTabContent">
                <img src="img/zlQygXcDetail4.jpg" />
                <p>吴蓓老师不厌其烦地手把手给每个盲童讲解每个舞蹈动作和语汇。</p>
            </div>
            <div class="newsTabContent">
                <img src="img/zlQygXcDetail5.jpg" />
                <p>向山西省群众艺术馆文化志愿者服务基地进行挂牌服务。</p>
            </div>
            <div class="newsTabList">
                <a class="newsTabBtn active">
                    <img src="img/zlQygXcDetailList1.jpg" /></a>
                <a class="newsTabBtn">
                    <img src="img/zlQygXcDetailList2.jpg" /></a>
                <a class="newsTabBtn">
                    <img src="img/zlQygXcDetailList3.jpg" /></a>
                <a class="newsTabBtn">
                    <img src="img/zlQygXcDetailList4.jpg" /></a>
                <a class="newsTabBtn last-item">
                    <img src="img/zlQygXcDetailList5.jpg" /></a>
            </div>
        </div> -->
        <template file="Pubservice/Common/comment"/>
    </div>
    
    <template file="Pubservice/Common/checklogin"/>
  <script>
    var a = document.getElementsByClassName("newsTabBtn");
    var b = document.getElementsByClassName("newsTabContent");
    change(a, b);

    function change(L, R) {
        for(var i = 0; i < L.length; i++) {
            L[i].setAttribute("onclick", "select(" + i + ")")
        }
        a = L;
        b = R
    }

    function select(index) {
        for(var i = 0; i < b.length; i++) {
            if(index == i) {
                b[i].style.visibility = "visible";
                a[i].classList.add("active");
            } else {
                b[i].style.visibility = "hidden";
                a[i].classList.remove("active");
            }
        }
    }
  </script>