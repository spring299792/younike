<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="renderer" content="webkit">
    <title><?=$info['title']?>_<?=WEB_NAME?></title>
    <meta name="description" content="<?=WEB_DESCRIPTION?>。">
    <meta name="Keywords" content="<?=WEB_KEYWORDS?>">
    <?=$style?>
</head>
<body class="min-width">
<?=$header?>
<div class="lr-border">
  <div class="inbox">
    <div class="panel no-border activity">
      <div class="panel-heading activity-heading">优尼客-优惠活动享不停</div>
      <div class="panel-body ">
        <div class="ui-row">
          <div class="ui-fluid-warp">
            <div class="ui-fluid">
              <div class="activity-detail panel">
                <div class="panel-heading no-border-bottom">
                  <p class="activity-detail-title"> <strong class=" f-16 c-666 "><?=$info['title']?></strong> </p>
                  <div class="c-999 mt-10"> <span class="inline va-m mr-10"> 活动时间：<?=$info['act_date']?>&nbsp;&nbsp;&nbsp;&nbsp; 查看次数：<?=$info['click']?> </span>
                    <div class="bdsharebuttonbox clearfix inline va-m bdshare-button-style1-16" data-bd-bind="1499784601187"> <a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a> </div>
                      <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

                  </div>
                </div>
                <div class="panel-body pos-r">
                  <div class="activity-img"> </div>
                  <p class="activity-content"><span style="color:#393939;font-family:&quot;font-size:13px;background-color:#F5F5F5;"><?=$info['content']?></span></p>
                </div>
                <div class="panel-footer">


                          <div class="about-footer text-l"> <a href="<?php if($prev):?>/<?=base_url()?><?=$type?>/<?=$prev['id']?><?php else:?>javascript:;<?php endif;?>"> <strong>上一条：</strong> <span><?php if($prev){ echo $prev['title'];}else{ echo '没有了';}?></span> </a> <a href="<?php if($next):?>/<?=base_url()?><?=$type?>/<?=$next['id']?><?php else:?>javascript:;<?php endif;?>"> <strong>下一条：</strong> <span><?php if($next){ echo $next['title'];}else{ echo '没有了';}?></span> </a> </div>
                </div>
              </div>
            </div>
          </div>
          <?=$right;?>
        </div>
      </div>
    </div>
  </div>
</div>
<?=$footer?>
</div>
</body>
</html>
