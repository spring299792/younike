<!--Header-part-->
<div id="header">
  <!-- <h1><a href="dashboard.html"><? echo MANAGE_NAME;?></a></h1> -->
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="<? echo MANAGE_URL;?><?=base_url();?>main/changepass" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text"><? echo $nickname;?></span></a>

    </li>

    <li class=""><a title="" href="<? echo MANAGE_URL;?><?=base_url();?>center/logout"><i class="icon icon-share-alt"></i> <span class="text">退出</span></a></li>
  </ul>
</div>
