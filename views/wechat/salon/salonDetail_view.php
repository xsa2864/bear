<div class="box">
	<!-- 顶部导航 -->
	<div class="top_nav back2">
    	<div class="back_index">
            <a href="javascript:history.go(-1);"><i></i>沙龙详情</a></div> 
        <span class="home_btn"><a href="<?php echo input::site();?>">&nbsp;</a></span>
    </div>
	<div class="pad11">
    	<div class="back2 view salon_view">
        	<img src="<?php echo input::site($item->mainPic);?>" />
            <div>
            	<h1><?php echo $item->title;?></h1>
                <p><em>讲师</em> <?php echo $item->teacher;?></p>
                <p><em>时间</em> <?php echo date("Y-m-d H:i",$item->stime).'~'.date("Y-m-d H:i",$item->etime);?></p>
                <p><em>地点</em> <?php echo $item->address;?></p>
                <p><em>参与人数</em> <span><?php echo $item->number.'/'.$item->total;?></span></p>
            </div>
        </div>  
        <div class="back2 mar20">
        	<?php echo input::site($item->content);?>
        </div> 
    </div>
</div>