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
            <h5><?if($group['title']){echo $group['title']." > ";}?>节点信息</h5>
            <span style="float:right;margin:7px;"><a href="<?=MANAGE_URL;?><?=base_url();?>Node/add?gid=<?=$pid;?>" class="btn btn-success">添加节点</a></span>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" id="datalist">
            <thead>
                <tr>
                  <th>节点ID</th>
                  <th>节点名称</th>
                  <th>节点地址</th>
                  <th>排序</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?foreach($list as $vo):?>
                <tr class="gradeX">
                  <td width="7%"><?=$vo['id']?></td>
                  <td width="20%"><?=$vo['title']?></td>
                  <td width="20%"><?=$vo['name']?></td>
                  <td width="10%"><?=$vo['sort']?></td>
                  <td width="6%"><?=$vo['status']?></td>
                  <td width="10%"><a href="<?=MANAGE_URL;?><?=base_url();?>node/edit?id=<?=$vo['id']?>">编辑</a>　<a href="javascript:;" onclick="return delcheck(<?=$vo['id']?>);">删除</a></td>
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
     table.order( [ 0, 'desc' ] ).draw();
 } );

  function delcheck(id){
    layer.confirm('确定要删除这条数据？', {
    btn: ['确定','取消'] //按钮
}, function(){
    location.href="<?=MANAGE_URL;?><?=base_url();?>node/del?id="+id
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
