<ul class="about-nav clearfix">
    <?php foreach($pages as $vo):?>
    <li><a href="/<?=base_url()?><?=$vo['name']?>/"<?php if($page_type == $vo['name']):?> class="active"<?php endif;?>><?=$vo['title']?></a></li>
    <?php endforeach;?>
</ul>