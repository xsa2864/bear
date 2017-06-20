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

	<script type="text/javascript">
	document.onkeydown=function(event){
	    var e = event || window.event || arguments.callee.caller.arguments[0];            
	    if(e && e.keyCode==13){ // enter 键
	        var inKeyword = $("#inKeyword").val();
			if(inKeyword == '' || inKeyword == null){
    		    alert("输入关键词搜索");
    		    return false;
    		}
    		location.href = '<?php echo input::site("index/index/search?keyword=");?>'+inKeyword;
	    }
	}; 
	</script>
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
						<input placeholder="输入关键词搜索" id="inKeyword"/>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!---导航-->
	<div class="index_nav">
		<div class="q">
			<ul class="nav_cen">
				<?php
				if(!empty($menu)){
					foreach ($menu as $key => $value) {
						$str = '';
						$purl = '';
						$url = input::site($value->url);
						if(!empty($value->child_menu)){
							$url = $url.'?mid='.$value->id;
							$child = json_decode($value->child_menu);
							$str = '<div class="result_mun" style="display:none;">';
							foreach ($child as $keys => $ch) {
								$churl = $url.'&type='.$ch->id;								
								$str .= '<p><a href='.$churl.'>'.$ch->name.'</a></p>';
								if($keys){
									$purl = $churl;
								}
							}		
							$str .= '</div>';					
						}				
						$url = 	empty($purl) ? $url : $purl;	
						$home = $value->id == $mid ? ' class="home"':'';
						echo '<li '.$home.'><a href='.$url.'> <i></i>'.$value->name.'</a>'.$str.'</li>';
					}
				}
				?>
			</ul>
		</div>
	</div>
	<?php
	if(!empty($chmenu)){
	?>
	<div class="list_nav">
		<div class="q">
	   	  <ul>
	        <?php echo $chmenu;?>
	        </ul>
	    </div>
	</div>
	<?php 
	}
	?>

	<!--页面主体-->
	<?php if (isset($content)) echo $content;?>
	<!--页面主体end-->

	<div class="foot2">
		<div class="q">
			<h2>友情链接：</h2>
			<dl class="footer2 cf">
			<?php
            if(!empty($footer)){
                foreach ($footer as $key => $value) {
                ?>
				<dd>
					<a href="<?php echo $value->url;?>">
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
					<?php echo $icp->icp;?>
					<br/>
					<?php echo $icp->copyright;?>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
