<div class="list_nav">
	<div class="q">
   	  <ul>
        	<li><a href="#">企业简介</a></li>
            <li class="on"><a href="#">智慧学院</a></li>
            <li><a href="#">资产管理</a></li>
            <li><a href="#">移动社交</a></li>
            <li><a href="#">导师团队</a></li>
        </ul>
    </div>
</div>

<div class="q path">
	当前位置：
    <a href="#">众合智慧</a>
       > 
	<a href="#">资产管理</a> 
</div>

<div class="q list list_img">
	<ul>
        <?php 
            if(!empty($list)){
                foreach ($list as $key => $value) {
                    $url = input::site('index/index/detail?id=').$value->id;
                    $img = input::site($value->thumb);
                    echo '<li><img src='.$img.' width="568" height="375"><div><h3>'.$value->title.'</h3>
                        <p>'.$value->subtitle.'</p><h5>'.$value->addtime.'<a href="'.$url.'">查看详情></a></h5></div></li>';
                }
            }
        ?>
    </ul>
</div>

<div class="q">
	<div class="pg">
    	<?php echo $pagination->render();?>
    </div>
</div>