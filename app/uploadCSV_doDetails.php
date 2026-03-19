<?PHP session_start(); 
    include_once("../pdoConfig.php");      /*will stablish a pdo connection*/
    include_once("../pdoFunction.php");    /*Will Run Query, Commit Transaction, Rollback etc.*/
	function returnCuserDetailsArray($cuser){
	$cuser_array = NULL;
	foreach($cuser as $key=>$val){
		$cuser_array[base64_decode($key)] = base64_decode($val);	
	}
	return $cuser_array;
}
?>
<?PHP 
$timezone = "Asia/Calcutta"; 
if(function_exists('date_default_timezone_set'))date_default_timezone_set($timezone); 
$cdate=date("Y-m-d H:i:s");$cdate2=date("Y-m-d");
if(isset($_POST) && isset($_POST[base64_encode("sb")]) && htmlspecialchars($_POST[base64_encode("sb")])==base64_encode('uploadcsv')){ 
if(count($_POST) == 1 ){ 
    $OLD_DATA_IF_ANY = "";
	$curr_user_details = isset($_SESSION[md5("cuser")])?returnCuserDetailsArray($_SESSION[md5("cuser")]):NULL;
	$isFileUploaded = 0;
	
	if(isset($_FILES[base64_encode('csvfile')])){ /*upload file*/ 
	    $lo_file = $_FILES[base64_encode('csvfile')];
        $file_size =round( $lo_file['size'] / ( 1024*1024) ,2);
        $file_tmp =$lo_file['tmp_name'];
        $file_type=trim($lo_file['type']);
        $extn_varray = explode('.',trim($lo_file['name']));
        $file_ext=array_pop($extn_varray); 
         
    	if(strtolower($file_type) !="text/csv" or strtolower($file_ext) !='csv'){
    		echo "-1~ Error: Uploaded file is not as desired.<br/>kindly upload proper CSV documents of do-details.<br/>
    					<strong>file-type: only *.CSV <br/>File Size maximum to 3.5 MB, if you have larger file then break it in parts and retry. </strong>"; die();
    	}
		$tmpName = $lo_file['tmp_name'];
		$csvAsArray = array_map('str_getcsv', file($tmpName));
		$qry = "INSERT INTO `t_do_details`(`DO_NO`, `DO_DATE`, `ISSUE_NO`, `ISSUE_DATE`, `PARTY_CODE`, `PARTY_NAME`, `PARTY_ADDRESS`, `DESTINATION`, `DO_QTY`, `GRADE`, `RELEASE_TYPE`, `AREA`, `MINES`, `PARTY_GST_NO`, `PRIORITY_CODE`, `PRIORITY_TEXT`, `SIZE`, `BASIC_RATE`, `ROYALTY_PERCENT`, `ROYALTY_AMOUNT`, `CGST_AMOUNT`, `SGST_AMOUNT`, `IGST_AMOUNT`, `DO_VALUE`, `CONSUMER_TYPE`, `FSA_AUCTION_BID_NO`, `FSA_AUCTION_TYPE`, `DO_VALIDITY`, `IS_DO_APPROVED`, `APROVED_BY`, `APROVED_ON`, `remarks`, `last_modified_by`, `last_modified_on`, `record_created_on`,`csv_file_id`) VALUES ";
		 
		$jj = 0;
		$record_count = 0;
		$data_str = "";
		$fileName = md5($cdate.'-'.strrev(mt_srand()));
		foreach($csvAsArray as $kk=>$vv){
		    if($jj > 0){ 
		        $doDate_arr = explode("-", str_replace(array('.',',','-','/'),"-", $vv[1]));
		        $doDate_ = "";
		        if(count($doDate_arr)>2){
		            $doDate_ = $doDate_arr[2]."-".$doDate_arr[1]."-".$doDate_arr[0];
		        }
		        
		        $issueDate_arr = explode("-", str_replace(array('.',',','-','/'),"-", $vv[3]));
		        $issueDate_ = "";
		        if(count($issueDate_arr)>2){
		            $issueDate_ = $issueDate_arr[2]."-".$issueDate_arr[1]."-".$issueDate_arr[0];
		        }
		        
		        $dovalidityDate_arr = explode("-", str_replace(array('.',',','-','/'),"-", $vv[27]));
		        $dovalidityDate_ = "";
		        if(count($dovalidityDate_arr)>2){
		            $dovalidityDate_ = $dovalidityDate_arr[2]."-".$dovalidityDate_arr[1]."-".$dovalidityDate_arr[0];
		        }
		        
		        
		        if($data_str==""){
		            $v28 = ($vv[28]!="")?$vv[28]:'New data Uploaded via csv';
		            $data_str = "('".$vv[0]."',
		                          '".$doDate_."',
		                          '".$vv[2]."',
		                          '".$issueDate_."',
		                          '".$vv[4]."',
		                          '".$vv[5]."',
		                          '".$vv[6]."',
		                          '".$vv[7]."',
		                          '".$vv[8]."',
		                          '".$vv[9]."',
		                          '".$vv[10]."',
		                          '".$vv[11]."',
		                          '".$vv[12]."',
		                          '".$vv[13]."',
		                          '".$vv[14]."',
		                          '".$vv[15]."',
		                          '".$vv[16]."',
		                          '".$vv[17]."',
		                          '".$vv[18]."',
		                          '".$vv[19]."',
		                          '".$vv[20]."',
		                          '".$vv[21]."',
		                          '".$vv[22]."',
		                          '".$vv[23]."',
		                          '".$vv[24]."',
		                          '".$vv[25]."',
		                          '".$vv[26]."',
		                          '".$dovalidityDate_."',
		                          '0',
		                          '',
		                          '',
		                          '".$v28."',
		                          '',
		                          '',
		                          '".$cdate."', '".$fileName."')";
		        }else{
		            $data_str.= ",('".$vv[0]."',
		                          '".$doDate_."',
		                          '".$vv[2]."',
		                          '".$issueDate_."',
		                          '".$vv[4]."',
		                          '".$vv[5]."',
		                          '".$vv[6]."',
		                          '".$vv[7]."',
		                          '".$vv[8]."',
		                          '".$vv[9]."',
		                          '".$vv[10]."',
		                          '".$vv[11]."',
		                          '".$vv[12]."',
		                          '".$vv[13]."',
		                          '".$vv[14]."',
		                          '".$vv[15]."',
		                          '".$vv[16]."',
		                          '".$vv[17]."',
		                          '".$vv[18]."',
		                          '".$vv[19]."',
		                          '".$vv[20]."',
		                          '".$vv[21]."',
		                          '".$vv[22]."',
		                          '".$vv[23]."',
		                          '".$vv[24]."',
		                          '".$vv[25]."',
		                          '".$vv[26]."',
		                          '".$dovalidityDate_."',
		                          '0',
		                          '',
		                          '',
		                          '".$v28."',
		                          '',
		                          '',
		                          '".$cdate."', '".$fileName."')";
		        }
			     $record_count++;
		    }
			$jj++;
		}
		$qry .= $data_str;
		//echo "-1~";die($qry);
	
	  
		if (move_uploaded_file($file_tmp, "uploaded_csv/".$fileName.".csv")){$isFileUploaded = '1';}
		if($isFileUploaded=='1'){
		    $r=runPdoQuery($qry,$CONNECT_WITH);
            if($r && $r[0]!=NULL){
                echo "1~ <h3><strong style='color:green;'>Success:</strong> Data updated in database Successfully, total updated record = ".$record_count."</h3>";
                echo "<br/><p style='color:#003003; padding:7px;'>Your records have been updated with unique record-id: <strong>".$fileName."</strong> . <br/>You may please note this id for your future reference or modification etc.</p>";
            }else{
                 echo "-1~ <strong style='color:red;'>Error:</strong> Error While updating data in database, please check your file and retry later.";
                 unlink("uploaded_csv/".$fileName.".csv");
		        die();
            }
        
		}else{
		    echo "-1~ <strong style='color:red;'>Error:</strong>: Please upload a proper CSV file of do-details.";
		    die();
		}
	}else{
		echo "-1~ <strong style='color:red;'>Error:</strong>: Supporting Docs CSV file is required, kindly upload proper vehicle documents.";
		die();
	} 
	
}else{
  echo "-1~ <strong style='color:red;'>Error:</strong> Your Data is empty or not in desired formats, Kindly try again with correct data.";	
}
}else{
 echo "-1~ <strong style='color:red;'>Error:</strong> You're trying to modify our web-resources. Requests from unknown web-clients (pages) are not allowed, kindly close the page imidiately and try again later with correct data.";		
}
 ?>