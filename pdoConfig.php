<?php  

/*Here is PDO connection.*/
function connectPDO($connstr,$pservername,$pusername,$ppassword){
	$pdo_conn=NULL;
try {
    $pdo_conn = new PDO($connstr, $pusername, $ppassword);
    // set the PDO error mode to exception
    $pdo_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
       echo "Connection failed: " . $e->getMessage();
	   die();
    }
	return $pdo_conn;
}
function MYSQL_PDO_LINK(){
	/*Localhost*/
   $pservername = "localhost"; /*user = m_vms_db_user*/
   $pusername = "root";        /*pass = Ram@xdbuser1*/
   $ppassword = "";
   //$pdb="salaryDB";
   /*ON TAVAGS-WEBSPACE*/
   //$pservername = "localhost"; /*user = m_vms_db_user*/
   //$pusername = "u861688075_m_vms_db_user";        /*pass = Ram@xdbuser1*/
   //$ppassword = "Ram@xdbuser1";
   
   $pdb="chat";
   $connstr="mysql:host=$pservername;dbname=$pdb";
   return connectPDO($connstr,$pservername,$pusername,$ppassword);}
function Oracle_PDO_LINK(){/*procedural way:-$dbh=oci_connect('SYSTEM','Ram@adobe123','localhost:1521/xe');*/
   $pservername = "localhost:1521";
   $pusername = "SYSTEM";
   $ppassword = "Ram@adobe123";
   //$pdb="salaryDB";
   $pdb="XE";
   $connstr="oci:dbname=".$pservername."/".$pdb;
   return connectPDO($connstr,$pservername,$pusername,$ppassword);}

$CONNECT_WITH = "MYSQL"; //"ORACLE"

//echo "mysql:" ;
//var_dump(MYSQL_PDO_LINK())
?>
