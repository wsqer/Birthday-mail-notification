
<?php
$connec=mysql_connect("www.wsqer.cn","root","");//数据库配置,数据库地址，用户名，密码
$con=mysql_select_db("birthday");   //数据库名
mysql_query("SET NAMES utf8");