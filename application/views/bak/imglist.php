<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title><?=$title?>-<?=WEB_NAME?></title>
<meta name="keywords" content="<?=$title?>">
<meta name="description" content="<?=$title?>">
<?=$style?></head>

<body>
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
<table cellspacing="0" cellpadding="0" border="0" class="nyprony">
        <tbody>
        <tr>
        <?foreach($list as $k=>$vo):?>
        
          <td width="25%" valign="top" style=" padding:10px 6px 6px 6px;"><table width="150" cellspacing="0" cellpadding="0" border="0" style="margin:0 auto 10px auto;">
            <tbody><tr>
              <td height="150" align="center" onmouseout="this.className='border_hui'" onmouseover="this.className='border_hui1'" class="border_hui">
              <a href="<?=WEB_URL?><?=base_url();?><?=$flag?>/view/<?=$vo['id']?>" target="_blank"><img border="0" alt="<?=$vo['name']?>" src="<?=WEB_URL;?>data/product/<?=$vo['img']['img']?>" width="150" height="150"></a></td>
            </tr>
            <tr>
              <td class="border_hui_title"><a href="<?=WEB_URL?><?=base_url();?><?=$flag?>/view/<?=$vo['id']?>" target="_blank"><?=$vo['name']?></a></td>
            </tr>
          </tbody></table>
         </td>
         
        <?if($k%4==3){echo "</tr><tr>";}?>
         
        <?endforeach;?>
        <?if(count($list)<3){ echo "<td></td>";}?>
        <tr>

      </tbody></table>
      <table width="98%" cellspacing="0" cellpadding="0" border="0" align="center">
<tbody><tr>
<td>
<div id="page">
<span class="text">Total: <b><?=$pages?></b></span> 
<span class="text">Page: <b><?=$page?></b> / <b><?=$pages?></b></span>
    
    <span class=""><a href="<?=WEB_URL?><?=base_url()?><?=$flag?>?<?if($keywords){echo "keywords=".$keywords."&";}?><?if($cid>0){echo "cid=".$cid."&";}?>p=1">First</a></span>
    <span class=""><a href="<?=WEB_URL?><?=base_url()?><?=$flag?>?<?if($keywords){echo "keywords=".$keywords."&";}?><?if($cid>0){echo "cid=".$cid."&";}?>p=<?=$prev?>">←Previous</a></span>
    
    <span class=""><a href="<?=WEB_URL?><?=base_url()?><?=$flag?>?<?if($keywords){echo "keywords=".$keywords."&";}?><?if($cid>0){echo "cid=".$cid."&";}?>p=<?=$next?>">Next→</a></span>
    <span class=""><a href="<?=WEB_URL?><?=base_url()?><?=$flag?>?<?if($keywords){echo "keywords=".$keywords."&";}?><?if($cid>0){echo "cid=".$cid."&";}?>p=<?=$pages?>">End</a></span>
    
<select onchange="location=this.options[this.selectedIndex].value" name="page">
<?for($i=1;$i<=$pages;$i++){?>
<option <?if($page==$i){echo 'selected="selected"';}?> value="<?=WEB_URL?><?=base_url()?><?=$flag?>?<?if($keywords){echo "keywords=".$keywords."&";}?><?if($cid>0){echo "cid=".$cid."&";}?>p=<?=$i;?>"><?=$i;?> Page</option>
<?}?>
</select>
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