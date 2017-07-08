<div class="top">
<div class="headsy">
	<div class="logo"><a href="http://demo1.zwebs.cn/"><img src="<?=__STATIC__;?>client/logo.jpg" alt="<?=WEB_NAME?>" border="0"></a></div>
	
	<div><h1 class="company_name"><span style="font-size:26px ; font-family:#none;font-weight:#none; color:#;"><?=WEB_NAME?></span></h1></div>
	
	<div class="top_r">
		<div class="search">
	<form action="<?=WEB_URL?><?=base_url();?>product" method="post" name="search" id="search">
		 <input onkeydown='this.style.color="#000"' id="key" class="sea_int" onfocus='this.value=""' name="keywords" value="Product Search" onkeyup="this.value=this.value.replace(/'/g,'')">
		<input name="button1" class="serach_submit" id="button1" value=" GO " type="submit">
	</form>
		<div class="clear"></div>
		</div>


	</div>
</div>
<!--menu start-->
<div class="menu">
<div class="menu1">

<div style="width:136.25px;" class="nav_1" onmouseover="this.className='nav_1_hov'" onmouseout="this.className='nav_1'">
<div class="nav<?if($flag=='index'){echo "1";}?>"><a title="Home" href="<?=WEB_URL?><?=base_url();?>">Home</a></div>
<div class="erji">
</div>
</div>


<div style="width:136.25px;" class="nav_1" onmouseover="this.className='nav_1_hov'" onmouseout="this.className='nav_1'">
<div class="nav<?if($flag=='about'){echo "1";}?>"><a title="About Us" href="<?=WEB_URL?><?=base_url();?>about">About Us</a></div>
</div>


<div style="width:136.25px;" class="nav_1" onmouseover="this.className='nav_1_hov'" onmouseout="this.className='nav_1'">
<div class="nav<?if($flag=='product'){echo "1";}?>"><a title="Products" href="<?=WEB_URL?><?=base_url();?>product">Products</a></div>
<div class="erji">
	<?foreach($clist as $cvo):?>
  <div style="width: 136.25px;" class="erji_1"><a href="<?=WEB_URL?><?=base_url();?>product?cid=<?=$cvo['id']?>" title="<?=$cvo['name']?>"><?=$cvo['name']?></a></div>
	<?endforeach;?>
  </div>
</div>


<div style="width:155.25px;" class="nav_1" onmouseover="this.className='nav_1_hov'" onmouseout="this.className='nav_1'">
<div class="nav<?if($flag=='support'){echo "1";}?>" style="width:155.25px; text-align: center;"><a title="Partner Support" style="width:155.25px; text-align: center;" href="<?=WEB_URL?><?=base_url();?>support">Partner Support</a></div>
</div>

<div style="width:136.25px;" class="nav_1" onmouseover="this.className='nav_1_hov'" onmouseout="this.className='nav_1'">
<div class="nav<?if($flag=='news'){echo "1";}?>"><a title="News" href="<?=WEB_URL?><?=base_url();?>news">News</a></div>
</div>

<div style="width:136.25px;" class="nav_1" onmouseover="this.className='nav_1_hov'" onmouseout="this.className='nav_1'">
<div class="nav<?if($flag=='feedback'){echo "1";}?>"><a title="Feedback" href="<?=WEB_URL?><?=base_url();?>feedback">Feedback</a></div>
</div>


<div style="width:136.25px;" class="nav_1" onmouseover="this.className='nav_1_hov'" onmouseout="this.className='nav_1'">
<div class="nav<?if($flag=='contact'){echo "1";}?>"><a title="Contacts" href="<?=WEB_URL?><?=base_url();?>contact">Contacts</a></div>
</div>




</div>
</div>
<!--menu end-->
</div>
