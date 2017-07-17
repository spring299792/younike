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
      <div class="about-title"><?=$info['title']?></div>
      <div class="about-container">
        <div class="about_introduce">
            <?=$info['content']?>
        </div>
      </div>
        <?php if(isset($flag) && $flag == 'news'):?>
       <div class="about-footer"> <a href="<?php if($prev):?>/<?=base_url()?><?=$type?>/<?=$prev['id']?><?php else:?>javascript:;<?php endif;?>"> <strong>上一条：</strong> <span><?php if($prev){ echo $prev['title'];}else{ echo '没有了';}?></span> </a> <a href="<?php if($next):?>/<?=base_url()?><?=$type?>/<?=$next['id']?><?php else:?>javascript:;<?php endif;?>"> <strong>下一条：</strong> <span><?php if($next){ echo $next['title'];}else{ echo '没有了';}?></span> </a> </div>
        <?php endif;?>
    </div>
  </div>
</div>
<?=$footer?>

</body>
</html>
