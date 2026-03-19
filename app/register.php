<?PHP session_start(); 
    include_once("../pdoConfig.php");      /*will stablish a pdo connection*/
    include_once("../pdoFunction.php");    /*Will Run Query, Commit Transaction, Rollback etc.*/
?>
<?PHP 
$timezone = "Asia/Calcutta"; 
if(function_exists('date_default_timezone_set'))date_default_timezone_set($timezone); 
$cdate=date("Y-m-d H:i:s");$cdate2=date("Y-m-d");
if(isset($_POST) && isset($_POST[base64_encode("sb")]) && htmlspecialchars($_POST[base64_encode("sb")])==base64_encode('1')){
if(count($_POST) == 12 ){	
	/*['porganization','pcompany','parea','ppan','pmob','pmail','pname','Ppassword','Ppasswordc']*/
	$OLD_DATA_IF_ANY="";
	$porganization=htmlspecialchars(base64_decode(trim($_POST[base64_encode("porganization")]))); 
	$pcompany=htmlspecialchars(base64_decode(trim($_POST[base64_encode("pcompany")])));
	$parea=htmlspecialchars(base64_decode(trim($_POST[base64_encode("parea")])));
	$ppan=htmlspecialchars(base64_decode(trim($_POST[base64_encode("ppan")])));
	$pmob=htmlspecialchars(base64_decode(trim($_POST[base64_encode("pmob")])));
	$pmail=htmlspecialchars(base64_decode(trim($_POST[base64_encode("pmail")])));
	$pname=htmlspecialchars(base64_decode(trim($_POST[base64_encode("pname")])));
	$pcode=htmlspecialchars(base64_decode(trim($_POST[base64_encode("pcode")])));
	$USER_TYPE = htmlspecialchars(base64_decode(trim($_POST[base64_encode("puser")])));
	$Ppassword=md5(htmlspecialchars(base64_decode(trim($_POST[base64_encode("Ppassword")]))));
	
	$id=md5(htmlspecialchars(base64_decode(trim($_POST[base64_encode("ppan")]))));
	 
	$dx2="SELECT ID FROM t_do_party WHERE ID='".$id."'";
	$r1=runPdoQuery($dx2,$CONNECT_WITH);$Its_old=0; 
    if($r1 && $r1[0]!=NULL){
		$rx=$r1[0]->fetchAll(PDO::FETCH_ASSOC);
		if(is_array($rx) && count($rx)>=1){ $Its_old=1;
	   echo "-1~The Party Code <strong style=\"color:blue;\">".$pcode."</strong> is already have an account.<br/>&nbsp;You can login or enter correct data.";
		}
	}/*if($r...*/
    
	if($Its_old==0){  
	    $dx="INSERT INTO `t_employee_or_party_details`(`ID`, `ORGANIZATION`, `COMPANY`, `AREA`, `party_code`, `PARTY_NAME`, `MOBILE`, `EMAIL`, `PAN`, `CDATE`, `PASSWORDS`, `IS_ACTIVE`, `APPROVED_BY`, `APPROVED_ON`, `LAST_LOGIN_DATE`, `REMARKS`,`USER_TYPE`) VALUES ('".$id."',  '".$porganization."',  '".$pcompany."',  '".$parea."',  '".$pcode."',  '".$pname."',  '".$pmob."',  '".$pmail."', '".$ppan."',  '".$cdate."', '".$Ppassword."',  '0', '', '', '".$cdate."','','".$USER_TYPE."') ";
		
	$r=runPdoQuery($dx,$CONNECT_WITH);
    if($r && $r[0]!=NULL){
	   echo "1~Your account has beed created sucessfully and under <strong style=\"color:orange;\">verification</strong> state.<br/>&nbsp;You can login into your account after verification by admin."; 
	   $activity = "New DO Party Account Registration";
	   if(strtoupper($USER_TYPE)=="EMPLOYEE"){
		   $activity = "New Employee Account Registration";
	   }
	   $remrk = "normal activity";
	   $onPage = "Register_php";
	   $a_ID = md5($id.$cdate.$activity);
	   $acl = "INSERT INTO `access_log`(`ID`, `USER`, `activity`, `ldate`, `remark`, `on_page`,`OLD_DATA`) VALUES ('".$a_ID."','".$id."','".$activity."','".$cdate."','".$remrk."','".$onPage."','".$OLD_DATA_IF_ANY."')";
	   $rm=runPdoQuery($acl,$CONNECT_WITH); 
	}/*if($r...*/
	else{
	   echo "-1~Error Occured while Inserting your data, Either Your data was not in correct format or This PAN is already exists in the database. Try again later.<br/>";
	   
	   if(is_array($r) && isset($r[1]) && isset($r[1]["ErrorCode"]) ){
		 echo "<br/> Error-code: ".$r[1]["ErrorCode"];  
	   }
	}
   }/*else user is new*/
	
	
}else{
  echo "-1~Your Data is empty or not in desired formats, Kindly try again with correct data.";	
}
}else{
 echo "-1~You're trying to modify our web-resources. Requests from unknown web-clients (pages) are not allowed, kindly close the page imidiately and try again later with correct data.";		
}
 ?>