<?PHP session_start();
  function getExtension($str)
{ $i = strrpos($str,"."); if (!$i) { return ""; } $l = strlen($str) - $i;  $ext = substr($str,$i+1,$l);  return $ext;}

if(isset($_POST["ink"]) && trim($_POST["ink"])!='' && isset($_POST["EIS"]) && trim($_POST["EIS"])!='' && isset($_POST['upload']) && trim($_POST["upload"])!='' && isset($_POST['my']) && trim($_POST["my"])!=''  ){

$foundInCells = array();
$searchValue = '';
include("conn.php");
if(isset($_POST["EIS"])){
	$searchValue=htmlspecialchars($_POST["EIS"])?mysql_real_escape_string(htmlspecialchars($_POST["EIS"])):"";
}
   /*This key is generated @ the time of email for each employee*/
   $UniqKey="";
   $my="116";
   if(isset($_POST["my"]))$my=htmlspecialchars($_POST["my"]);
   else if(isset($_GET["my"])){$my=htmlspecialchars($_GET["my"]);}
   $UniqKey=str_rot13("Salarypass".$searchValue."RamGNXT")."Currentdate".$my;
if(trim($searchValue)=='' || (!isset($_POST["ink"]) || trim(htmlspecialchars($_POST["ink"]))!=md5($UniqKey))){
	echo "notsaved: Your Authorization_Key or Employee_code is not valid~~"; 
    mysql_close($dbcs); die();
 // die();
}
else{
	/** this file will be sent as link in mail **/
	$salFilePath='';/*default file is sfiles/SECLRGH-1.xls*/
	$timezone = "Asia/Calcutta";   
	if(function_exists('date_default_timezone_set'))date_default_timezone_set($timezone);    
	$time=date("Y-m-d H:i:s");
	if(@is_uploaded_file($_FILES["xotherFiles"]["tmp_name"]) ){
		   $filename=$_FILES["xotherFiles"]["name"];
	       $filesize=$_FILES["xotherFiles"]["size"];
		   $tmp_file=$_FILES["xotherFiles"]["tmp_name"];
		   $filetype=$_FILES["xotherFiles"]["type"];  
		   $ValidExtensions = array("application/pdf","application/vnd.ms-excel","application/vnd.openxmlformats-officedocument.spreadsheetml.sheet","application/vnd.openxmlformats-officedocument.wordprocessingml.document","
application/vnd.openxmlformats-officedocument.presentationml.presentation","application/msword","application/vnd.ms-powerpoint","text/plain","image/jpeg","image/png","image/pjpeg","image/gif");
      /*valid extensions_are = */
	    if(in_array($filetype,$ValidExtensions)){
				 
					   $ext = getExtension($filename);$ext = strtolower($ext); 
					   $des ="";
					   $des = str_replace($ext,' ', $des);
					   $filename=md5($filename.time().date("d-m-Y h:i:s A"));
					   $filename_=$filename.".".$ext;
					   $filename=$filename_;
					   $errTxt='';
				       $uploaddir="ofiles/";
				 
				 /*moving file to the folder*/
			    $SotreInFolder=$uploaddir.$filename_; $tblname="`cil_gen_post`";$user_id= htmlspecialchars($_SESSION["userAuthority"]); 
			    if (trim($uploaddir)!='' && !file_exists($SotreInFolder) && move_uploaded_file($tmp_file, $SotreInFolder)){
					$salFilePath=$SotreInFolder;
				}/*if (move_uploaded_file...*/
				else{
					echo "notsaved:Problem with your file try later.~~".$filename;mysql_close($dbcs); 
					if(file_exists($salFilePath)){ unlink($salFilePath);} die();
				}
				
             }/*if(in_array($filetype,$ValidExtensions)*/
			 else{
				echo "notsaved:Sorry, your file can't uploaded. our system allows to upload the file like .jpg,.png, .xlsx,.xlsm.pdf,.txt,.doc,.docx etc.~~".$filename;mysql_close($dbcs); die();
			 }		 
		   unset($_POST["upload"]);
		  
	}/* / if(@is_uploaded_file */
	
	//$salFilePath='sfiles/SECLRGH-1.xls';
	if(trim($salFilePath)!=''){  
       echo "saved:file saved successfully.~~".$filename;
	    $qry=mysql_query("INSERT INTO tmp_ufiles (eis,filename,flg,date1) VALUE ('".$searchValue."','".$filename."','tmp','".$time."')"); 
       mysql_close($dbcs); die();
    }else{
		echo "notsaved:There is some internal error, try again leter~~".$filename;
		if(file_exists($salFilePath)){ unlink($salFilePath);}
		mysql_close($dbcs); die();
	 }
 }/* else valid user ... */ ?>
<?PHP  }/*if isset($_POST["ink"]) ...*/ else{echo "notsaved:There is an internal error, try again leter~~";} ?>