<!--sidebar-menu-->
  <span style="display:none" id="sidebar_act"><?=$typenum;?></span>
<div id="sidebar">
  <ul>
      <li id="li_1"><a href="<?=MANAGE_URL?>?node_id=1" class=""><i class="icon icon-home"></i> 首页</a></li>
  <? foreach($sidebar as $key=>$vo):?>
    <li class="submenu" id="li_f_<?=$vo['id']?>"> <a href="<?=base_url().$vo['name']?>"><i class="icon <?=$vo['icon']?>"></i> <span><?=$vo['title']?></span></a>
      <?if(!empty($vo['child'])):?>
      <ul>
        <?foreach($vo['child'] as $k=>$v):?>
        <?if($_SESSION['ausername']!='root' && $key==0 && $k>0){}else{?>
        <li id="li_<?=$v['id']?>"><a href="<?=MANAGE_URL;?><?=base_url().$v['name']?>?node_id=<?=$v['id']?>"><i class="icon  icon-minus"></i> <?=$v['title']?></a></li>
        <?}?>
        <?endforeach;?>
      </ul>
      <?endif;?>
    </li>
  <?endforeach;?>
  </ul>
</div>
<script>
  var num=$("#sidebar_act").html();
  if(num>0){
    //查看是子还是父
    if($("#li_"+num).parent('ul').parent('li').hasClass('submenu')){//子
      $("#li_"+num).addClass('active');
      $("#li_"+num).parent('ul').show();
      $("#li_"+num).parent('ul').parent('li').addClass('active', 'open');
    }else{//父
      $("#li_"+num).addClass('active');
    }
  }
</script>
<!--sidebar-menu-->