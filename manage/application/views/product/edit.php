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
            <h5>产品列表</h5>
          </div>
          <div class="widget-content nopadding">
          <form action="<?=MANAGE_URL;?><?=base_url();?>Product/insert" method="post" class="form-horizontal" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?if(isset($row['id'])){ echo $row['id'];}?>" />
            <div class="control-group">
              <label class="control-label">产品名称 :</label>
              <div class="controls">
                <input type="text" class="span8" placeholder="产品名称" name="name" value="<?if(isset($row['name'])){ echo $row['name'];}?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">排序 :</label>
              <div class="controls">
              <input type="text" class="span5" placeholder="排序" name="sort" value="<?if(isset($row['sort'])){ echo $row['sort'];}else{ echo '99';}?>" />

              </div>
            </div>
              <div class="control-group">
                  <label class="control-label">价格 :</label>
                  <div class="controls">
                     <input type="text" class="span5" placeholder="价格" name="price" value="<?if(isset($row['price'])){ echo $row['price'];}?>" />

                  </div>
              </div>
            <div class="control-group">
              <label class="control-label">产品分类 :</label>
              <div class="controls">
              <select name="cid" id="cid">
              <?foreach($clist as $v):?>
                <option value="<?=$v['id']?>" <?if($row['cid']==$v['id']){echo "selected='selected'";}?> ><?=$v['name']?></option>
              <?endforeach;?>
              </select>
              
              </div>
            </div>
              <div class="control-group">
                  <label class="control-label">产品小图:</label>
                  <div class="controls">
                      <input type="file" class="span5" name="litpic" >
                      <input type="hidden" name="litpic" value="<?if(isset($row['litpic'])){ echo $row['litpic'];}else{ echo $row['litpic'];}?>">
                      <img src="<?=WEB_URL.'/data/product/'.$row['litpic']?>" width="150" alt="">
                  </div>
              </div>
            <div class="control-group">
              <label class="control-label">详情图片:</label>
              <div class="controls">
              <input type="file" class="span5" name="img" >
              <input type="hidden" name="img" value="<?if(isset($row['img'])){ echo $row['img'];}else{ echo $row['img'];}?>">
              <img src="<?=WEB_URL.'/data/product/'.$row['img']?>" width="150" alt="">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">描述：</label>
              <div class="controls">
              <TEXTAREA class="large bLeft" name="description" style="width:700px;height:100px;"><?if(isset($row['description'])){ echo $row['description'];}?></textarea>

              </div>
            </div>

            <div class="control-group">
              <label class="control-label">产品说明 :</label>
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
