<div class="box">
	<!-- 顶部导航 -->
	<div class="top_nav back2">
    	<div class="back_index"><a href="javascript:history.go(-1);"><i></i>讲座沙龙</a></div> 
    </div>
	<div class="pad9">  
        <?php
        if(!empty($list)){
            foreach ($list as $key => $value) {
                $url = input::site("wechat/salon/salonDetail?id=").$value->id;
                $img = input::site($value->thumb);
                $title_len = mb_strlen($value->title,'utf-8');
                $title = $title_len>52 ? mb_substr($value->title, 0,52,'utf-8').'...':$value->title;
                
                echo '<div class="back2 salon_list"><a href="'.$url.'"><img src="'.$img.'"/ ></a><h5><a href="javascript:;">'.$title.'</a></h5></div>';
            }
        }
        ?>
	</div>
</div>