<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="lang="en-US""> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="lang="en-US""> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="lang="en-US""> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en-US" class="no-js">
<!--<![endif]-->
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<title><?=WEB_NAME?></title>
<?=$style?>
</head>
<!-- Body
  ================================================== -->
<body>
<!-- Begin Site
  ================================================== -->
<div class="sitecontainer">

  <div class="clear"></div>
  <!-- Custom Section Layout -->
  <div class="flash">
    <form action="<?=WEB_URL?><?=base_url();?>locked" method="post">
      <input type="password" name="pass" />
      <input type="submit" value="提交"/>
    </form>
  </div>
</div>
<!-- End Site Container -->
<!-- Close Mainbody and Sitecontainer and start footer
  ================================================== -->

</body>
</html>
