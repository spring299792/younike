<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="UTF-8" />
        <title><? echo MANAGE_NAME;?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<? echo __STATIC__;?>css/bootstrap.min.css" />
		<link rel="stylesheet" href="<? echo __STATIC__;?>css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<? echo __STATIC__;?>css/matrix-login.css" />
        <link href="<? echo __STATIC__;?>font-awesome/css/font-awesome.css" rel="stylesheet" />

    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" method="post" class="form-vertical" action="" onsubmit="return checkform();">
            <input type="hidden" name="do" value='1' /> 
				 <!-- <div class="control-group normal_text"> <h3><img src="<? echo __STATIC__;?>img/logo.png" alt="Logo" /></h3></div> -->
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" name="username" id="username" placeholder="用户名" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" id="password" placeholder="密码" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="text" name="captcha" id="captcha" placeholder="请输入右侧验证码" style="width:48%" /> <?=$verify;?>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="Login" /></span>
                </div>
            </form>
        </div>
        
        <script src="<? echo __STATIC__;?>js/jquery.min.js"></script>  
        <script src="<? echo __STATIC__;?>js/matrix.login.js"></script> 
        <script>
        function checkform(){
            var username=$("#username").val();
            var password=$("#password").val();
            if(username == "" || password == ""){
                alert("请输入用户名和密码");
                return false;
            }
        }
        </script>
    </body>

</html>
