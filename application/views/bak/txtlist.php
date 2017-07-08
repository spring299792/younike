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
    <div class="hangju">
    <?foreach($list as $vo):?>
   <div style="margin-bottom:10px; margin-top:15px;">
<div style="float:left; line-height:25px;">
<div>
	<a href="<?=WEB_URL?><?=base_url();?><?=$flag?>/view/<?=$vo['id']?>" target='_blank' title="<?=$vo['title']?>"><span style=" font-size:16px; color:#000"><strong><?=substr($vo['title'],0,100)?></strong></span></a></div>
<div style="float:left; margin-bottom:15px; "><?=$vo['description']?><a href="<?=WEB_URL?><?=base_url();?><?=$flag?>/view/<?=$vo['id']?>"><span class="nydx_more">More&gt;&gt;</span></a></div>
</div>
<div class="clear"></div>
<div style="BORDER-BOTTOM: #cccccc 1px dotted;"></div>
</div><div class="clear"></div>
<?endforeach;?>

<table width="100%" cellspacing="0" cellpadding="5" border="0" align="center">
<tbody><tr>
<td> 
<div id="page">
<span class="text">Total: <b><?=$pages?></b></span> 
<span class="text">Page: <b><?=$page?></b> / <b><?=$pages?></b></span>
    
    <span class=""><a href="<?=WEB_URL?><?=base_url()?><?=$flag?>?p=1">First</a></span>
    <span class=""><a href="<?=WEB_URL?><?=base_url()?><?=$flag?>?p=<?=$prev?>">←Previous</a></span>
    
    <span class=""><a href="<?=WEB_URL?><?=base_url()?><?=$flag?>?p=<?=$next?>">Next→</a></span>
    <span class=""><a href="<?=WEB_URL?><?=base_url()?><?=$flag?>?p=<?=$pages?>">End</a></span>
    
<select onchange="location=this.options[this.selectedIndex].value" name="page">
<?for($i=1;$i<=$pages;$i++){?>
<option <?if($page==$i){echo 'selected="selected"';}?> value="<?=WEB_URL?><?=base_url()?><?=$flag?>?p=<?=$i;?>"><?=$i;?> Page</option>
<?}?>
</select>
</div></td>
</tr>


</tbody></table>

    <!--判断结束-->
</div>
</div>
</div>
</div>
</div>
</div>
<div class="clear"></div>
  
<?=$footer?>
</body></html>