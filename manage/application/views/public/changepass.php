<!DOCTYPE html>
<html lang="en">
<head>
<title><? echo MANAGE_NAME;?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?=$style;?>
</head>
<body>

<?=$top;?>
<?=$sidebar;?>

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <!-- <div id="breadcrumb"> <a title="Go to Home" class="tip-bottom" href="/admin"><i class="icon-home"></i> Home</a></div> -->
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-pushpin"></i></span>
            <h5>修改密码</h5>
          </div>
          <div class="widget-content nopadding">
          <form action="<?=base_url()?>main/changepass" onsubmit="return checkform();" method="post" class="form-horizontal">
          <input type="hidden" name="do" value="1" />
            <div class="control-group">
              <label class="control-label">当前登录用户 :</label>
              <div class="controls">
                <?echo $_SESSION['username'];?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">旧密码 :</label>
              <div class="controls">
                <input type="password" class="span11" placeholder="旧密码" name="oldpass" id="oldpass" value="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">新密码 :</label>
              <div class="controls">
                <input type="password"  class="span11" placeholder="新密码" name="password" id="password" value="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">请重新输入 :</label>
              <div class="controls">
                <input type="password" class="span11" placeholder="重新输入新密码" name="re_pass" id="re_pass" value="" />
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" class="btn btn-success">保存</button>
            </div>
          </form>
        </div>
        </div>
  </div>
</div>
<script>
  function checkform(){
    var oldpass=$("#oldpass").val();
    var password=$("#password").val();
    var re_pass=$("#re_pass").val();
    if(oldpass==""){
      alert("原密码不能为空");
      $("#oldpass").focus();
      return false;
    }
    if(password==""){
      alert("新密码不能为空");
      $("#password").focus();
      return false;
    }
    if(re_pass!=password){
      alert("两次输入的密码不同，请重新输入");
      $("#password").focus();
      return false;
    }
  }
</script>
<!--end-main-container-part-->

<?=$footer;?>


</body>
</html>
