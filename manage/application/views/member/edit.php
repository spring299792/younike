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
            <h5>用户信息</h5>
          </div>
          <div class="widget-content nopadding">
          <form action="<?=MANAGE_URL;?><?=base_url();?>member/insert" method="post" class="form-horizontal">
          <input type="hidden" name="uid" value="<?if(isset($row['uid'])){ echo $row['uid'];}?>" />
            <div class="control-group">
              <label class="control-label">用户email :</label>
              <div class="controls">
                <input type="text" class="span5" placeholder="用户email" name="email" value="<?if(isset($row['email'])){ echo $row['email'];}?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">用户密码 :</label>
              <div class="controls">
              <input type="text" id="password" class="span5" placeholder="密码" name="password" value="<?if(isset($row['password'])){ echo $row['password'];}?>" /><input type="button" onclick="getSecret();" value="随机密码" />
              </div>
            </div>
            <!-- <div class="control-group">
              <label class="control-label">状态:</label>
              <div class="controls">
                <label class="pull-left" style="margin-left:10px;">
                  <input type="radio" name="status" value="1" <?if(!isset($row['status']) || $row['status']==1){ echo "checked='checked'";}?> style="position:relative; top:-3px;" />正常</label>
                <label class="pull-left" style="margin-left:10px;">
                  <input type="radio" name="status" value="0" <?if(isset($row['status']) && $row['status']==0){ echo "checked='checked'";}?> style="position:relative; top:-3px;" />禁用</label>
              </div> -->
              <div class="control-group">
              <label class="control-label">其他信息 :</label>
              <div class="controls">
                <textarea name="bak" id="" style="width:600px;"><?if(isset($row['bak'])){ echo $row['bak'];}?></textarea>
              </div>
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
  function getSecret(){
    $.get('<?=MANAGE_URL;?><?=base_url();?>member/getSecret',function(data){
      $("#password").val(data);
    })
  }
</script>
<!--end-main-container-part-->

<?=$footer;?>


</body>
</html>
