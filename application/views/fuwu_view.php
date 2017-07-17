<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="renderer" content="webkit">
    <title><?= $info['name'] ?>_<?= WEB_NAME ?></title>
    <meta name="description" content="<?= WEB_DESCRIPTION ?>。">
    <meta name="Keywords" content="<?= WEB_KEYWORDS ?>">
    <?= $style ?>
    <link type="text/css" rel="stylesheet" href="<?= __STATIC__; ?>client/new.css">
    <link type="text/css" rel="stylesheet" href="<?= __STATIC__; ?>client/detail.css">
</head>
<body class="min-width">
<?= $header ?>
<div class="bg-e8 lr-border" style="background-color:#F6F6F6;">
    <div class="select">
        <div class="content" style="width:1100px;margin:auto; padding:15px 0 0px;">
            <label class="serve_name"><?=$info['name']?></label><br/>
            <span><?=$info['description']?></span>
        </div>
    </div>
    <div class="inbox">
        <div class="panel no-border home-pro">

            <div class="content" style="">
                <div class="serve_details">

                    <div class="tab_content">
                        <div class="tab_pane active">
                            <div class="serve_left">
                                <div class="main_pic">
                                    <div class="img_wrap">
                                        <img src="<?=WEB_URL?>data/product/<?=$info['img']?>" alt="<?=$info['name']?>">
                                    </div>


                                </div>

                                <div class="share_wrap">
                                    <div class="bdsharebuttonbox clearfix inline va-m bdshare-button-style1-16" data-bd-bind="1499784601187"> <a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a> </div>
                                    <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                                </div>
                                <div class="services_detail">

                                    <div class="detail_item action" id="detail_item_1" style="background-color:#fff;">
                                        <span class="detail_item_title"><i></i>服务特点</span>
                                        <div class="detail_item_content">
                                            <?=$info['content']?>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="serve_right">
                        <div class="line"></div>
                        <div class="serve_right_wrap">
                            <div class="serve_order" style="background-color:#fff;">


                                <div>
                                    <span class="pn time_pn"><i></i>客户姓名</span>
                                    <div class="date_input">
                                        <input class="date-js-for-ie hasDatepicker" name="name" value="" style="color: rgb(153, 153, 153);"
                                               type="text">
                                    </div>

                                    <span class="pn time_pn"><i></i>联系方式(可填写电话、微信、QQ、邮箱等)</span>
                                    <div class="date_input">
                                        <input class="date-js-for-ie hasDatepicker" name="tel" value="" style="color: rgb(153, 153, 153);"
                                               type="text">
                                    </div>

                                    <link rel="stylesheet" href="<? echo __STATIC__;?>/amaze/bootstrap-datetimepicker.min.css"/>
                                    <script src="<? echo __STATIC__;?>/amaze/bootstrap-datetimepicker.min.js"></script>
                                    <script src="<? echo __STATIC__;?>/amaze/bootstrap-datetimepicker.zh-CN.js"></script>

                                    <span class="pn time_pn"><i></i>服务时间</span>
                                    <div class="date_input">
                                        <input class="date-js-for-ie hasDatepicker" id="date_start" value="如：2014-03-08"
                                               placeholder="如：2014-03-08" id="date" style="color: rgb(153, 153, 153);"
                                               type="text" readonly>
                                    </div>
                                    <input type="hidden" id="dtp_input1" name="act_date" />

                                </div>
                                <script>
                                    $("#date_start").datetimepicker({
                                        language:  'zh-CN',
                                        weekStart: 1,
                                        autoclose: 1,
                                        todayHighlight: 1,
                                        startView: 2,
                                        minView: 2,
                                        forceParse: 0

                                    })
                                </script>

                                <div class="prop_nv district_prop">
                                    <span class="pn"><i></i>服务地区</span>
                                    <ul>
                                        <?php foreach($clist as $vo):?>

                                        <li class="hk_select"><span><?=$vo['name']?></span><i></i>
                                        </li>
                                        <?php endforeach;?>

                                    </ul>
                                    <div class="clearboth"></div>
                                    <div class="district-prompt"
                                         style="display: none; color: #666; background: #faeed4; margin: 0 10px 10px 0; line-height: 26px; text-align: left; border: 1px solid #f7a700; padding: 0px 10px 0px 10px;">
                                        <img src="./images/consume-icon06.png"
                                             style="vertical-align: middle; padding-right: 3px;"><span></span>
                                    </div>
                                </div>

                                <div class="wave_line"></div>
                                <div class="serve_maininfo">
                                    <div class="serve_info"></div>
                                    <div class="serve_btn_wrap">
                                        <div class="serve_price_wrap ">
                                            <div>
                                                <span class="price_name">服务价格:</span><span class="serve_price"
                                                                                           id="price">￥199.00</span>

                                            </div>
                                        </div>

                                        <div>
                                            <span class="b_btn large disabled createOrder">请完善服务需求</span>
                                        </div>
                                    </div>
                                    <div class="serve_promotion_info none"></div>
                                </div>
                                <form id="sevicesForm" name="sevicesForm"
                                      action="http://www.homeking365.com/order/checkOrder" method="get">
                                    <input name="servicesId" value="8" id="servicesId" type="hidden"> <input
                                            name="quantity" value="1" type="hidden"> <input name="datetime"
                                                                                            type="hidden">
                                    <input name="skuId" type="hidden">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="clearboth"></div>
            </div>
        </div>
    </div>
</div>
<?= $footer ?>
</body>
</html>
