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
            <h5>清除数据</h5>
          </div>
          <div class="widget-content nopadding">
          <form action="<?=base_url();?>clear/index" method="post" class="form-horizontal">
          <input type="hidden" name="do" value="1" />

            <div class="control-group">
              <label class="control-label"></label>
              <div class="controls">
                <input type="text" name="captcha" id="captcha" placeholder="请输入右侧验证码" style="width:48%" /> <?=$verify;?>
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

<!--end-main-container-part-->

<?=$footer;?>


</body>
</html>
