<div class="top">
    <div class="inbox ui-row">
        <div class="ui-fix-l" id="conve">
            <div class="top-conve js-conve"> <a href="http://weibo.com/lairendaojia" target="_blank" title="关注官方微博" class=" icon-base icon-wb"></a> <a href="http://weibo.com/lairendaojia" target="_blank" title="关注网官方微博" class=" icon-base icon-wb active"></a> </div>
            <div class="top-conve js-conve" id="conveWx"> <a href="javascript:;" class=" icon-base icon-wx" title="关注官方微信"></a> <a href="javascript:;" class=" icon-base icon-wx active" title="关注官方微信"></a> </div>
            <div id="tipImg"> <img src="<?=__STATIC__;?>client/weixin.png" alt="关注官方微信" title="关注官方微信"> </div>
            <span class="ml-10">全国统一服务热线：<?=WEB_PHONE?></span> </div>
        <div class="ui-fluid-warp text-r">
            <div class="ui-fluid"> <span class="mr-10">你好，欢迎来到<?=WEB_NAME?>官网！</span></div>
        </div>
    </div>
    <script>
        $("#conveWx").hover(function(){
            $("#tipImg").show();
        },function(){
            $("#tipImg").hide();
        })
    </script>
</div>

<div class="nav">
    <div class="inbox ui-row">
        <div class="ui-fix-l"> <a href="http://sy.lairen.com/" class="icon"> <img src="<?=__STATIC__;?>client/logo.png" alt="logo"> </a> </div>
        <div class="ui-fluid-warp">
            <div class="ui-fluid">
                <ul class="nav-bar clearfix">
                    <li><a href="<?=WEB_URL?>">首页</a></li>
                    <li><a href="/<?=base_url();?>about/">关于优尼客</a></li>
                    <li><a href="/<?=base_url();?>fuwu/">家庭服务</a></li>
                    <li><a href="/<?=base_url();?>huodong/">活动专区</a></li>
                    <li><a href="/<?=base_url();?>contact/">联系我们</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>