<div class="q path">
	当前位置：
    <a href="javascript:;"><?php echo $parent_name;?></a>
       > 
	<a href="javascript:;"><?php echo $child_name;?></a> 
</div>

<div class="q">
	<div class="view">
    	<img src="<?php echo input::site($list->mainPic);?>" width="395" height="398">
        <div class="view_main">
        	<h1><?php echo $list->title;?></h1>
            <p class="info"><?php echo $list->subtitle;?></p>
            <h4>
            	课程价格
                <span>￥<strong><?php echo $list->price;?></strong></span>
            </h4>
            <div>
                <p>
                    <span>商家信息</span>
                    <span>瑜伽道会所瑜伽道会所瑜伽道会所</span>
                    <?php echo $list->shopinfo;?>
                </p>
                <p>
                    <span>购买须知</span>
                    <span>有效期</span>
                    <?php echo $list->validtime;?>
                </p>
                <p>
                    <span>&nbsp;</span>
                    <span>使用时间</span>
                    <?php echo $list->usetime;?>
                </p>
            </div>         
        </div>
    </div>	
</div>

<div class="q">
	<div class="lesson_view">
        <h2>课程详情</h2>
        <div>
        	<?php echo $list->content;?>
        </div>
    </div>
</div>
