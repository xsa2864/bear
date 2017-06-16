<div class="list_nav">
	<div class="q">
   	  <ul>
        	<li><a href="#">公司新闻</a></li>
            <li class="on"><a href="#">线下活动</a></li>
            <li><a href="#">行业资讯</a></li>
        </ul>
    </div>
</div>

<div class="q path">
	当前位置：
    <a href="#">新闻活动</a>
       > 
	<a href="#">线下活动</a> 
</div>

<div class="q list">
	<div class="list_art">
        <div class="list_search">
            <h2>新闻资讯公告</h2>
            <p>
                <input placeholder="输入关键词搜索"/>
            	<a href="#">搜索</a> 
            </p>
        </div>
        <div class="list_main">
            <ul>
            <?php 
            if(!empty($list)){
                foreach ($list as $key => $value) {
                    $url = input::site('index/index/detail?id=').$value->id;
                    echo '<li><h3>'.$value->title.'</h3><p>'.$value->subtitle.'</p>
                    <h5>'.$value->addtime.'<a href="'.$url.'">查看详情></a></h5></li>';
                }
            }
            ?>
            </ul>
            <div class="pg">
                <?php echo $pagination->render();?>
            </div>
        </div>
	</div>
</div>

<div class="q">
	
</div>