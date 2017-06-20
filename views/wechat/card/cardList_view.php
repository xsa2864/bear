<div class="box">
	<!-- 顶部导航 -->
	<div class="top_nav back2">
    	<div class="back_index"><a href="javascript:history.go(-1);"><i></i>快速办卡</a></div>
        <a href="javascript:;" class="confirm marr3 blue">我的卡</a>
    </div>
	<div class="pad11">  
        <div class="card_list">
            <?php
            if(!empty($list)){
                foreach ($list as $key => $value) {
                    $url = input::site('wechat/card/cardDetail?id=').$value->id;
                    $img = input::site($value->mainPic);
                    echo '<a href="'.$url.'"><img src="'.$img.'"/ ></a>';
                }
            }
            ?>
        </div>   
	</div>
</div>