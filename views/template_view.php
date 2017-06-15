<?php 
$config  =  C('siteConfig') or die("找不到站点配置文件"); 
?>
<!DOCTYPE html>
<html lang="cn">
<head>
    <title><?php echo $config['name']; ?> - 后台管理系统</title>
    <meta charset="utf-8">

</head>
<body>    
    <!--页面主体-->
    <?php if (isset($content)) echo $content;?>
    <!--页面主体end-->
</body>
</html>
