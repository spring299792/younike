<!DOCTYPE html>
<html lang="en">
<head>
<title><? echo MANAGE_NAME;?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?=$style;?>
</head>
<body>

<?=$top;?>
<?=$sidebar;?>

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <!-- <div id="breadcrumb"> <a title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div> -->
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-pushpin"></i></span>
            <h5>系统信息</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <tbody>
                <tr class="gradeX">
                  <td width="40%">网站域名</td>
                  <td><?php echo $_SERVER['SERVER_NAME']; ?></td>
                </tr>
                <tr class="gradeC">
                  <td>平台版本</td>
                  <td>CI <?php echo CI_VERSION; ?></td>
                </tr>
                <tr class="gradeA">
                  <td>脚本语言</td>
                  <td>PHP <?php echo PHP_VERSION; ?></td>
                </tr>
                <tr class="gradeA">
                  <td>数据库</td>
                  <td><?php echo $this -> db -> version(); ?></td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-user"></i></span>
            <h5>用户信息</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <tbody>
                <tr class="gradeX">
                  <td width="40%">当前用户</td>
                  <td><?php echo $_SESSION['ausername'] ?></td>
                </tr>
                <tr class="gradeA">
                  <td>登录IP</td>
                  <td><?php echo $this -> input -> ip_address(); ?></td>
                </tr>
                <!-- <tr class="gradeA">
                  <td>上次登录时间</td>
                  <td>Internet
                    Explorer 5.5</td>
                </tr>
                <tr class="gradeA">
                  <td>本次登录时间</td>
                  <td>Internet
                    Explorer 5.5</td>
                </tr> -->
                
              </tbody>
            </table>
          </div>
        </div>
  </div>
</div>

<!--end-main-container-part-->

<?=$footer;?>


</body>
</html>
