<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="renderer" content="webkit">
    <title>家庭服务_<?=WEB_NAME?></title>
    <meta name="description" content="<?=WEB_DESCRIPTION?>。">
    <meta name="Keywords" content="<?=WEB_KEYWORDS?>">
    <?=$style?>
    <link type="text/css" rel="stylesheet" href="<?=__STATIC__;?>client/new.css">
</head>
<body class="min-width">
<?=$header?>
<div class="bg-e8 lr-border" style="background-color:#F6F6F6;">
<div class="select">
        <div class="content" style="width:1100px;margin:auto;">
                <span class="title">　　分类：</span>
                <ul>
                    <li<?php if($cid == ''):?> class="active"<?php endif;?>><a href="/<?=base_url()?>fuwu/">所有分类</a></li>
                    <?php foreach($clist as $vo):?>
                        <li<?php if($cid == $vo['id']):?> class="active"<?php endif;?>><a href="/<?=base_url()?>fuwu_<?=$vo['id']?>"><?=$vo['name']?></a></li>
                    <?php endforeach;?>
                </ul>
        </div>
    </div>
  <div class="inbox">
    <div class="panel no-border home-pro">
      
      <div class="panel-body home-pro-ul clearfix" style="border:none;">
        <div class="reserve_wrap">
            <?php foreach($list as $vo):?>
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
        <div class="page mb-20 text-r mt-20 text-c page-sm">
            <div class="page-inner clearfix">
                <ul class="pull-l">
                    <li class="page-item prev"><a href="<?=WEB_URL?><?=base_url();?>fuwu<?php if($cid>0){ echo '_'.$cid;}?>?page=<?=$prev?>" class="page-num"> <span class="arrow-l"></span> <span class="ml-5">上一页</span> </a></li>
                    <?php for($p = 1;$p<=$pages; $p++):?>
                        <?php if($p == $page):?>
                            <li class="page-item active"><a class="page-num"><?=$p?></a></li>
                        <?php else:?>
                            <li class="page-item"><a href="<?=WEB_URL?><?=base_url();?>fuwu<?php if($cid>0){ echo '_'.$cid;}?>?page=<?=$p?>" class="page-num"><?=$p?></a></li>
                        <?php endif;?>
                    <?php endfor;?>
                    <li class="page-item next"><a href="<?=WEB_URL?><?=base_url();?>fuwu<?php if($cid>0){ echo '_'.$cid;}?>?page=<?=$next?>" class="page-num"> <span class="mr-5">下一页</span> <span class="arrow-r"></span> </a></li>
                    <div class="page-total">共 <?=$pages?> 页</div>
                </ul>
            </div>
        </div>
    </div>
  </div>
</div>
<?=$footer?>
</body>
</html>
