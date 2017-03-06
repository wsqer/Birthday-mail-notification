
<?php
	require("config.php");
    require_once 'daly.class.php';
	$today=date("Y-m-d");
    $lunar = new Daly();
    //公历转农历
    $nl = date("Y-m-d",$lunar->S2L($today));

	 $md=substr($nl,5,5);
	$ks_ddl=mysql_query("select * from send where bg_nday like '%$md'");
	while($ks_out=mysql_fetch_array($ks_ddl))
	{
		$username=$ks_out['bg_name'];
		$userbirth=$ks_out['bg_nday'];
		$useremail=$ks_out['bg_email'];
		$userbeizhu=$ks_out['remarks'];
		$years=$nl-$userbirth;
		$smtpemailto=$useremail;
		$mailtitle="来自wsqer的生日提醒哦！";
		$mailcontent="农历".$userbirth.$userbeizhu.$years;
		include 'email/sendmail.php';
	}
?>
 