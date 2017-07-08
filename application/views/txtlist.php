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
	<!-- news -->
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
			<div class="txtlist">
			<volist name="list" id="vo">
			<?php foreach($list as $vo):?>
				<dl>
					<dt><a href="<?=WEB_URL?><?=base_url();?>news/<?=$vo['id']?>" target="_blank"><?=$vo['name']?></a></dt>
					<dd><?=$vo['description']?></dd>
				</dl>
				<?php endforeach;?>
				<div class="pages">
					<span><?=$page?>/<?=$pages?></span>&nbsp;&nbsp;<a href="<?=WEB_URL?><?=base_url();?>news?page=<?=$prev?>"><img src="<?=__STATIC__;?>client/prev.jpg" alt="">&nbsp;&nbsp;Previous</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?=WEB_URL?><?=base_url();?>news?page=<?=$next?>">Next&nbsp;&nbsp;<img src="<?=__STATIC__;?>client/next.jpg" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!-- footer -->
	<?=$footer?>
	</div>
</body>
</html>