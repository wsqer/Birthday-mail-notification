<?php
session_start();
	/**
	 * ע�����ʼ��඼�Ǿ����Ҳ��Գɹ��˵ģ������ҷ����ʼ���ʱ��������ʧ�ܵ����⣬������¼����Ų飺
	 * 1. �û����������Ƿ���ȷ��
	 * 2. ������������Ƿ�������smtp����
	 * 3. �Ƿ���php���������⵼�£�
	 * 4. ��26�е�$smtp->debug = false��Ϊtrue��������ʾ������Ϣ��Ȼ����Ը��Ʊ�����Ϣ��������һ�´����ԭ��
	 * 5. ������ǲ��ܽ�������Է��ʣ�http://www.daixiaorui.com/read/16.html#viewpl 
	 *    ����������У���������Ҫ�ҵĴ𰸡�
 */
	if(isset($_GET["send"]) && isset($_SESSION["email"]))
	{
		
		
		
	
	require_once "email.class.php";
	//******************** ������Ϣ ********************************
	$smtpserver = "smtp.163.com";//SMTP������
	$smtpserverport =25;//SMTP�������˿�
	$smtpusermail = "15182615610@163.com";//SMTP���������û�����
	
	$smtpuser = "15182615610@163.com";//SMTP���������û��ʺ�
	$smtppass = "147258369wsq";//SMTP���������û�����
	$smtpemailto = $_SESSION["email"];//���͸�˭
	$mailtitle = "����һ������ʼ�";//�ʼ�����
	$mailcontent = "<h1>www.wsqer.cn</h1>����һ������ʼ������㿴������ʼ�ʱ��������������<br>������δ�ڱ�վע�������ϵ��QQ:1578960290";//�ʼ�����
	$mailtype = "HTML";//�ʼ���ʽ��HTML/TXT��,TXTΪ�ı��ʼ�
	//************************ ������Ϣ ****************************
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//�������һ��true�Ǳ�ʾʹ�������֤,����ʹ�������֤.
	$smtp->debug = false;//�Ƿ���ʾ���͵ĵ�����Ϣ
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
echo "<script>window.location.href='../view/personal.php'</script>";
	echo "<div style='width:300px; margin:36px auto;'>";
	if($state==""){
		echo "<script>alert('����ʧ�ܣ���');<script>";
		exit();
	}
	echo "<script>alert('��ϲ���ʼ����ͳɹ�����');<script>";

}
?>