<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title><?=$title?>-<?=WEB_NAME?></title>
<meta name="keywords" content="<?=$title?>">
<meta name="description" content="<?=$title?>">
<?=$style?>
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
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody><tr>
  
    <td style="padding:10px;" valign="top" width="40%">
	<span>
<link rel="stylesheet" type="text/css" href="<?=__STATIC__;?>client/pro.css">
<script type="text/javascript" src="<?=__STATIC__;?>client/a_fangda_1.js"></script>
<link href="<?=__STATIC__;?>client/a_fangda_1.css" type="text/css" rel="stylesheet">
<div class="box">
<table>
<tbody><tr>
<td class="t1" align="center" valign="middle">
<?foreach($imgs as $k=>$v):?>
	<?if($k==0):?>
		<a href="<?=WEB_URL;?>data/product/<?=$v['img']?>" id="zoom1" class="MagicZoom MagicThumb" style="margin: 0px auto; position: relative; display: block; outline: 0px none; text-decoration: none; width: 280px; -moz-user-select: none;">
		<img src="<?=WEB_URL;?>data/product/<?=$v['img']?>" id="sim804749" class="main_img" onload="javascript:ResizePic_nycp(this)" border="0" height="280" width="280"><div class="MagicZoomBigImageCont" style="width: 280px; height: 280px; overflow: hidden; z-index: 100; visibility: visible; position: absolute; top: -10000px; left: 295px; display: block;" id="bc804749">
		<div style="overflow: hidden;"><img style="position: relative; border-width: 0px; padding: 0px; left: 0px; top: 0px; display: block; visibility: visible;" src="<?=WEB_URL;?>data/product/<?=$v['img']?>"></div><div style="color: rgb(255, 0, 0); font-size: 10px; font-weight: bold; font-family: Tahoma; position: absolute; width: 100%; text-align: center; left: 0px; top: 260px;"></div></div><div style="z-index: 10; visibility: hidden; position: absolute; opacity: 0.5; width: 96px; height: 96px; left: 0px; top: 0px;" class="MagicZoomPup"></div></a>
		<?endif;?>
		<?endforeach;?>
		</td>
		</tr></tbody></table>
		<div style="clear:both;"></div>
		

		<div class="t2">
		        <?foreach($imgs as $k=>$v):?>
				<a style="outline: 0px none;" href="<?=WEB_URL;?>data/product/<?=$v['img']?>" rel="zoom1" rev="<?=WEB_URL;?>data/product/<?=$v['img']?>"><img src="<?=WEB_URL;?>data/product/<?=$v['img']?>" width=""></a>
				<?endforeach;?>
				  
		</div>

</div>
<div style="clear:both;"></div>

</span>
	</td>

	<td valign="top" width="60%">
	
	<div style="padding-top:5px; padding-left:5px; line-height:25px;">
	<div class="hrstyle"><b>Product name&nbsp;:</b>&nbsp;<?=$vo['name']?></div>
	 
	<div class="hrstyle"><b>Product No.&nbsp;:</b>&nbsp;<?=$vo['orderid']?></div>
	



<div style="text-align:center; margin-right:10px;height:35px; line-height:35px; vertical-align:middle;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
					

	  </div>

</div>
	</td>
	</tr>
</tbody></table>
  <br>
 <table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
   
  <tbody><tr>
    <td class="line_buttom_hui_xuxian" style="line-height:25px;">&nbsp;&nbsp;<strong>Details:</strong></td>
    </tr>
  <tr>
    <td>
    <div class="hangju">
    <?=$vo['content']?>
	</div>
	
	</td>
  </tr>
  
 </tbody></table>


	  </div>
       </div>
</div>
</div>
</div>
  

<div class="clear"></div>
  
<?=$footer?>
</body></html>