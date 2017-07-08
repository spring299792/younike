<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title><?=$title?>-<?=WEB_NAME?></title>
<meta name="keywords" content="<?=$title?>">
<meta name="description" content="<?=$title?>">
<?=$style?>
</head>

<body>


<div id="mainny_kuanping">

<?=$header?>

<div class="zbmain">

<?=$left;?>


<div class="nyjj"></div>
<div class="zbright">

<div id="right_main">

<div class="right_dh">
<div class="right_dh_l"></div>
<div class="right_dh_txt"><?=$typename?></div>
<div class="right_dh_r"></div>
<div class="clear"></div>
</div>
<div class="right_ny">
<br>
    <div style="line-height:40px;"> 


    <script type="text/javascript" language="javascript">
     function checkadd()
     {
         if (document.feedback.name.value=='')
         {alert("Please put the name!");
         document.feedback.name.focus
         return false
         }
         if ($("#tel").val()=='')
         {alert("Please put the Tel!");
         document.feedback.tel.focus
         return false
         }
          if (document.feedback.email.value=='')
         {alert("Please put the email address!");
         document.feedback.email.focus
         return false
         }
         var Mail = document.feedback.email.value;
         if(Mail.indexOf('@',0) == -1 || Mail.indexOf('.',0) == -1)
         {
          alert('Please put the correct e-mail address！');
          document.feedback.email.focus();
          return false;
         }
          
     }
      </script>
    
    <form onsubmit="return checkadd();" id="feedback" name="feedback" method="post" action="<?=WEB_URL.base_url()?>finsert">
    <table width="100%" cellspacing="1" cellpadding="3" border="0">
        
          <tbody><tr>
            <td bgcolor="#E2E9EF" align="center" class="color_huise2" colspan="2"><strong style="color:#000000">Post your feedback</strong></td>
            </tr>
          <tr>
            <td align="right" class="color_huise2">Your Name :</td>
               <td align="left"><input type="text" onkeyup="this.value=this.value.replace(/'/g,'')" maxlength="50" size="40" id="name" name="name">
                <span class="red">*</span></td>
          </tr>
          <tr>
            <td align="right" class="color_huise2">Tel :</td>
               <td align="left"><input type="text" onkeyup="this.value=this.value.replace(/'/g,'')" maxlength="50" size="40" id="tel" name="tel">
                <span class="red">*</span></td>
          </tr>
          <tr>
            <td align="right" class="color_huise2">Your Company :&nbsp;</td>
            <td align="left"><input type="text" maxlength="255" size="50" id="add" name="company"></td>
          </tr>
          <tr>
            <td align="right" class="color_huise2">Fax :&nbsp;</td>
            <td align="left"><input type="text" maxlength="50" size="30" id="tel" name="fax"></td>
          </tr>
          <tr>
            <td align="right" class="color_huise2">Address :&nbsp;</td>
            <td align="left"><input type="text" maxlength="50" size="40" id="fax" name="address"></td>
          </tr>
          <tr>
            <td align="right" class="color_huise2">E-mail :&nbsp;</td>
            <td align="left"><input type="text" maxlength="50" size="50" id="email" name="email">
                <span class="red">*</span></td>
          </tr>
          <tr>
            <td align="right" class="color_huise2">Zip Code :&nbsp;</td>
            <td align="left"><input type="text" maxlength="50" size="20" id="website" name="zipcode"></td>
          </tr>
          <tr>
            <td align="right" class="color_huise2">I am a(n) :&nbsp;</td>
            <td align="left"><input type="text" maxlength="50" size="50" id="msn" name="iam"></td>
          </tr>
          <tr>
            <td align="right" class="color_huise2">Country :&nbsp;</td>
            <td align="left"><input type="text" maxlength="50" size="50" id="country" name="country"><br></td>
          </tr>
          <tr>
            <td align="right" class="color_huise2">URL :&nbsp;</td>
            <td align="left"><input type="text" maxlength="50" size="50" id="msn" name="url"><br></td>
          </tr>
          <tr>
            <td align="right">Product Interest</td>
            <td align="left"></td>
          </tr>
          <tr>
            <td align="right" class="color_huise2">I am interested in</td>
            <td align="left">
            <select name="interested" id="">
                <option value="switch">switch</option>
                <option value="router">router</option>
                <option value="module">module</option>
                <option value="security firewall">security firewall</option>
                <option value="Wireless item">Wireless item</option>
                <option value="memory  & cable">memory  & cable</option>
                <option value="cisco chassis">cisco chassis</option>
            </select>equipment
            <br></td>
          </tr>
          <tr>
            <td align="right" class="color_huise2">Equipment Conditions</td>
            <td align="left"><select name="conditions" id="">
                <option value="clean">clean</option>
                <option value="covered">covered</option>
            </select><br></td>
          </tr>
          <tr>
            <td align="right" class="color_huise2">Details :&nbsp;</td>
            <td align="left"><textarea onkeyup="this.value=this.value.replace(/'/g,'')" id="content" rows="12" cols="60" name="detail"></textarea><br></td>
          </tr>
          <tr>
            <td align="right">&nbsp;</td>
            <td align="left">(All * must be filled in)</td>
          </tr>
          <tr>
            <td align="right">&nbsp;</td>
            <td align="left"><input type="submit" value="Submit" id="OK" class="input_submit">
              &nbsp;&nbsp;
              <input type="reset" value="Reset" class="input_submit" name="reset"></td>
          </tr>
        
      </tbody></table></form> </div> 
      </div>
      </div>
</div>
</div>
</div>
<div class="clear"></div>
  
<?=$footer?>
</body></html>