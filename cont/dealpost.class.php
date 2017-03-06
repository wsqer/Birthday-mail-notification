<?php 
session_start();
include "../config.php";
	if(isset($_POST["login"]))
	{
		$lo_email=$_POST["login_email"];
		$lo_pwd=$_POST["login_pwd"];
		$pwds=mysql_fetch_array(mysql_query("select * from users where u_email='$lo_email'"));

		if($lo_pwd=="")
		{
		
			echo "<script>alert('密码不能为空！！');window.location.href='../view/login.html';</script>";
			
		}
		else if($lo_pwd==$pwds['u_pwd'])
		{
			echo "登录成功";
			$_SESSION["email"]=$lo_email;
			echo "<script>window.location.href='../index.php';</script>";
		}
		else 
		{
				echo "<script>alert('账号或密码错误！');window.location.href='../view/login.html';</script>";
		}
		
	}
	if(isset($_POST["regist"]))
	{
		$reg_name=$_POST["r_name"];
		$reg_pwd=$_POST["r_pwd"];
		$reg_email=$_POST["r_email"];
		if($reg_name=='' || $reg_pwd=='' || $reg_email=='')
		{
	
				echo "<script>alert('不能为空！！');window.location.href='../view/regist.html';</script>";
		}
		else
		{
			$test=mysql_fetch_array(mysql_query("select * from users where u_email='$reg_email'"));
			if($test["u_email"]==$reg_email)
			{
				
				echo "<script>alert('该改邮箱已经注册过了！！\\n 如果是您本人的邮箱请改密码后重试。');window.location.href='../view/regist.html';</script>";
			}
			else
			{
				mysql_query("insert into users (u_name,u_pwd,u_email) values ('$reg_name','$reg_pwd','$reg_email')");
				echo "<script>alert('注册成功！\\n 前往登陆。');window.location.href='../view/login.html';</script>";
			}
		}
	}
?>