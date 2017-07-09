<!DOCTYPE html>
<html lang="en">
<head>
<title><? echo MANAGE_NAME;?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?=$style?>

    <link rel="stylesheet" href="<? echo __STATIC__;?>/amaze/bootstrap-datetimepicker.min.css"/>
    <script src="<? echo __STATIC__;?>/amaze/bootstrap-datetimepicker.min.js"></script>
    <script src="<? echo __STATIC__;?>/amaze/bootstrap-datetimepicker.zh-CN.js"></script>
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
            <h5><?php if($type == 'active'):?>活动<?php else:?>单页<?php endif;?></h5>
          </div>
          <div class="widget-content nopadding">
          <form action="<?=MANAGE_URL;?><?=base_url();?>News/insert" method="post" class="form-horizontal" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?if(isset($row['id'])){ echo $row['id'];}?>" />
          <input type="hidden" name="type" value="<?if(isset($type)){ echo $type;}else{ echo $row['type'];}?>" />
              <?php if($type == 'active'):?>
              <div class="control-group">
                  <label class="control-label">活动名称 :</label>
                  <div class="controls">
                      <input type="text" class="span8" placeholder="活动名称" name="title" value="<?if(isset($row['title'])){ echo $row['title'];}?>" />
                  </div>
              </div>
              <div class="control-group">
                  <label class="control-label">活动简介 :</label>
                  <div class="controls">
                      <textarea name="description" style="width:850px;height:50px;"><?if(isset($row['description'])){ echo $row['description'];}?></textarea>
                  </div>
              </div>
              <div class="control-group">
                  <label class="control-label">活动时间 :</label>
                  <div class="controls">

                      <div class="input-group date form_date span4" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                          开始时间:
                          <input class="form-control" id="date_start" size="16" type="text" value="<?php if($row['act_date']){ echo $row['act_date'][0];}else{ echo date('Y-m-d');}?>" readonly>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                      </div>
                      <input type="hidden" id="dtp_input1" value="<?php if($row['act_date']){ echo $row['act_date'][0];}else{ echo date('Y-m-d');}?>" name="act_date[]" />

                      <div class="input-group date form_date span4" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                          结束时间:
                          <input class="form-control" size="16" type="text" value="<?php if($row['act_date']){ echo $row['act_date'][1];}else{ echo date('Y-m-d');}?>" id="date_end" readonly>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                      </div>
                      <input type="hidden" id="dtp_input2" value="<?php if($row['act_date']){ echo $row['act_date'][1];}else{ echo date('Y-m-d');}?>" name="act_date[]" />
                  </div>
              </div>


            <?php else:?>
                <div class="control-group">
                    <label class="control-label">标题 :</label>
                    <div class="controls">
                        <input type="text" class="span8" placeholder="标题" name="title" value="<?if(isset($row['name'])){ echo $row['name'];}?>" />
                    </div>
                </div>
<!--                <div class="control-group">-->
<!--                    <label class="control-label">描述 :</label>-->
<!--                    <div class="controls">-->
<!--                        <textarea name="description" style="width:850px;height:50px;">--><?//if(isset($row['description'])){ echo $row['description'];}?><!--</textarea>-->
<!--                    </div>-->
<!--                </div>-->
              <?php endif;?>
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
<script>
    $('.form_date').each(function(){
        $(this).datetimepicker({
            language:  'zh-CN',
            weekStart: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0

        }).on('changeDate', function(ev){
            if (new Date($("#dtp_input2").val().replace("-", "/").replace("-", "/")) < new Date($("#dtp_input1").val().replace("-", "/").replace("-", "/"))){
                alert("结束时间不能小于开始时间");
                $("#date_end").val($("#dtp_input1").val());
                $("#dtp_input2").val($("#dtp_input1").val());
            }
        });
    })


</script>

</body>
</html>
