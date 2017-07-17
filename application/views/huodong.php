<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="renderer" content="webkit">
<title>活动专区_<?=WEB_NAME?></title>
<meta name="description" content="<?=WEB_DESCRIPTION?>。">
<meta name="Keywords" content="<?=WEB_KEYWORDS?>">
<?=$style?>
</head>
<body class="min-width">
<?=$header?>
<div class="lr-border">
  <div class="inbox">
    <div class="panel no-border activity">
      <div class="panel-heading activity-heading">优尼客-优惠活动享不停</div>
      <div class="panel-body ">
        <div class="ui-row">
          <div class="ui-fluid-warp">
            <div class="ui-fluid">
              <div id="Box">

                <?php foreach($list as $vo):?>
                <div class="activity-list panel">
                  <div class="panel-heading no-border-bottom"> <strong class=" f-16 c-666 text-l"><?=$vo['title']?></strong>
                    <p class="c-999 mt-10">活动时间：<?=$vo['act_date']?></p>
                  </div>
                  <div class="panel-footer"> <a href="/<?=base_url()?>huodong/<?=$vo['id']?>" target="_blank" class="pull-r text-muted text-a-underline">阅读全文</a> <span><span class="icon icon-base icon-eye" title="浏览量"></span>&nbsp;<?=$vo['click']?></span> </div>
                </div>
                <?php endforeach;?>

              </div>
                <div class="page mb-20 text-r mt-20 text-c page-sm">
                    <div class="page-inner clearfix">
                        <ul class="pull-l">
                            <li class="page-item prev"><a href="<?=WEB_URL?><?=base_url();?><?=$type?>?page=<?=$prev?>" class="page-num"> <span class="arrow-l"></span> <span class="ml-5">上一页</span> </a></li>
                            <?php for($p = 1;$p<=$pages; $p++):?>
                                <?php if($p == $page):?>
                                    <li class="page-item active"><a class="page-num"><?=$p?></a></li>
                                <?php else:?>
                                    <li class="page-item"><a href="<?=WEB_URL?><?=base_url();?><?=$type?>?page=<?=$p?>" class="page-num"><?=$p?></a></li>
                                <?php endif;?>
                            <?php endfor;?>
                            <li class="page-item next"><a href="<?=WEB_URL?><?=base_url();?><?=$type?>?page=<?=$next?>" class="page-num"> <span class="mr-5">下一页</span> <span class="arrow-r"></span> </a></li>
                            <div class="page-total">共 <?=$pages?> 页</div>
                        </ul>
                    </div>
                </div>
            </div>
          </div>
            <?=$right;?>
        </div>
      </div>
    </div>
  </div>
</div>

<?=$footer?>

</body>
</html>
