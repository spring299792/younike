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
            <h5>幻灯管理</h5>
          </div>
          <div class="widget-content nopadding">
          <form action="<?=MANAGE_URL;?><?=base_url();?>flash/insert" method="post" class="form-horizontal" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?if(isset($row['id'])){ echo $row['id'];}?>" />
          <input type="hidden" name="pid" value="<?if(isset($pid)){ echo $pid;}else{ echo $row['pid'];}?>" />
            <div class="control-group">
              <label class="control-label">标题 :</label>
              <div class="controls">
                <input type="text" class="span8" placeholder="标题" name="title" value="<?if(isset($row['title'])){ echo $row['title'];}?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">地址 :</label>
              <div class="controls">
                <input type="text" class="span8" placeholder="地址" name="url" value="<?if(isset($row['url'])){ echo $row['url'];}?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">排序 :</label>
              <div class="controls">
                <input type="text" class="span8" placeholder="排序" name="sort" value="<?if(isset($row['sort'])){ echo $row['sort'];}?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">缩略图 :</label>
              <div class="controls">
                <input type="file" class="span5" name="img" >
                <input type="hidden" name="img" value="<?if(isset($row['img'])){ echo $row['img'];}?>">
                <img src="<?=WEB_URL.'/data/flash/'.$row['img']?>" width="150" alt="">
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
