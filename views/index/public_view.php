<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>福建众合智慧信息科技有限公司 - 福建众合智慧信息科技有限公司</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
<head>
	<!--<link rel="stylesheet" type="text/css" href="./css/index.css">
	-->
	<link rel="stylesheet" type="text/css" href="<?php echo input::cssUrl('mswke.css','index');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo input::cssUrl('index2.css','index');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo input::cssUrl('slideimg.css','index');?>">
	<script src="<?php echo input::jsUrl('jquery-1.10.1.min.js','index');?>" type="text/javascript"></script>
	<script src="<?php echo input::jsUrl('communal.js','index');?>" type="text/javascript"></script>
	<script src="<?php echo input::jsUrl('slideimg.js','index');?>" type="text/javascript"></script>
</head>
<body>
	<div class="top">
		<div class="q">
			<div class="index_top cf">
				<div class="top_left">
					<a href="./">
						<img src="<?php echo input::imgUrl('logo.png','index');?>" alt="福建众合智慧信息科技有限公司" height="71" width="259"></a>
				</div>
				<div class="top_right cf tb">
					<div class="search flex_1">
						<input placeholder="输入关键词搜索"/>
					</div>
					<div class="h1 cf">
						<a href="javascript:;">APP</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!---导航-->
	<div class="index_nav">
		<div class="q">
			<ul class="nav_cen">
				<li class="home">
					<a href="javascript:;"> <i></i>
						&nbsp;&nbsp;首页
					</a>
				</li>
				<li> <i></i>
					<a href="#">众合智慧</a>
					<div class="result_mun" style="display:none;">
						<p>
							<a href="#">企业简介</a>
						</p>
						<p>
							<a class="on" href="#">智慧学院</a>
						</p>
						<p>
							<a href="#">资产管理</a>
						</p>
						<p>
							<a href="#">移动社交</a>
						</p>
						<p>
							<a href="#">导师团队</a>
						</p>
					</div>
				</li>
				<li>
					<a href="#">
						<i></i>
						精品课程
					</a>
					<div class="result_mun" style="display:none;">
						<p>
							<a href="#">企业简介</a>
						</p>
						<p>
							<a class="on" href="#">智慧学院</a>
						</p>
						<p>
							<a href="#">资产管理</a>
						</p>
						<p>
							<a href="#">移动社交</a>
						</p>
						<p>
							<a href="#">导师团队</a>
						</p>
					</div>
				</li>
				<li>
					<a href="#"><i></i>新闻活动</a>
				</li>
				<li>
					<a href="#"><i></i>联系我们</a>
				</li>
			</ul>
		</div>
	</div>
	

	<!--页面主体-->
	<?php if (isset($content)) echo $content;?>
	<!--页面主体end-->

	<div class="foot2">
		<div class="q">
			<h2>友情链接：</h2>
			<dl class="footer2 cf">
			<?php
            if(!empty($footer)){
                foreach ($footer as $key =>
				$value) {
                ?>
				<dd>
					<a href="<?php echo $value->
						url;?>">
						<img src="<?php echo input::site($value->imgUrl);?>" style="width: 240px;height: 60px;"/></a>
				</dd>
				<?php
                }
            }
            ?>
            </dl>
		</div>
	</div>

	<div class="foot1">
		<div class="q">
			<div class="footer">
				<div class="h1">
					闽ICP备11017824号-4 / 闽ICP证130164号  福州市公安局备案编号:110105000501
					<br/>
					Copyright © 2006-2016 众合智慧
				</div>
			</div>
		</div>
	</div>

</body>
</html>
