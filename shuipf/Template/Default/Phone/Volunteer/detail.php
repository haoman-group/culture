<extend name="shuipf/Template/Default/Phone/Common/_layout.php" />

<block name="content">

   
    <article class="am-article">
        <div class="am-article-hd">
            <h1 class="am-article-title">{$data.title}</h1>
            <p class="am-article-meta"><?php echo $data['addtime'] ?>  </p>
        </div>
         <div class="am-article-bd">
            <!-- <p class="am-article-lead"></p> -->
            <if condition="$_GE['type'] eq 'Train' ">
              培训须知:{$data['notice']}
            <else/>
            招募要求：
            要求:&nbsp;&nbsp;&nbsp;{$data['condition']};
            </br>
            需要人数:&nbsp;&nbsp;{$data['totle']};
             </br>
            服务地点:&nbsp;&nbsp;&nbsp;{$data['addr']};
             </br>
            服务时间:&nbsp;&nbsp;&nbsp;{$data['time']};
             </br>
            </if>
        </div>
        <div class="am-article-bd">
            <!-- <p class="am-article-lead"></p> -->
            <if condition="$data['intro'] neq '' ">
            {$data['intro']}
            <else/>
             {$data['content']}
            </if>
        </div>
    </article>

</block>