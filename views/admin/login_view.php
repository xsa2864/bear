<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>后台登录系统</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="<?php echo input::cssUrl('demo.css');?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo input::cssUrl('style.css');?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo input::cssUrl('animate-custom.css');?>" />
        <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>  
    </head>
    <body>
        <div class="container"> 
            <section>               
                <div id="container_demo">
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form> 
                                <h1>登录</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > 用户名 </label>
                                    <input id="user" name="user"  type="text" />
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> 密码 </label>
                                    <input id="pass" name="pass"  type="password" /> 
                                </p>
                                <p class="keeplogin"> 
                                    <div>                                    
                                        <input id="captcha" type="text" placeholder="验证码" style="width: 90px;margin-right: 10px" /> 
                                        <span id="capt" class="captButton" title="点击更换验证码"><?php $capt->render(); ?></span>
                                        <a style="cursor:pointer;" class="captButton">换一张</a>
                                    </div>
                                </p>
                                <p class="login button"> 
                                    <input type="button" value="登录" onclick="login()" /> 
                                </p>
                                <p class="change_link">
                                    
                                </p>
                            </form>
                        </div>
                    </div>
                </div>  
            </section>
        </div>
        <style type="text/css">
            #capt>img{
                position: relative;
                top: 15px;
            }
        </style>
        <script>
        $(function () {            
            $('.captButton').click(function () {
                $('#capt img').attr('src', "<?php echo input::site('captcha/default');?>?r=" + Math.random()).show();
            });
            $("html").on("keydown", function (event) {
                if (event.keyCode == 13) {
                    login();
                }
            });
        });

        function login() {
            var user = $('#user').val();
            var pass = $('#pass').val();
            var captcha = $('#captcha').val();
            if(user == ''){
                alert("用户名不能为空");
                return false;
            }
            if(pass == ''){
                alert("密码不能为空");
                return false;
            }
            if(captcha == ''){
                alert("验证码不能为空");
                return false;
            }
            $.post("<?php echo input::site('admin/login/checkLogin');?>", 
                { 'user': user, 'pass': pass, 'captcha': captcha }, 
                function (da) {
                if (da.success == 0) {
                    alert(da.msg);
                    $('#capt img').attr('src', "<?php echo input::site('captcha/default');?>?r=" + Math.random()).show();
                    $('#captcha').val('');
                }else{
                    location.href = '<?php echo input::site("admin/index");?>';                    
                }
            });
        }
    </script>
    </body>
</html>