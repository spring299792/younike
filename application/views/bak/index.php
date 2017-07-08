<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title><?=WEB_NAME?></title>
<meta name="keywords" content="">
<meta name="description" content="">
<?=$style?>
<style>
  .in_support{ margin-top:15px;margin-right:16px; margin-bottom:10px; float:left;}
</style>
</head>
<body>

<div id="mainsy_kuanping">

<?=$header?>
<div class="clear"></div>


<div class="clear"></div>
<div id="top_flash">

<script type="text/javascript" src="<?=__STATIC__;?>client/superslide.js"></script>

<style type="text/css">		

/* fullSlide */
.fullSlide{width:100%;position:relative;height:600px; margin: 0 auto;}
.fullSlide img{border:0;}
.fullSlide a{text-decoration:none;color:#333;}
.fullSlide a:hover{color:#1974A1;}
.fullSlide .bd{margin:0 auto;position:relative;z-index:0;overflow:hidden;}
.fullSlide .bd ul{width:100% !important;}
.fullSlide .bd li{width:100% !important;height:600px;overflow:hidden;text-align:center;}
.fullSlide .bd li a{display:block;height:600px;}
.fullSlide .hd{width:100%;position:absolute;z-index:1;bottom:0;left:0;height:15px;line-height:15px;}
.fullSlide .hd ul{text-align:center;}
.fullSlide .hd ul li{cursor:pointer;display:inline-block;*display:inline;zoom:1;width:8px;height:8px;margin:1px;overflow:hidden;background:#000;filter:alpha(opacity=50);opacity:0.3;line-height:999px;}
.fullSlide .hd ul .on{background:#0283D5;}
.fullSlide .prev,.fullSlide .next{display:block;position:absolute;z-index:1;top:50%;margin-top:-30px;left:5%;z-index:1;width:40px;height:60px;background:url(<?=__STATIC__;?>client/slider-arrow.png) -126px -137px #000 no-repeat;cursor:pointer;filter:alpha(opacity=80);opacity:0.5;display:none;}
.fullSlide .next{left:auto;right:5%;background-position:-6px -137px;}
</style>



<div class="fullSlide">
	<div class="bd">
		<ul style="position: relative; width: 1903px; height: 600px;">
		  <?foreach($flash as $vo):?>
			<li style="background: rgb(244, 244, 244) url(<?=WEB_URL;?>data/flash/<?=$vo['img']?>) no-repeat scroll center 0px; position: absolute; width: 1903px; left: 0px; top: 0px; display: none;"><a href="<?=$vo['url']?>" target="_blank"></a></li>
      <?endforeach;?>
			
		</ul>
	</div>
	<div class="hd"><ul>
  <?foreach($flash as $k=>$vo):?>
  <li class=""><?=$k+1?></li>
  <?endforeach;?>
  </ul></div>
	<span style="opacity: 0.36995; display: inline;" class="prev"></span>
	<span style="opacity: 0.36995; display: inline;" class="next"></span>
</div><!--fullSlide end-->
  
  
<script type="text/javascript">
$(".fullSlide").hover(function(){
    $(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.5)
},
function(){
    $(this).find(".prev,.next").fadeOut()
});
$(".fullSlide").slide({
    titCell: ".hd ul",
    mainCell: ".bd ul",
    effect: "fold",
    autoPlay: true,
    autoPage: true,
    trigger: "click",
    startFun: function(i) {
        var curLi = jQuery(".fullSlide .bd li").eq(i);
        if ( !! curLi.attr("_src")) {
            curLi.css("background-image", curLi.attr("_src")).removeAttr("_src")
        }
    }
});
</script>
</div> 
<div class="clear"></div>

<div class="clear"></div>
<div class="zbmainsy">

  <div class="zbrightsy_2">
<div class="syprodh">
<div class="syprodh_l"></div>
<div class="syprodh_txt">
<span class="syprodhzi">Partner Support</span><a href="<?=WEB_URL?><?=base_url();?>support"><span class="syprodhzi1">More&gt;&gt;</span></a></div>
<div class="syprodh_r"></div>
 <div class="clear"></div>
</div>

<div id="syright_main">

<div class="clear"></div>

<?foreach($support as $svo):?>
<div class="in_support">
<a href="<?=WEB_URL?><?=base_url();?>support/view/<?=$svo['id']?>" target="_blank" title="<?=$svo['title']?>"><img src="<?=WEB_URL;?>data/news/<?=$svo['img']?>" border="0" width="350" height="245"></a>
</div>
<?endforeach;?>


   <div class="clear"></div>
<!--about start-->

<!--about end-->
 <div class="clear"></div>
<!--product start-->

<div class="sypro">
<div class="syprodh">
<div class="syprodh_l"></div>
<div class="syprodh_txt">
<span class="syprodhzi">Hot Products</span><a href="<?=WEB_URL?><?=base_url();?>product"><span class="syprodhzi1">More&gt;&gt;</span></a></div>
<div class="syprodh_r"></div>
 <div class="clear"></div>
</div>
<table class="syprony" border="0" cellpadding="0" cellspacing="0">
      <tbody><tr>
	  		 <?foreach($pro as $pkey=>$vo):?>
       <td valign="top">
	   <div align="center">
        <table class="syprony1" border="0" cellpadding="0" cellspacing="0" width="150">
          <tbody><tr>
            <td class="sypro_border_hui" onmouseover="this.className='sypro_border_hui1'" onmouseout="this.className='sypro_border_hui'" align="center" height="150"><a href="<?=WEB_URL?><?=base_url();?>product/view/<?=$vo['id']?>" target="_blank">
			<img src="<?=WEB_URL;?>data/product/<?=$vo['img']['img']?>" onload="javascript:ResizePic(this)" alt="Zeon Sport AS" border="0" height="150" width="150"></a></td>
                </tr>
          <tr>
            <td class="syprony_title"><a href="<?=WEB_URL?><?=base_url();?>product/view/<?=$vo['id']?>" target="_blank"><?=$vo['name']?></a></td>
                </tr>
          
          </tbody></table>
		  </div>
        </td>
        <?if($pkey%6==5):?></tr><tr><?endif;?>
        <?endforeach;?>

</tr><tr>
</tr>
</tbody></table><!--产品列表形式-->


</div>
  
   <!--product end--> 

<!--product gd start-->
  
       <!--product gd end--> 
</div>
</div>

<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
 <?=$footer?>




</body></html>