<div class="box">
	<!-- 顶部导航 -->
	<div class="top_nav back2">
    	<div class="back_index">
            <a href="javascript:history.go(-1);"><i></i>讲座详情页</a></div> 
        <span class="home_btn"><a href="<?php echo input::site();?>">&nbsp;</a></span>
    </div>
	<div class="pad11">
    	<div class="back2 view salon_view">
        	<img src="<?php echo input::site($item->thumb);?>" />
            <div>
            	<h1><?php echo $item->title;?></h1>
                <p><em>讲师</em> 少恭 花茶君</p>
                <p><em>时间</em> 2017-06-29 09:30~12:00</p>
                <p><em>地点</em> 福州市鼓楼区第五大道屯子里大厦2号楼日月精华厅</p>
                <p><em>参与人数</em> <span>200/2000</span></p>
            </div>
        </div>  
        <div class="back2 mar20">
        	<?php echo input::site($item->content);?>
        </div> 
    </div>
</div>