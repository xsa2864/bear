<!DOCTYPE html>
<html><head>
	<meta charset="utf-8">
	<title><?php echo $title;?></title>
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
    <!--页面主体-->
    <?php if (isset($content)) echo $content;?>
    <!--页面主体end-->
</body>  
</html>
