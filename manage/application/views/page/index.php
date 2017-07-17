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
            <span style="float:right;margin:7px;"><a href="<?=MANAGE_URL;?><?=base_url();?>Page/add/" class="btn btn-success">添加单页</a></span>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" id="datalist">
            <thead>
                <tr>
                  <th>单页ID</th>
                  <th>单页名称</th>
                  <th>单页类型</th>
                  <th>英文连接</th>
                  <th>排序</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?foreach($list as $vo):?>
                <tr class="gradeX">
                  <td width="6%"><?=$vo['id']?></td>
                  <td width="10%"><?=$vo['title']?></td>
                  <td width="10%"><?php if($vo['type'] == "page"){ echo "单页";}else{ echo "列表";}?></td>
                    <td width="10%"><?=$vo['name']?></td>
                    <td width="10%"><?=$vo['sort']?></td>
                  <td width="15%"><?php if($vo['type'] == 'list'):?><a href="<?=MANAGE_URL;?><?=base_url();?>News/index/<?=$vo['id']?>">内容</a>　　<?php endif;?><a href="<?=MANAGE_URL;?><?=base_url();?>Page/edit?id=<?=$vo['id']?>">编辑</a>　　<a href="javascript:;" onclick="return delcheck(<?=$vo['id']?>);">删除</a></td>
                </tr>
              <?endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    var table =$('#datalist').DataTable({
      searching: false,
      "lengthChange": false,
    });
     table.page.len( 20 ).draw();
     table.order( [ 3, 'asc' ] ).draw();
 } );

  function delcheck(id){
    layer.confirm('确定要删除这条数据？', {
    btn: ['确定','取消'] //按钮
}, function(){
    location.href="<?=MANAGE_URL;?><?=base_url();?>Page/del/?id="+id
})
  }

</script>
<!--end-main-container-part-->

<?=$footer;?>
<style>
  #datalist_info{display:none;}
</style>

</body>
</html>
