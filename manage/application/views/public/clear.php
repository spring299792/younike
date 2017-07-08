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
          <form action="<?=base_url();?>clear/del" method="post" class="form-horizontal" onsubmit="return checkform();">
          <input type="hidden" name="do" value="1" />

            <div class="control-group">
              <label class="control-label">请选择需要清除的数据：</label>
              <div class="controls">
                <label>年份：<input type="text" name="year" id="year" />( 不填写年份无法清除)</label>
                <input type="checkbox" name="models[]" value="zhiwei" /> 职位　
                <input type="checkbox" name="models[]" value="member" /> 用户　
                <input type="checkbox" name="models[]" value="news" /> 新闻　
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
  var year=$("#year").val();
  if(year=="" || year<2012){
    alert("该年份下无数据");
    return false;
  }
  if($("input[type='checkbox']:checked").length==0){
    alert("请至少选择一个类型清除");
    return false;
  }
}
</script>
<!--end-main-container-part-->

<?=$footer;?>


</body>
</html>
