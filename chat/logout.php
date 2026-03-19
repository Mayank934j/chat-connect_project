<?PHP   if(session_id()==''){session_start();}

if(isset($_SESSION["USER_DETAILS"]) ){
	$_SESSION["USER_DETAILS"] = NULL;
	unset($_SESSION["USER_DETAILS"]);
	echo "<script>document.location.href='index.php'</script>";
}
?>