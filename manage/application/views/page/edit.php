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
            <h5>单页设置</h5>
          </div>
          <div class="widget-content nopadding">
          <form action="<?=MANAGE_URL;?><?=base_url();?>page/insert" method="post" class="form-horizontal" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?if(isset($row['id'])){ echo $row['id'];}?>" />
          <!-- <input type="hidden" name="cid" value="<?if(isset($row['cid'])){ echo $row['cid'];}?>" /> -->
            <div class="control-group">
              <label class="control-label">单页名称 :</label>
              <div class="controls">
                <?if(isset($row['name'])){ echo $row['name'];}?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">内容 :</label>
              <div class="controls">
                <script id="container" name="content" type="text/plain">
        <?if(isset($row['content'])){ echo $row['content'];}else{ echo $row['content'];}?>
    </script>
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
<!-- 配置文件 -->
    <script type="text/javascript" src="<? echo __STATIC__;?>ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="<? echo __STATIC__;?>ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container',{initialFrameWidth:960,initialFrameHeight:500});
    </script>

</body>
</html>
