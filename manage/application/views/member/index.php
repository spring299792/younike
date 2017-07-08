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
            <span style="float:right;margin:7px;"><a href="<?=MANAGE_URL;?><?=base_url();?>member/add" class="btn btn-success">添加用户</a></span>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" id="datalist">
            <thead>
                <tr>
                  <th>用户ID</th>
                  <th>用户email</th>
                  <th>密码</th>
                  <th>录入时间</th>
                  <th>其他信息</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?foreach($list as $vo):?>
                <tr class="gradeX">
                  <td width="7%"><?=$vo['uid']?></td>
                  <td width="20%"><?=$vo['email']?></td>
                  <td width="10%"><?=$vo['password']?></td>
                  <td width="20%"><?=date("Y-m-d",$vo['create_time'])?></td>
                  <!-- <td width="6%"><?if($vo['status']==0){echo "停用";}else{echo "正常";}?></td> -->
                  <td width="10%"><?=$vo['bak']?></td>
                  <td width="10%"><a href="<?=MANAGE_URL;?><?=base_url();?>member/edit?uid=<?=$vo['uid']?>">编辑</a>　<a href="javascript:;" onclick="return delcheck(<?=$vo['uid']?>);">删除</a></td>
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
    location.href="<?=MANAGE_URL;?><?=base_url();?>member/del/?uid="+id
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
