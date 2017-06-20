<div class="box">
	<!-- 顶部导航 -->
	<div class="top_nav back2">
    	<div class="back_index"><a href="javascript:history.go(-1);"><i></i>会员卡详情</a></div> 
        <span class="home_btn"><a href="<?php echo input::site();?>">&nbsp;</a></span>
    </div>
	<div class="pad11 padb12">
    	<div class="back2 view card_view">
        	<img src="<?php echo input::site($item->mainPic);?>" />
            <div>
            	<h1><?php echo $item->title;?></h1>
                <p class="prize"> <span><i>￥</i><?php echo $item->price;?><em> / 年</em></span></p>
                <p class="time"><em>有效期</em> <?php echo date("Y-m-d H:i",$item->stime).'~'.date("Y-m-d H:i",$item->etime);?></p>
            </div>
        </div>
        <div class="back2 view1 mar20">
        	<p>
        		<a class="f30" href="javascript:;">快速办卡</a> 
            </p>
        </div>
        <div class="back2 mar20 card_view">
        	<h3>服务内容</h3>
            <?php echo $item->content;?>
        </div> 
    </div>
    <div class="footer">
        <div class="tb details_foot" id="foot"  >
            <dl class="flex_1 ">
            	<dd class="tb">
                    <span class="flex_1"><a class="blue" href="javascript:;"  onclick="submit();">确认购买</a></span>
                </dd>
            </dl>
        </div> 
    </div>
</div>