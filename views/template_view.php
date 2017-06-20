<?php 
$config  =  C('siteConfig') or die("找不到站点配置文件"); 
?>
<!DOCTYPE html>
<html lang="cn">
<head>
    <title><?php echo $config['name']; ?> - 后台管理系统</title>
    <meta charset="utf-8">

    <link href="<?php echo input::jsUrl('lib/ligerUI/skins/Aqua/css/ligerui-all.css');?>" rel="stylesheet" type="text/css"> 
    <link href="<?php echo input::jsUrl('lib/ligerUI/skins/ligerui-icons.css');?>" rel="stylesheet" type="text/css">
    <link href="<?php echo input::jsUrl('lib/ligerUI/skins/Gray/css/all.css');?>" rel="stylesheet" type="text/css">
    <script src="<?php echo input::jsUrl('lib/jquery/jquery-1.9.0.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/core/base.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerGrid.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerToolBar.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/json2.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerResizable.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerCheckBox.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerTextBox.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerDialog.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerComboBox.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerDateEditor.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerSpinner.js');?>" type="text/javascript"></script>
    <script src="<?php echo input::jsUrl('lib/ligerUI/js/plugins/ligerTree.js');?>" type="text/javascript"></script>
</head>
<body>    
    <!--页面主体-->
    <?php if (isset($content)) echo $content;?>
    <!--页面主体end-->
</body>
</html>
