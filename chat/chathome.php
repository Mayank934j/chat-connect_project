<?PHP  if(session_id()==''){session_start();}
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set'))date_default_timezone_set($timezone);
$cdate=date("Y-m-d H:i:s");$cdate2=date("Y-m-d");
if(isset($_SESSION["USER_DETAILS"]) && isset($_SESSION["USER_DETAILS"]["id"]) && $_SESSION["USER_DETAILS"]["id"]!=""){

	include("chatpage.php");


}else{
	echo "<script>alert('Login First.'); document.location.href='index.php';</script>";	
}
 ?>