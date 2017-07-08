<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title><?=$title?>-<?=WEB_NAME?></title>
<meta name="keywords" content="<?=$title?>">
<meta name="description" content="<?=$title?>">
<?=$style?>
<style>
	.hangju img{ width:800px; }
</style>
</head>

<body>


<div id="mainny_kuanping">

<?=$header?>
<div class="zbmain">

<?=$left;?>


<div class="nyjj"></div>
<div class="zbright">

<div id="right_main">


<div class="right_dh">
<div class="right_dh_l"></div>
<div class="right_dh_txt"><?=$typename?></div>
<div class="right_dh_r"></div>
<div class="clear"></div>
</div>
<div class="right_ny">
    <div class="hangju">
    <?if($flag=='news'):?>
    <p align="left">
    	<?=$vo['description']?>
    </p>
    <?endif;?>
    <?if($flag=='support'):?>
    <p align="center">
    	<img src="<?=WEB_URL.'/data/news/'.$vo['img']?>">
    </p>
    <?endif;?>
	<?=$vo['content']?>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="clear"></div>
  
<?=$footer?>
</body></html>