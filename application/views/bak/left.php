<div class="zbleft">



<div class="left_class">

<div class="left_classdh">

<div class="left_classdh_l"></div>

<div class="left_classdh_txt">Products Category</div>

<div class="left_classdh_r"></div>

<div class="clear"></div>

</div>

<div id="left_classny">

<?foreach($clist as $cvo):?>			

<div id="cpdl">

<a href="<?=WEB_URL?><?=base_url();?>product?cid=<?=$cvo['id']?>" title="<?=$cvo['name']?>"><img src="<?=__STATIC__;?>client/cpdl_tb1.gif" alt="" style=" margin-right:5px;" border="0"><?=$cvo['name']?><br></a>

</div>

<?if($cvo['child']):?>

<?foreach($cvo['child'] as $chv):?>

<div id="cpxl" style="display:none;" class="cid_<?=$chv['fid']?>">

<a title="<?=$chv['name']?>" href="<?=WEB_URL?><?=base_url();?>product?cid=<?=$chv['id']?>"><img border="0" style=" margin-right:5px;" alt="" src="<?=__STATIC__;?>client/cpxl_tb1.gif"><?=$chv['name']?><br></a>

</div>

<?endforeach;?>

<?endif;?>

<?endforeach;?>

</div>

</div>

<span id="cid" style="display:none"><?=$fid?></span>

<script>

	$(function(){

		var cid=$("#cid").html();

		if(cid>0){

			$(".cid_"+cid).show();

		}

	})

</script>

<!--news start-->



<span>

<div class="left_news">

<div class="left_newsdh">

<div class="left_newsdh_l"></div>

<div class="left_newsdh_txt">News</div>

<div class="left_newsdh_r"></div>

<div class="clear"></div>

</div>

<div id="left_newsny">

<?foreach($nlist as $nvo):?>

<div id="left_newsny1">&nbsp;<img src="<?=__STATIC__;?>client/news.gif" alt=""> 

<a href="<?=WEB_URL?><?=base_url();?>news/view/<?=$nvo['id']?>" title="<?=$nvo['title']?>"> &nbsp;<?=substr($nvo['title'],0,35)?></a> 

</div>

<?endforeach;?>



</div>

</div>

	  </span>

	  

<!--news end-->



<div class="left_contact">

<div class="left_contactdh">

<div class="left_contactdh_l"></div>

<div class="left_contactdh_txt">Contact Us</div>

<div class="left_contactdh_r"></div>

<div class="clear"></div>

</div>

<div id="left_contactny">

<div id="left_contactny_tu">



<a href="#"><img src="<?=__STATIC__;?>client/tugg3image.jpg" border="0" height="80" width="198"></a>



</div>

<p>



<strong>Name:</strong> Anna<br>

<!-- <strong>Tel:</strong> +86-010-82870851<br>

<strong>Fax:</strong> +86-010-82873963<br> -->

<strong>E-mail:</strong> <a href="anna@kithardware.com" target="_blank">anna@kithardware.com</a><br>



<!-- <strong>Add:</strong>Room 5025, Building 3, China Agricultural University Science Park（ CAUSPARK）, No. 10, Tianxiu Road, Haidian District, Beijing 100193, China<br> -->

<strong>QQ:</strong> <a target=blank href="tencent://message/?uin=376816640&Site=qq&Menu=yes">

376816640

</a><br>

<a target=blank href="tencent://message/?uin=376816640&Site=qq&Menu=yes"><img src="<?=__STATIC__;?>client/qq.gif" alt="QQ: 376816640" title="Call us" style="margin-left:3px;" border="0"></a>



 <a href="mailto:anna@kithardware.com" target="_blank"><img src="<?=__STATIC__;?>client/email.gif" alt="anna@kithardware.com" title="E-mail:anna@kithardware.com" style="margin-left:3px;" border="0"></a>



<a target=blank href="skype:cisco-anna"><img src="<?=__STATIC__;?>client/skype.gif" alt="Skype:cisco-anna" title="Call us" style="margin-left:3px;" border="0"></a>

</p>

</div>

</div>



</div>