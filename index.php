<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="http://simbyone.com/wp-content/uploads/2014/04/3455e6f65c33232a060c28829a49b1cb.png">
<title>index </title>

<link href="_css/Icomoon/style.css" rel="stylesheet" type="text/css" />
<link href="_css/main.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="view/img/head.ico" media="screen" />
<script type="text/javascript" src="_scripts/jquery-2.0.2.min.js"></script>
<script type="text/javascript" src="_scripts/main.js"></script>

<style>
#loading{
	background-color: #2980b9;
	height: 100%;
	width: 100%;
	position: fixed;
	z-index: 1;
	margin-top: 0px;
	top: 0px;
}
#loading-center{
	width: 100%;
	height: 100%;
	position: relative;
	}
#loading-center-absolute {
	position: absolute;
	left: 50%;
	top: 50%;
	height: 150px;
	width: 150px;
	margin-top: -75px;
	margin-left: -75px;
    -moz-border-radius: 50% 50% 50% 50%;
	-webkit-border-radius: 50% 50% 50% 50%;
	border-radius: 50% 50% 50% 50%;

}
.object{
	width: 20px;
	height: 20px;
	background-color: #FFF;
	position: absolute;
	-moz-border-radius: 50% 50% 50% 50%;
	-webkit-border-radius: 50% 50% 50% 50%;
	border-radius: 50% 50% 50% 50%;
	-webkit-animation: animate 0.8s infinite;
	animation: animate 0.8s infinite;
	}


#object_one {
	top: 19px;
	left: 19px;	

	}
#object_two {
	top: 0px;
	left: 65px; 
	-webkit-animation-delay: 0.1s; 
    animation-delay: 0.1s;

	}
#object_three {
	top: 19px;
	left: 111px; 	
	-webkit-animation-delay: 0.2s; 
    animation-delay: 0.2s; 

	}
#object_four {
	top: 65px;
	left: 130px; 
	-webkit-animation-delay: 0.3s; 
    animation-delay: 0.3s; 
}
#object_five {
	top: 111px;
	left: 111px; 
	-webkit-animation-delay: 0.4s; 
    animation-delay: 0.4s; 
}
#object_six {
	top: 130px;
	left: 65px;
	-webkit-animation-delay: 0.5s; 
    animation-delay: 0.5s; 
}
#object_seven {
	top: 111px;
	left: 19px;
	-webkit-animation-delay: 0.6s; 
    animation-delay: 0.6s; 
}
#object_eight {
	top: 65px;
	left: 0px;
	 -webkit-animation-delay: 0.7s; 
    animation-delay: 0.7s; 
}




@-webkit-keyframes animate {
 
  25% {
	-ms-transform: scale(1.5); 
   	-webkit-transform: scale(1.5);   
    transform: scale(1.5);  
	  }


  75% {
	-ms-transform: scale(0); 
   	-webkit-transform: scale(0);  
    transform: scale(0);  
	  }


}

@keyframes animate {
  50% {
	-ms-transform: scale(1.5,1.5); 
   	-webkit-transform: scale(1.5,1.5); 
    transform: scale(1.5,1.5); 
	  }
 
  100% {
	-ms-transform: scale(1,1); 
   	-webkit-transform: scale(1,1); 
    transform: scale(1,1); 
	  }
  
}




</style>
</head>
<body>
<div id="loading">
<div id="loading-center">
<div id="loading-center-absolute">
<div class="object" id="object_one"></div>
<div class="object" id="object_two"></div>
<div class="object" id="object_three"></div>
<div class="object" id="object_four"></div>
<div class="object" id="object_five"></div>
<div class="object" id="object_six"></div>
<div class="object" id="object_seven"></div>
<div class="object" id="object_eight"></div>

</div>
</div>
 
</div>
<?php
	session_start();
	if(isset($_SESSION["email"]))
	{

		echo "<script>setTimeout(function(){
location.href='view/personal.php';

},3000);</script>";

	}
	else
	{
		echo "<script>setTimeout(function(){
location.href='view/login.html';

},3000);</script>";
		
	}
	
?>





</body>
</html>
