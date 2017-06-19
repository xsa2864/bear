<!DOCTYPE html>
<html><head>
	<meta charset="utf-8">
	<title>首页</title>
	<meta content="" name="keywords"/>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
    <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
    <meta content="no-cache" http-equiv="pragma">
    <meta content="0" http-equiv="expires">
    <meta content="telephone=no, address=no" name="format-detection">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <script src="<?php echo input::jsUrl('jquery-1.10.1.min.js','wechat');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('pui.js','wechat');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('common.js','wechat');?>" type="text/javascript"></script>

    <link href="<?php echo input::cssUrl('common.css','wechat');?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo input::cssUrl('box.css','wechat');?>" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="box">
	<!-- 顶部导航 -->
	<div class="top_nav">
    	<div class="index_top search_box">
        	<a class="a1" href="#"><i>分享</i></a>
            <span><input type="text" placeholder="纸尿裤"/></span>
            <a class="a2" href="#"> <i class="on">消息提醒</i>  <!-- 没有消息提醒的时候用后面这个i <i class="on">消息</i>--></a>        
		</div>
  	</div>
    <div class="index_logo">
    	<div class="touchslideimg">
            <ul class="logo_box cf">
            <?php 
            if(!empty($headPic)){
            	$pic = json_decode($headPic->pics,1);
            	foreach ($pic as $key => $value) {
            		$img = input::site($value['imgUrl']);
            		echo '<li><a href='.$value['url'].'><img src='.$img.' /></a></li>';
  				}        		
            }
            ?>
            </ul>
        </div>
    </div>
    <div class="index_nav toggle_on" id="index_nav">
        <ul class="tb index_list">
            <li class="flex_1 "><a href="#"><i></i><font>预约游泳</font></a></li>
            <li class="flex_1"><a href="#"><i></i><font>预约推拿</font></a></li>
            <li class="flex_1"><a href="#"><i></i><font>预约配送</font></a></li>
            <li class="flex_1"><a href="#"><i></i><font>快递办卡</font></a></li>
        </ul>
        <ul class="tb index_list">
            <li class="flex_1 on"><a href="#"><i></i><font>国内名品</font></a></li>
            <li class="flex_1"><a href="#"><i></i><font>跨境商城</font></a></li>
            <li class="flex_1"><a href="#"><i></i><font>熊猫专区</font></a></li>
            <li class="flex_1"><a href="#"><i></i><font>沙龙讲座</font></a></li>
        </ul>
    </div>
	<div class="index_banner">
		<a href="#"><img src="images/index_banner01.png" /></a>
		<a href="#"><img src="images/index_banner02.png" /></a>
		<a href="#"><img src="images/index_banner03.png" /></a>
	</div>
	
	 <div class="index_main" style="display:none;">
	 </div>
	 <div class="index_main" style="display:none;">
	 </div>
	 <div class="index_main" style="display:none;">
	 </div>
	 <div class="index_main" style="display:none;">
	 </div>
	 <div class="index_main">
	 	<h3 class="back2">			
        	<i class="arrow_left"></i>
            <a class="shop_local" href="#"><span >国内名品</span></a>
            <i class="arrow_right"></i>       
		</h3>
		<div class="back2">
			<div class="index_arproduct_cen">
				<dl class="tb">
					<dt><img src="images/img_in01.png" /></dt>
					<dd class="flex_1">
						<div>
							<h4><a class="c333" href="#">商品名称商品</a></h4>
							<p class="info">特点说明一行，简明扼要</p>
							<p class="prize"> <span><i>￥</i>9999.<i>00</i></span> <span>￥19999.00</span></p>
							<h5><font class="fire"></font><span>已售987件</span></h5>
						</div>
					</dd>
				</dl>	                
			 </div>
			 <div class="index_arproduct_cen">
				<dl class="tb">
					<dt><img src="images/img_in01.png" /></dt>
					<dd class="flex_1">
						<div>
							<h4><a class="c333" href="#">商品名称商品</a></h4>
							<p class="info">特点说明一行，简明扼要</p>
							<p class="prize"> <span><i>￥</i>9999.<i>00</i></span> <span>￥19999.00</span></p>
							<h5><font class="fire"></font><span>已售987件</span></h5>
						</div>
					</dd>
				</dl>	                
			 </div>
			 <div class="index_arproduct_cen">
				<dl class="tb">
					<dt><img src="images/img_in01.png" /></dt>
					<dd class="flex_1">
						<div>
							<h4><a class="c333" href="#">商品名称商品</a></h4>
							<p class="info">特点说明一行，简明扼要</p>
							<p class="prize"> <span><i>￥</i>9999.<i>00</i></span> <span>￥19999.00</span></p>
							<h5><font class="fire"></font><span>已售987件</span></h5>
						</div>
					</dd>
				</dl>	                
			 </div> 
		</div>	
        <div class="home_box back2 mar20">
            <ul class="tb home_nav">
                <li class="flex_1"><a href="#">推荐</a></li>
                <li class="flex_1"><a href="#">热销</a></li>
                <li class="flex_1"><a href="#">新品</a></li>
				<li class="flex_1 on"><a href="#">分类</a></li>
            </ul>
            <div class="home_cen">
            	<ul class="tb index_product">
                    <li class="flex_1">
                        <a href="#"><img src="images/img_in02.png" /></a>
                        <div class="product_text">
                            <h4><a href="#">商品名称一行字</a></h4>
							<p class="prize"> <span><i>￥</i>9999.<i>00</i></span> <span>￥19999.00</span></p>
                        </div>
                    </li>
                    <li class="flex_1">
                        <a href="#"><img src="images/img_in02.png" /></a>
                        <div class="product_text">
                            <h4><a href="#">商品名称一行字</a></h4>
							<p class="prize"> <span><i>￥</i>9999.<i>00</i></span> <span>￥19999.00</span></p>
                        </div>
                    </li>
                </ul>
				<ul class="tb index_product">
                    <li class="flex_1">
                        <a href="#"><img src="images/img_in02.png" /></a>
                        <div class="product_text">
                            <h4><a href="#">商品名称一行字</a></h4>
							<p class="prize"> <span><i>￥</i>9999.<i>00</i></span> <span>￥19999.00</span></p>
                        </div>
                    </li>
                    <li class="flex_1">
                        <a href="#"><img src="images/img_in02.png" /></a>
                        <div class="product_text">
                            <h4><a href="#">商品名称一行字</a></h4>
							<p class="prize"> <span><i>￥</i>9999.<i>00</i></span> <span>￥19999.00</span></p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
		<div class="load"><a href="javascript:;">发现更多</a></div>		
  	</div>
	
	 <div class="index_main" style="display:none;">
	 	<h3 class="back2">			
        	<i class="arrow_left"></i>
            <a class="shop_aroud" href="#"><span >跨境商品</span></a>
            <i class="arrow_right"></i>       
		</h3>
		<div class="back2">
			<div class="index_arproduct_cen">
				<dl class="tb">
					<dt><img src="images/img_in01.png" /></dt>
					<dd class="flex_1">
						<div>
							<h4><a class="c333" href="#">商品名称商品</a></h4>
							<p class="info">特点说明一行，简明扼要</p>
							<p class="prize"> <span><i>￥</i>9999.<i>00</i></span> <span>￥19999.00</span></p>
							<h5><font class="fire"></font><span>已售987件</span></h5>
						</div>
					</dd>
				</dl>	                
			 </div>
			 <div class="index_arproduct_cen">
				<dl class="tb">
					<dt><img src="images/img_in01.png" /></dt>
					<dd class="flex_1">
						<div>
							<h4><a class="c333" href="#">商品名称商品</a></h4>
							<p class="info">特点说明一行，简明扼要</p>
							<p class="prize"> <span><i>￥</i>9999.<i>00</i></span> <span>￥19999.00</span></p>
							<h5><font class="fire"></font><span>已售987件</span></h5>
						</div>
					</dd>
				</dl>	                
			 </div>
			 <div class="index_arproduct_cen">
				<dl class="tb">
					<dt><img src="images/img_in01.png" /></dt>
					<dd class="flex_1">
						<div>
							<h4><a class="c333" href="#">商品名称商品</a></h4>
							<p class="info">特点说明一行，简明扼要</p>
							<p class="prize"> <span><i>￥</i>9999.<i>00</i></span> <span>￥19999.00</span></p>
							<h5><font class="fire"></font><span>已售987件</span></h5>
						</div>
					</dd>
				</dl>	                
			 </div> 
		</div>	
        <div class="home_box back2 mar20">
            <ul class="tb home_nav">
                <li class="flex_1"><a href="#">推荐</a></li>
                <li class="flex_1"><a href="#">热销</a></li>
                <li class="flex_1"><a href="#">新品</a></li>
				<li class="flex_1 on"><a href="#">分类</a></li>
            </ul>
            <div class="home_cen">
            	<ul class="tb index_product">
                    <li class="flex_1">
                        <a href="#"><img src="images/img_in02.png" /></a>
                        <div class="product_text">
                            <h4><a href="#">商品名称一行字</a></h4>
							<p class="prize"> <span><i>￥</i>9999.<i>00</i></span> <span>￥19999.00</span></p>
                        </div>
                    </li>
                    <li class="flex_1">
                        <a href="#"><img src="images/img_in02.png" /></a>
                        <div class="product_text">
                            <h4><a href="#">商品名称一行字</a></h4>
							<p class="prize"> <span><i>￥</i>9999.<i>00</i></span> <span>￥19999.00</span></p>
                        </div>
                    </li>
                </ul>
				<ul class="tb index_product">
                    <li class="flex_1">
                        <a href="#"><img src="images/img_in02.png" /></a>
                        <div class="product_text">
                            <h4><a href="#">商品名称一行字</a></h4>
							<p class="prize"> <span><i>￥</i>9999.<i>00</i></span> <span>￥19999.00</span></p>
                        </div>
                    </li>
                    <li class="flex_1">
                        <a href="#"><img src="images/img_in02.png" /></a>
                        <div class="product_text">
                            <h4><a href="#">商品名称一行字</a></h4>
							<p class="prize"> <span><i>￥</i>9999.<i>00</i></span> <span>￥19999.00</span></p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
		<div class="load"><a href="javascript:;">发现更多</a></div>		
  	</div>
	
	
	<div class="index_main" style="display:none;">
	 </div>
	 <div class="index_main" style="display:none;">
	 </div>
 
    <!-- 底部导航 -->
    <footer class="fbox">
    	<ul class="tb toggle_on">
        	<li class="flex_1 on"><a href="#">首页</a></li>
            <li class="flex_1"><a href="#">圈子</a></li>
            <li class="flex_1"><a href="#">购物车</a></li>
            <li class="flex_1"><a href="#">我的</a></li>
        </ul>
    </footer>
</div>

<script>
$(function(){
	// 默认显示第一标签内容
	$('.index_nav li').eq(5).click();
});
</script>

</body>  
</html>
