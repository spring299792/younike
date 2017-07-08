<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页 - <?=WEB_NAME?></title>
	<?=$style?>
</head>
<body>
	<div class="wrap">
		
	
	<!-- top -->
	<?=$header?>
	<!-- flash -->
	<?php if(count($focus[1])>0):?>
	<div class="focus">
		<div id="show_box" class="show_box">
			<div class="bd">
				<ul>
				
				<?php foreach($focus[1] as $vo):?>
					<li><a href="<?=$vo['url']?>" target="_blank" title="<?=$vo['title']?>"><img src="<?=WEB_URL.'/data/flash/'.$vo['img']?>" /></a></li>
				<?php endforeach;?>
				
				</ul>
			</div>
			<div class="hd">
				<ul>
				<?php foreach($focus[1] as $vo):?>
				<li></li>
				<?php endforeach;?>
				</ul>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		jQuery(".show_box").slide({mainCell:".bd ul",autoPlay:true});
	</script>
	<?php endif;?>
	<!-- product -->
	<?php if(count($focus[3])>0):?>
	<div class="index_pro swiper-container">
      <div class="swiper-wrapper">
      	<?php foreach($focus[3] as $k=>$vo):?>
        <div class="swiper-slide">
          <div class="pic"><div class="circle" style="display: none;"><canvas id="step<?=$k?>" width="162" height="162"></canvas></div><img src="<?=WEB_URL.'/data/flash/'.$vo['img']?>" alt="" width="266" height="266"></div>
          <p class="tit"><?=$vo['title']?></p>
          <p class="link"><a href="<?=$vo['url']?>" target="_blank">进一步了解+</a></p>
          </div>
 		<?php endforeach;?>
      </div>
	</div>
	<?php endif;?>
	<div class="mid_bg"></div>
	<?php if(count($focus[2])>0):?>
	<!-- ad1 -->
	<?php foreach($focus[2] as $k=>$vo):?>
	<div class="index_ad">
		<a href="<?=$vo['url']?>" target="_blank" title="<?=$vo['title']?>"><img src="<?=WEB_URL.'/data/flash/'.$vo['img']?>" alt=""></a>
	</div>
	<?php endforeach;?>
	<?php endif;?>
	<!-- footer -->
	<?=$footer?>
	</div>
<script>
$(function(){
	function stepCircleLoop(){
		$('#step1').circleProgress({value:1,startAngle:-33,thickness:5,reverse:true,size:162,fill:{color:"#9b1b1a"}});
		$('#step2').circleProgress({value:1,startAngle:-33,thickness:5,reverse:true,size:162,fill:{color:"#9b1b1a"}});
		$('#step3').circleProgress({value:1,startAngle:-33,thickness:5,reverse:true,size:162,fill:{color:"#9b1b1a"}});
		$('#step4').circleProgress({value:1,startAngle:-33,thickness:5,reverse:true,size:162,fill:{color:"#9b1b1a"}});}
		

$(".swiper-wrapper .swiper-slide").each(function(){
	
	$(this).hover(function(){
	stepCircleLoop()
	$(this).find(".circle").show();
	},function(){
	$(this).find(".circle").hide();
	})
	
	})

	
	})

</script>
</body>
</html>