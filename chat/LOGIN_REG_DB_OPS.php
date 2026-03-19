<?PHP  if(session_id()==''){session_start();}
include("../pdoConfig.php");
include("../pdoFunction.php");
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set'))date_default_timezone_set($timezone);
$cdate=date("Y-m-d H:i:s");$cdate2=date("Y-m-d");


if(isset($_GET) && isset($_GET['hint']) && $_GET['hint'] == "reg"){
	if(isset($_POST["n"]) && isset($_POST["xp"])){ 
		$name = htmlspecialchars($_POST["n"]);
		$password = md5($_POST["xp"]);
		$id = floor(mt_rand(100,3798)*1000);
		
		$Query = "INSERT INTO `user`(`id`, `name`, `password`, `status`,`account_date`) VALUES ('".$id."','".$name."','".$password."','0', '".$cdate."')";
		
		try{
			
			$r=runPdoQuery($Query,$CONNECT_WITH);
			 
			if(isset($r) && isset($r[0]) && isset($r[0])!=NULL  ){
			  echo "R1~`~Your Account has been Created with User-Id: ". $id;	 
			}else{
				echo "R2~`~There is some internal error while executing your query, try again later.";
			}
		}catch(Exception $e) {
			echo "R2~`~System can not run your query right now, try again later.";
		}
		
		
		
	}else{
	 echo "R2~`~Please provide required details to register.";	
	}
}else if(isset($_GET) && isset($_GET['hint']) && $_GET['hint'] == "login"){
	if(isset($_POST["id"]) && isset($_POST["xpass"])){ 
		$id = htmlspecialchars($_POST["id"]);
		$password = md5($_POST["xpass"]);
		 
		
		$Query = "SELECT * FROM `user` WHERE id='".$id."' AND password = '".$password."' ";
		
		try{
			$r=runPdoQuery($Query,$CONNECT_WITH);
			if(isset($r) && isset($r[0]) && isset($r[0])!=NULL  ){
				$rowsx = $r[0]->fetchAll(PDO::FETCH_ASSOC); 
				if(isset($rowsx) && count($rowsx)>0){ 
			  		echo "L1~`~You have Login into you Account";	 
					$_SESSION["USER_DETAILS"]=array("id"=> $id, "time"=>$cdate, "name"=>$rowsx[0]["name"]);
					$UQ= "UPDATE `user` SET `status`='1' WHERE id='".$id."' ";
					$ur=runPdoQuery($UQ,$CONNECT_WITH);
				}else{
					echo "L2~`~Enter Your correct login id or passwords.";	
				}
			}else{
				echo "L2~`~There is some internal error while executing your query, try again later.";
			}
		}catch(Exception $e) {
			echo "L2~`~System can not run your query right now, try again later.";
		}
		
		
		
	}else{
	 echo "L2~`~Please provide required details to register.";	
	}
	
}else{
	echo "L2~`~You're trying to access our resources in unauthorized manner.";	
}
?>