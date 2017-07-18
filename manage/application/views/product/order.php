<!DOCTYPE html>
<html lang="en">
<head>
<title><? echo MANAGE_NAME;?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?=$style;?>
<style>
  #datalist_filter{ position: relative; right:0px; top:0px; }
</style>
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
            <h5>服务预约</h5>
<!--            <span style="float:right;margin:7px;"><a href="--><?//=MANAGE_URL;?><!----><?//=base_url();?><!--product/add" class="btn btn-success">添加</a></span>-->
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" id="datalist">
            <thead>
                <tr>
                  <th>id号</th>
                  <th>服务</th>
                  <th>价格</th>
                  <th>客户姓名</th>
                  <th>联系方式</th>
                  <th>地区</th>
                  <th>服务时间</th>
                  <th>提交时间</th>
<!--                  <th>操作</th>-->
                </tr>
              </thead>
              <tbody>
              <?foreach($list as $vo):?>
                <tr class="gradeX">
                  <td width="5%"><?=$vo['id']?></td>
                  <td width="10%"><?=$vo['pname']?></td>
                  <td width="10%"><?=$vo['price']?></td>
                  <td width="10%"><?=$vo['name']?></td>
                  <td width="18%"><?=$vo['tel']?></td>
                  <td width="8%"><?=$vo['area']?></td>
                    <td width="10%"><?=$vo['act_date']?></td>
                    <td width="10%"><?=$vo['created_at']?></td>

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
      searching: true,
      "lengthChange": false,
    });
     table.page.len( 20 ).draw();
     table.order( [ 6, 'asc' ] ).draw();
 } );

//ajax设置状态
$(".status").each(function(){
  $(this).click(function(){
    var url=$(this).attr('data-url');
    if(url!=""){
      $.get(url,function(data){
        
        $(".s_"+data.id).attr('data-url',data.url);
        $(".s_"+data.id).html(data.html);
      },'json')
    }
  })
})
  function delcheck(id){
    layer.confirm('确定要删除这条数据？', {
    btn: ['确定','取消'] //按钮
}, function(){
    location.href="<?=MANAGE_URL;?><?=base_url();?>Product/del?id="+id
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
