<?php if($type == 'about' || $type == 'zizhi'):?>
<div class="left">
			<ul>
				<li class="l_title"><img src="<?=__STATIC__;?>client/point.png" alt=""><span>关于我们</span></li>
				<li><?php if($type == 'about'):?><img src="<?=__STATIC__;?>client/point.png" alt=""><?php endif;?><a href="<?=WEB_URL?><?=base_url();?>about">关于我们</a></li>
				<li><?php if($type == 'zizhi'):?><img src="<?=__STATIC__;?>client/point.png" alt=""><?php endif;?><a href="<?=WEB_URL?><?=base_url();?>zizhi">公司资质</a></li>
			</ul>
		</div>
<?php endif;?>
<?php if($type == 'zhaopin'):?>
<div class="left">
			<ul>
				<li class="l_title"><img src="<?=__STATIC__;?>client/point.png" alt=""><span>招聘信息</span></li>
				<li><?php if($type == 'zhaopin'):?><img src="<?=__STATIC__;?>client/point.png" alt=""><?php endif;?><a href="<?=WEB_URL?><?=base_url();?>zhaopin">招聘信息</a></li>
			</ul>
		</div>
<?php endif;?>
<?php if($type == 'contact'):?>
<div class="left">
			<ul>
				<li class="l_title"><img src="<?=__STATIC__;?>client/point.png" alt=""><span>联系我们</span></li>
				<li><?php if($type == 'contact'):?><img src="<?=__STATIC__;?>client/point.png" alt=""><?php endif;?><a href="<?=WEB_URL?><?=base_url();?>contact">联系我们</a></li>
			</ul>
		</div>
<?php endif;?>
<?php if($type == 'pro'):?>
<div class="left">
			<ul>
				<li class="l_title"><img src="<?=__STATIC__;?>client/point.png" alt=""><span>产品与服务</span></li>
				<?php foreach($clist as $lvo):?>
				<li><?php if($lvo['id']==$cid):?><img src="<?=__STATIC__;?>client/point.png" alt=""><?php endif;?><a href="<?=WEB_URL?><?=base_url();?>product-<?=$lvo['id']?>"><?=$lvo['name']?></a></li>
				<?php endforeach;?>
			</ul>
		</div>
<?php endif;?>
<?php if($type == 'fangan'):?>
<div class="left">
			<ul>
				<li class="l_title"><img src="<?=__STATIC__;?>client/point.png" alt=""><span>解决方案</span></li>
				<?php foreach($clist as $lvo):?>
				<li><?php if($lvo['id']==$cid):?><img src="<?=__STATIC__;?>client/point.png" alt=""><?php endif;?><a href="<?=WEB_URL?><?=base_url();?>fangan-<?=$lvo['id']?>"><?=$lvo['name']?></a></li>
				<?php endforeach;?>
			</ul>
		</div>
<?php endif;?>
<?php if($type == 'news'):?>
<div class="left">
			<ul>
				<li class="l_title"><img src="<?=__STATIC__;?>client/point.png" alt=""><span>新闻</span></li>
				<li><?php if($type == 'news'):?><img src="<?=__STATIC__;?>client/point.png" alt=""><?php endif;?><a href="<?=WEB_URL?><?=base_url();?>news">新闻</a></li>
			</ul>
		</div>
<?php endif;?>