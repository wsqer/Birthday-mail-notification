<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
	session_start();
	include("../config.php");
	$ids=$_GET["id"];
	if(isset($_SESSION["email"]) && isset($_POST['sub']))
	{
		
		$name=$_POST["name"];
		$day=$_POST["daly"];
		$bei=$_POST["bcv"];
		mysql_query("update send set bg_nday='$day',bg_name='$name',remarks='$bei' where bg_id=$ids");
		
	}
	$view=mysql_fetch_array(mysql_query("select * from send where bg_id='$ids'"));
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="img/head.ico" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>编辑</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>

<body>
<!--登录开始-->
   <h2><a href="personal.php#work">返回</a></h2>
    <div class="reg login">
    
        <form action="" method="post" name="form1" id="form1">
            <table width="80%" border="1" cellpadding="10" align="center">
  <caption>
    修改生日项&<?php echo $view["bg_email"]; ?>
  </caption>
  <tbody>
    <tr>
      <td align="right">昵称</td>
      <td align="center"><input type="text" name="name" value="<?php echo $view["bg_name"]; ?>"></td>
    </tr>
    <tr>
      <td align="right">农历生日</td>
      <td align="center"><input type="text" name="daly" value="<?php echo $view["bg_nday"]; ?>"></td>
    </tr>
    <tr>
      <td align="right">备注</td>
      <td align="center"><input type="text" name="bcv" value="<?php echo $view["remarks"]; ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center"><input type="submit" name="sub" value="修改"></td>
    </tr>
  </tbody>
</table>

        </form>                      
    </div>
<!--登录结束-->   
</body>
</html>