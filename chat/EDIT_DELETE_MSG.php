<?PHP  if(session_id()==''){session_start();}
include("../pdoConfig.php");
include("../pdoFunction.php");
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set'))date_default_timezone_set($timezone);
$cdate=date("Y-m-d H:i:s");$cdate2=date("Y-m-d");

if(isset($_SESSION["USER_DETAILS"]) && isset($_SESSION["USER_DETAILS"]["id"]) && $_SESSION["USER_DETAILS"]["id"]!=""){
		$id = htmlspecialchars($_SESSION["USER_DETAILS"]["id"]);  
		$myName= htmlspecialchars($_SESSION["USER_DETAILS"]["name"]);
		$Query ="";
		if(isset($_POST) && isset($_POST["mid"]) && htmlspecialchars($_POST["op"]) == "delete" && htmlspecialchars($_POST["mid"]) !=""){ 
			$mid = htmlspecialchars($_POST["mid"]); 
			$Query = "DELETE FROM `messages` WHERE msg_id ='".$mid."' AND from_user ='".$id."' "; 
			try{
				$r=runPdoQuery($Query,$CONNECT_WITH);
				if(isset($r) && isset($r[0]) && isset($r[0])!=NULL  ){
					  $Queryx = "SELECT * FROM `messages` WHERE msg_id ='".$mid."' "; 
					  $rx=runPdoQuery($Queryx,$CONNECT_WITH);
					  if(isset($rx) && isset($rx[0]) && isset($rx[0])!=NULL  ){
						$rowsx = $rx[0]->fetchAll(PDO::FETCH_ASSOC); 
						if(isset($rowsx) && count($rowsx)>0){ 
							echo "M2~`~delete"; die();
						}
					  }
					  echo "M1~`~delete"; 
				}else{
					echo "M2~`~delete";die();
				}
				 
			}catch(Exception $e) {
				echo "M2~`~System can not run your query right now, try again later.";
			}
			
			
		}elseif(isset($_POST) && isset($_POST["mid"]) && isset($_POST["editedmsg"]) && htmlspecialchars($_POST["op"]) == "edit" && htmlspecialchars($_POST["mid"]) !=""  && htmlspecialchars($_POST["editedmsg"]) !=""){/*msg saving*/
			
			$mid = htmlspecialchars($_POST["mid"]); 
			$editedmsg = htmlspecialchars($_POST["editedmsg"]);
			$Query = "UPDATE `messages` SET `message`='".$editedmsg."',`date_time`='".$cdate."' WHERE msg_id ='".$mid."' AND from_user ='".$id."' ";
			
			try{
				$r=runPdoQuery($Query,$CONNECT_WITH);
				if(isset($r) && isset($r[0]) && isset($r[0])!=NULL  ){
					   echo "M1~`~edit";
				}else{
					echo "M2~`~edit".$Query;
				}
				 
			}catch(Exception $e) {
				echo "M2~`~System can not run your query right now, try again later.";
			}
		}
		  
}else{
	echo "S2~`~You're trying to access our resources in unauthorized manner, You have to login first.";	
}
?>