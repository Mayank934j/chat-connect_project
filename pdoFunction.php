<?PHP if(!function_exists("MYSQL_PDO_LINK")){include_once("pdoConfig.php");}
  
  function start_transaction(){$pdo_conn=NULL;$pdo_conn=MYSQL_PDO_LINK();$pdo_conn->beginTransaction();}
  function commit_transaction(){$pdo_conn=NULL;$pdo_conn=MYSQL_PDO_LINK();$pdo_conn->commit();}
  function rollback_transaction(){$pdo_conn=NULL;$pdo_conn=MYSQL_PDO_LINK();$pdo_conn->rollBack();}
  function runPdoQuery($qry, $ON_="MYSQL"){  /*this will use default as mysql*/
      $pdo_conn=NULL; //echo "-1~`~ stok :  ".$qry ."<br/>";
      if(trim($qry)==""){$response_arr[0]=NULL;$response_arr[1]["Qrun"]=false; 
	  $response_arr[1]["ErrorText"]="Query string is empty.<br/>Kindly contact to technical team ";
	  return $response_arr;}
	  if(strtoupper(trim($ON_))=="MYSQL"){
	     $pdo_conn=MYSQL_PDO_LINK();}
	  else if(strtoupper(trim($ON_))=="ORACLE"){
		 $pdo_conn=Oracle_PDO_LINK();}
	  else { $pdo_conn=NULL;
	         $response_arr[0]=NULL;$response_arr[1]["Qrun"]=false; 
	         $response_arr[1]["ErrorText"]="No Such (".$ON_.") Database or internal error.<br/>
			                                Kindly contact to technical team ";
	  }
	  $runqry=NULL;
	  $response_arr=array(); /*will contains response of transaction*/ 
	  try{ 
	  $runqry=$pdo_conn->query($qry); 
	  $response_arr[0]=$runqry;
	  $response_arr[1]["Qrun"]=true;
	  }
	  catch(PDOException $e){
		  $response_arr[0]=$runqry; 
		  $response_arr[1]["Qrun"]=false;
		  $response_arr[1]["ErrorText"]="Query did not run sucessfully. <br/>Kindly see the Error-Code. ";
		  $response_arr[1]["ErrorCode"]=$e->getMessage();
		  //die('<br/>Exception Occurs :- there is some problem with your file'.$e->getMessage());
	  }
	  return $response_arr;
  }

 ?>