<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$typename?> - <?=WEB_NAME?></title>
	<?=$style?>
</head>
<body>
<div class="wrap">
	<!-- top -->
	<?=$header?>
	<!-- product -->
	<?php if($type == ''):?>
	<div class="banner">
		<img src="<?=__STATIC__;?>client/<?=$type?>_ban.jpg" alt="">
	</div>
	<?php endif;?>
	<div class="posi">
		<div class="posi_info">
			您当前的位置：<a href="<?=WEB_URL?>">首页</a> > <?=$posi?>
		</div>
	</div>
	<div class="wrap">
		<?=$left?>
		<div class="right">
			<div class="content">
				<?=$vo['content']?>
			</div>
			
		</div>
	</div>
	<!-- footer -->
	<?=$footer?>
	</div>
</body>
</html>