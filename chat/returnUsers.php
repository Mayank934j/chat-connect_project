<?PHP  if(session_id()==''){session_start();}
include("../pdoConfig.php");
include("../pdoFunction.php");
$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set'))date_default_timezone_set($timezone);
$cdate=date("Y-m-d H:i:s");$cdate2=date("Y-m-d");

if(isset($_SESSION["USER_DETAILS"]) && isset($_SESSION["USER_DETAILS"]["id"]) && $_SESSION["USER_DETAILS"]["id"]!=""){
		$id = htmlspecialchars($_SESSION["USER_DETAILS"]["id"]);

		$Query = "SELECT * FROM `user` where id != '".$id."' ";

		try{
			$r=runPdoQuery($Query,$CONNECT_WITH);
			if(isset($r) && isset($r[0]) && isset($r[0])!=NULL  ){
				$rowsx = $r[0]->fetchAll(PDO::FETCH_ASSOC);
				if(isset($rowsx) && count($rowsx)>0){
			  		echo "S1~`~";
					echo "<table style=\"margin:5px;border:solid thin #003003; width:90%;\" cellpadding=\"5\" cellspacing=\"5\">";
							echo "<tr><td  style=\"border:solid thin #003003; background:#00F00F;\" >Live Users &nbsp;<img src=\"../app/icons/cached.png\" draggable=\"false\" onclick=\"if(getUsers){getUsers();}\" title=\"refresh\"  /></td></tr>";
							foreach($rowsx as $index=>$row){
						 		echo "<tr><td data-uid='".$row['id']."' onclick=\"if(openChatWindow){openChatWindow(this);}\"  style=\"border:solid thin #003003; cursor:pointer;\" onmouseover=\"this.classList.add('moef');\" onmouseout=\"this.classList.remove('moef');\" >".$row['name']."</td></tr>";
							}
					echo "</table>";
				}else{
					echo "S2~`~No user found.";
				}
			}else{
				echo "S2~`~There is some internal error while executing your query, try again later.";
			}
		}catch(Exception $e) {
			echo "S2~`~System can not run your query right now, try again later.";
		}

}else{
	echo "S2~`~You're trying to access our resources in unauthorized manner, You have to login first.";
}
?>