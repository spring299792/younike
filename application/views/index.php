<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="renderer" content="webkit">
<title>首页_<?=WEB_NAME?></title>
<meta name="description" content="<?=WEB_DESCRIPTION?>。">
<meta name="Keywords" content="<?=WEB_KEYWORDS?>">
<?=$style?>
    <link rel="stylesheet" type="text/css" href="<?=__STATIC__;?>client/lrtk.css">
<script src="<?=__STATIC__;?>client/jquery.superslide.2.1.1.js"></script>
</head>
<body class="min-width">
<?=$header?>

<div class="banners" id="banner" style="overflow-x: hidden">
    <div class="www51buycom">
        <ul class="51buypic">
            <?php foreach($focus as $vo):?>
            <li><a href="<?=$vo['url']?>" target="_blank" title="<?=$vo['title']?>"><img src="<?=WEB_URL?>data/flash/<?=$vo['img']?>" /></a></li>
            <?php endforeach;?>
        </ul>
        <div class="num">
            <ul></ul>
        </div>
    </div>
    <script>
        /*鼠标移过某个按钮 高亮显示*/
        $(".prev,.next").hover(function(){
            $(this).fadeTo("show",0.7);
        },function(){
            $(this).fadeTo("show",0.1);
        })
        $(".www51buycom").slide({ titCell:".num ul" , mainCell:".51buypic" , effect:"fold", autoPlay:true, delayTime:700 , autoPage:true });
    </script>
</div>

<div class="inbox home-we">
  <div class="panel no-border">
    <div class="panel-heading">为什么选择我们</div>
    <div class="panel-body row">
        <?php foreach($four as $vo):?>
      <div class="col-3 text-c"> <i class="icon icon-base icon-we-bz"><img src="<?=WEB_URL?>data/flash/<?=$vo['img']?>" alt=""></i>
        <div class="home-we-list"> <strong class="f-16"><a href="<?=$vo['url']?>" style="color:#666;" target="_blank"><?=$vo['title']?></a></strong>
          <p class=""><?=$vo['description']?></p>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</div>

<div class="bg-e8">
  <div class="inbox">
    <div class="panel no-border home-pro">
      <div class="panel-heading">预约我们的服务</div>
      <div class="panel-body home-pro-ul clearfix" style="border:none;">
        <div class="reserve_wrap">
            <?php foreach($pros as $vo):?>
          <div class="reserve_wrap_content">
            <div class="reserve_wrap_content_inside"> <a href="/<?=base_url();?>fuwu/<?=$vo['id']?>" class="pic" target="_blank"> <img src="<?=WEB_URL?>data/product/<?=$vo['litpic']?>" alt="<?=$vo['name']?>"> </a>
              <label> <span class="reserve_name"><?=$vo['name']?></span><br>
              <span class="reserve_info"><?=$vo['description']?></span> </label>
              <div class="dashed"></div>
              <label>
              <span class="reserve_price"><?=$vo['price']?></span>
              <div class="reserve_other_price"> <span class="reserve_info2"><?=$vo['intro']?></span> </div>
              <span class="reserve_info2  hover_btn"> </span><a href="/<?=base_url();?>fuwu/<?=$vo['id']?>" class="right b_btn small" title="立即预定">立即预定</a>
              </label>
            </div>
          </div>
            <?php endforeach;?>
          
          <div class="clearboth"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?=$footer?>
</body>
</html>
