<?php 
	session_start();
	include("../config.php");
	$now_d=date("Y-m-d");
	$emailin=$_SESSION["email"];
	if(isset($_SESSION["email"]) && isset($_POST["userx"]))
	{
		$uname=$_POST["i_name"];
		$upwd=$_POST["i_pwd2"];
		if($_POST["i_pwd1"]=="" || $_POST["i_pwd2"]=="")
		{
			if($_POST["i_pwd1"]=="" && $_POST["i_pwd2"]=="")
			{
				mysql_query("update users set u_name='$uname'");
			}
		}	
		else if($_POST["i_pwd1"]== $_POST["i_pwd2"])
		{
			mysql_query("update users set u_name='$uname',u_pwd='$upwd'");
		}
		else
		{
			echo "<script>alert('密码不一致！！')</script>";
		}
	}

	if(isset($_POST["l_new"]) &&isset($_SESSION["email"]))
	{
		
		mysql_query("insert into send (bg_nday,bg_name,bg_email,remarks)values('$_POST[l_day]','$_POST[l_name]','$emailin','$_POST[l_bei]')");
		echo "<script>window.location.href='#work'</script>";
	}
	if(isset($_GET["del"]) &&isset($_SESSION["email"]))
	{
		mysql_query("delete from send where bg_id='$_GET[del]' and bg_email='$emailin'");
		echo "<script>window.location.href='#work'</script>";
	}
	if(isset($_GET["logout"]))
	{
		unset($_SESSION['email']);
		echo "<script>window.location.href='../index.php'</script>";
	}


$userinfo=mysql_fetch_array(mysql_query("select * from users where u_email='$_SESSION[email]'"));
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
<link rel="shortcut icon" type="image/x-icon" href="img/head.ico" media="screen" />
<!-- Basics -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Home</title>
<link name="author" href="" />
<meta name="description" content="">

<!-- Favicons -->
<link rel="shortcut icon" href="img/favicons/favicon.ico">

<!-- Mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS -->
<link rel="stylesheet" href="css/normalize.min.css">
<link rel="stylesheet" href="css/main.css">

<!-- Fonts -->
<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:300,400,700'>

 
</head>
<body>   

<div class="wrapper">

	<header>
		<a class="menu-icon jiji">
			<span></span>
		</a>
		<nav class="menu visuallyhidden">
			<ul>
				<li><a href="#home">主页</a></li>
				<li><a href="#about">个人信息</a></li>
				<li><a href="#work">生日列表</a></li>
				<li><a href="#contact">查询</a></li>
				<li><a href="?logout=true">注销</a></li>
			</ul>
		</nav>
	</header>

	<section id="home" class="row">
		<div class="overlay">
			<div class="col home-title jiji">
				<h1>后台管理</h1>
				<h2>Admin</h2>
				<a href="#"  class="but" onClick="alert('app正在开发中,软件上线之后我们会在第一时间通过邮件通知你！\n\n >敬请期待<')">Download App</a>
			</div>
		</div>
	</section>

	<section id="about" class="row">
		<div class="page about-content">
			<div class="col about-title">
				<h3
					data-100="-webkit-transform: translateX(100px); opacity:0;"
					data-500="-webkit-transform: translateX(0px); opacity:1;"
				>我的个人信息/修改</h3>
			</div>
			<div class="col empty">&nbsp;</div>
			<div class="col about-description">
				<form action="" method="post">
					
				<table width="60%" border="0">
				  <tbody>
					<tr align="right">
					  <td scope="row">昵称</td>
					  <td><br/>
					    <br/>
					      <input type="text" name="i_name" value="<?php echo $userinfo["u_name"]; ?>">
					      <br>
<br/></td>
				    </tr>
					<tr align="right">
					  <td scope="row" value="<?php echo $userinfo[u_name]; ?>">邮箱</td>
					  <td>
					    <br/>
					      <input type="email" name="i_email" value="<?php echo $userinfo["u_email"]; ?>">
					      <br>
<br/></td>
				    </tr>
					<tr align="right">
					  <td scope="row">密码</td>
					  <td><br/>
					      <input type="password" name="i_pwd1">
					      <br>
<br/></td>
				    </tr>
					<tr align="right">
					  <td scope="row">确认密码</td>
					  <td><br/>
					      <input type="password" name="i_pwd2" >
					      <br>
<br/></td>
				    </tr>
					<tr align="right">
				  <br>
					  <td scope="row"><br>					    
					  <td>
					      <br>
					      <input type="submit" value="修改" class="but" name="userx">
			          <br/></td>
				    </tr>
				  </tbody>
				</table>		
				</form>
				<a href="../email/test.php?send=true" class="but" >发送一条测试邮件</a>
				
			</div>
			<div class="col empty">&nbsp;</div>
		</div>
	</section>

	
	<hr>

	<section id="work" class="row">
		<div class="work-content page">
			<div class="col work-title">
				<h3
					data-900="-webkit-transform: translateX(-100px); opacity:0;"
					data-1300="-webkit-transform: translateX(0px); opacity:1;"
				>生日列表</h3>
			</div>
			<div class="col empty">&nbsp;</div>
			<div class="col work-description">
				<p
					data-900="opacity:0;"
					data-1300="opacity:1;"
				>你是否会想起...</p>
			</div>
			<div class="col empty">&nbsp;</div>
		</div>
		<div class="work-examples page">
		<?php 
			$v_qer=mysql_query("select * from send where bg_email='$_SESSION[email]'  order by bg_id asc");
			$i_w=1;
			while($out_all=mysql_fetch_array($v_qer))
			{
				require_once("../daly.class.php");
				$lunar = new Daly();
				//公历转农历
				
				$md=substr($out_all["bg_nday"],5,5);
				$nl_x=substr($now_d,0,5);
				$bgs=$nl_x.$md;
				$date_n= date("Y-m-d",$lunar->L2S($bgs));
			?>
			<div class="col work-item"
				data-1300="opacity:0;"
				data-1400="opacity:1;"
			>
			<div class="birth">
			

			<h2><?php echo $i_w++; ?></h2>
			<br>
			<h3><?php echo $out_all["bg_name"]; ?></h3>
			<br>
			<h3>农历：<?php echo $out_all["bg_nday"]; ?></h3>
			<br>
			<h3>新历：<?php echo $date_n; ?></h3>
			<br>
			<h3>备注：<?php echo $out_all["remarks"]; ?></h3>
			<br><br>
			
			</div>
				<div class="work-item-inside">
					<div class="work-item-inside-content">
						<h4><?php echo $out_all["bg_name"]; ?></h4>
						<a href="build.php?id=<?php echo $out_all['bg_id'];  ?>" class="but">编辑</a>
						<br><br><a href="?del=<?php echo $out_all['bg_id']; ?>" class="but">删除</a>
					</div>
				</div>
			</div>
			
			 <?php
			}
			?>                
		</div>
	</section>
	<form action="" method="post">
<table width="100%" border="0" cellpadding="10" align="center">
  <tbody>
    <tr >
      <th colspan="2" >录入生日数据</th>
      </tr>
    <tr align="right">
      <td>名字</td>
      <td align="center"><br>        
             <input type="text" name="l_name">
        <br>
<br></td>
    </tr>
    <tr align="right">
      <td>农历日期</td>
      <td align="center"><br>         <input type="date" name="l_day" >
        <br>
        <br></td>
    </tr>
    <tr align="right">
      <td>备注</td>
      <td align="center"><br>        <input type="text" name="l_bei">
        <br>
        <br></td>
    </tr>
    <tr align="center">
      <td>&nbsp;</td>
      <td><br>        <input type="submit" name="l_new" class="but" value="提交">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br></td>
    </tr>
  </tbody>
</table>
</form>
	<hr>

	<section id="contact" class="row">
		<div class="contact-content page">
			<div class="col contact-title">
				<h3
					data-100="-webkit-transform: translateX(100px); opacity:0;"
					data-500="-webkit-transform: translateX(0px); opacity:1;"
				>公共查询</h3>
			</div>
			<div class="col empty"></div>

				<form actoin="" method="post">
				<select size="1" name="year">
					<option value="old">农历</option>
				</select>
					<select size="1" name="month">
						  <option value ="01">1月</option>
						  <option value ="02">2月</option>
						  <option value ="03">3月</option>
						  <option value ="04">4月</option>
						  <option value ="05">5月</option>
						  <option value ="06">6月</option>
						  <option value ="07">7月</option>
						  <option value ="08">8月</option>
						  <option value ="09">9月</option>
						  <option value ="10">10月</option>
						  <option value ="11">11月</option>
						  <option value ="12">12月</option>
					</select>
					&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="but" name="select" value="查询">
				</form>
				<br><br>
				<table width="100%" border="1" cellpadding="10" align="center">
			  <tbody>
				<tr>
				  <td>编号</td>
				  <td>姓名</td>
				  <td>农历</td>
				  <td>备注</td>
				</tr>
							<?php
				if(isset($_POST["select"]) &&isset($_SESSION["email"]))
		{

			$oldmonth=$_POST["month"];
			$selectall=mysql_query("select * from send where bg_nday like '%-$oldmonth-%' and bg_email='$_SESSION[email]'");
			$printall="";
			$i=1;
			while($cjk=mysql_fetch_array($selectall))
			{
				?>
				<tr>
				  <td><?php echo $i++; ?></td>
				  <td><?php echo $cjk["bg_name"]; ?></td>
				  <td><?php echo $cjk["bg_nday"]; ?></td>
				  <td>&<?php echo $cjk["remarks"]; ?></td>
				</tr>
								<?php
			}
		echo "<script>window.location.href='#contact'</script>";	
		}
			?>
			  </tbody>
			</table>


				

		</div>
	</section>

	<footer id="footer" class="row">
		<div class="footer-content page">
			<div class="col f1">
				<p>蜀ICP备17003172号
				<a target="_blank" href="http://www.wsqer.cn">wsqer</a></p>
			</div>
		</div>
	</footer>

</div>

<div class="loader"></div>

<!-- JavaScript -->
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/modernizr-2.6.2.min.js"></script>
<script src="js/skrollr.js"></script>
<script src="js/main.js"></script>

</body>

</html>