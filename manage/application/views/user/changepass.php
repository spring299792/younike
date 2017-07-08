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
            <h5>节点信息</h5>
          </div>
          <div class="widget-content nopadding">
          <form action="/admin/node/insert" method="post" class="form-horizontal">
          <input type="hidden" name="pid" value="<?if(isset($row['pid'])){ echo $row['pid'];}?>" />
          <input type="hidden" name="id" value="<?if(isset($row['id'])){ echo $row['id'];}?>" />
            <div class="control-group">
              <label class="control-label">节点名称 :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="节点名称" name="name" value="<?if(isset($row['name'])){ echo $row['name'];}?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">icon :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="icon" name="icon" value="<?if(isset($row['icon'])){ echo $row['icon'];}?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">地址 :</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="地址" name="url"  value="<?if(isset($row['url'])){ echo $row['url'];}?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">排序 :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="排序" name="rank" value="<?if(isset($row['rank'])){ echo $row['rank'];}?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">状态:</label>
              <div class="controls">
                <label class="pull-left" style="margin-left:10px;">
                  <input type="radio" name="status" value="1" <?if(!isset($row['status']) || $row['status']==1){ echo "checked='checked'";}?> style="position:relative; top:-3px;" />
                  开启</label>
                <label class="pull-left" style="margin-left:10px;">
                  <input type="radio" name="status" value="0" <?if(isset($row['status']) && $row['status']==0){ echo "checked='checked'";}?> style="position:relative; top:-3px;" />
                  关闭</label>
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
