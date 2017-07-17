<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="renderer" content="webkit">
<title><?=$info['title']?>_<?=WEB_NAME?></title>
<meta name="description" content="<?=WEB_DESCRIPTION?>。">
<meta name="Keywords" content="<?=WEB_KEYWORDS?>">
<?=$style?>
</head>
<body class="min-width">
<?=$header?>
<div class="about">
  <div class="inbox">
      <?=$page_nav;?>
    <div class="about-body">
      <ul>
          <?php foreach($list as $vo):?>
        <li class="about-list"><span class="icon icon-base icon-triangle-right"></span> <a href="/<?=base_url()?><?=$type?>/<?=$vo['id']?>" class="c-666 ml-10"><?=$vo['title']?></a> </li>
          <?php endforeach;?>
      </ul>
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
</div>
<?=$footer?>

</body>
</html>
