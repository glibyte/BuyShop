<?php
session_start();
$captcha_msg = "";

if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
{
	$captcha_msg = "correcto";
}else{
		$captcha_msg = "error";
	}
	header("location:../carritodecompras.php?captcha_msg=".$captcha_msg."");
	$captcha_msg = "";
?>