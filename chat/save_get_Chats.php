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
		if(isset($_POST) && isset($_POST["oprn"]) && htmlspecialchars($_POST["oprn"]) == "oldchatreturn" && isset($_POST["chatwithuid"])  && htmlspecialchars($_POST["chatwithuid"]) !=""){
			
			$chat_withuser_id = htmlspecialchars($_POST["chatwithuid"]);
			$chat_withuser_name = htmlspecialchars($_POST["chatwithname"]); 
			$stl = isset($_POST["stl"])?intval(htmlspecialchars($_POST["stl"])):0;
			$endl = $stl + 50; 
			$Query = "SELECT * FROM `messages` WHERE (from_user = '".$id."' and  to_user = '".$chat_withuser_id."') or (from_user = '".$chat_withuser_id."' and  to_user = '".$id."') order by date_time ";
			
			try{
			$r=runPdoQuery($Query,$CONNECT_WITH);
			if(isset($r) && isset($r[0]) && isset($r[0])!=NULL  ){
				$rowsx = $r[0]->fetchAll(PDO::FETCH_ASSOC); 
				if(isset($rowsx) && count($rowsx)>0){ 
			  			 
							$msgs_str = ""; 
							foreach($rowsx as $index=>$row){
								if($index < $stl){
									continue;	
								}
								 $filesx = explode(",", $row["images_link"]);
								 $files_data ="";
								 $filesDirectory = "doc_files/";
								 foreach($filesx as $k => $filenmae){
									  //$ext = "";
									  //$files_data ="";
									  $ext = pathinfo($filenmae, PATHINFO_EXTENSION);
									  if(in_array(strtolower($ext), array('jpg','png','jpeg','gif','bmp','webp'))){
										  $files_data .= ($files_data=="")?"<img src=\"".$filesDirectory."/".$filenmae."\" style=\"width:70px; height:70px;\" />":", <img src=\"".$filesDirectory."/".$filenmae."\" style=\"width:70px; height:70px;\" />";
									  }else{
										  $files_data .= ($files_data=="")?"<a href=\"".$filesDirectory."/".$filenmae."\" style=\"width:70px; height:70px;\" >".$filenmae."</a>":", <a href=\"".$filesDirectory."/".$filenmae."\" style=\"width:70px; height:70px;\" >".$filenmae."</a>";
									  }
								 }
								
								if($row["from_user"] == $chat_withuser_id){
						 			$msgs_str.= "<div style=\"text-align:left; margin:2px; padding:5px; border:solid thin rgba(237, 247, 247,0.7); background-color:#FFFFFF; border-radius:3px;\" ><strong style=\"color:silver; font-size:9px;\"><img src=\"../app/icons/tou.jpg\" draggable=\"false\" onclick=\"if(getUsers){getUsers();}\" title=\"refresh\"  />".$chat_withuser_name."</strong><br/><p style='font-size:18px;' id=\"".$row["msg_id"]."\"  >".$row["message"]."<br/>".$files_data."</p></div>";
								}else{
									$msgs_str.= "<div class=\"item\" style=\"text-align:right;  margin:2px;  background-color:#FFFFFF; padding:5px; border:solid thin rgba(237, 247, 247,0.7);border-radius:3px;\"><strong style=\"color:gray; font-size:9px;\"><img src=\"../app/icons/fromu.jpg\" draggable=\"false\" onclick=\"if(getUsers){getUsers();}\" title=\"refresh\"  />".$myName."</strong><br/><p style='font-size:18px;' id=\"".$row["msg_id"]."\"  ondblclick=\"if(MsgOnClickFunctionality){MsgOnClickFunctionality(this);}\">".$row["message"]."<br/>".$files_data."</p></div>";
								}
							} 
							$stl += (count($rowsx)-$stl);
							echo "S1~`~".$msgs_str."~`~".$stl;
				}else{
					echo "S2~`~No user found.";	
				}
			}else{
				echo "S2~`~There is some internal error while executing your query, try again later.";
			}
		}catch(Exception $e) {
			echo "S2~`~System can not run your query right now, try again later.";
		}
			
			
		}else if(isset($_POST) && isset($_POST["oprn"]) && htmlspecialchars($_POST["oprn"]) == "savechat" && isset($_POST["chatwithuid"])  && htmlspecialchars($_POST["chatwithuid"]) !="" && isset($_POST["umsg"])  && (htmlspecialchars($_POST["umsg"]) !="" || isset($_FILES['files']))){/*msg saving*/
			
			$files_ = isset($_FILES['files'])?$_FILES['files']:NULL; 
			 
			$uploadDir = "doc_files";
			$isAllfilesUploaded = true;
			$images_link = "";
			if (!file_exists($uploadDir)) { mkdir($uploadDir, 0777, true);}
			$destination = "";
			if($files_!=NULL){ 
				foreach($files_["name"] as $k=>$file) {  
					$extension = pathinfo($file, PATHINFO_EXTENSION);
					$filename = md5($file) .".".$extension;
					$destination = $uploadDir ."/". $filename;   
					if (move_uploaded_file($files_['tmp_name'][$k], $destination)) {
						$images_link .= ($images_link=="")?$filename:",".$filename;
					}else{
						$isAllfilesUploaded = false; break;
					}
					 
				}
			}
			if($isAllfilesUploaded ==false){
				echo "S2~`~files not uploaded";	die();
			}
			$msg_id = md5($cdate);
			$from_user = $id;
			$message = htmlspecialchars($_POST["umsg"]);
			$date_time = $cdate;
			$to_user = htmlspecialchars($_POST["chatwithuid"]);
			$Query ="INSERT INTO `messages`(`msg_id`, `from_user`, `message`, `date_time`, `to_user`, `is_read`,`images_link`) VALUES ('".$msg_id."','".$from_user."','".$message."','".$date_time."','".$to_user."','0','".$images_link."')";
			
			
			try{
			$r=runPdoQuery($Query,$CONNECT_WITH);
			if(isset($r) && isset($r[0]) && isset($r[0])!=NULL ){ 
			  		echo "S1~`~&radic;";	 
			}else{
				echo "S2~`~&Phi;";
			}
		}catch(Exception $e) {
			echo "S2~`~System can not run your query right now, try again later.";
		}
			 
		}
		  
}else{
	echo "S2~`~You're trying to access our resources in unauthorized manner, You have to login first.";	
}
?>