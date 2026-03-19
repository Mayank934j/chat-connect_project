<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head> 

        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="../app/css/CIL_boot.min.css">
         
        <title>Mine Vehicl Information Portal</title>
         
 <script src="http://code.jquery.com/jquery.min.js"></script>
 <link rel="stylesheet" href="../slideshow/vegas.min.css"> 
 <script src="../slideshow/vegas.min.js"></script> 
<style>
.col-smm-12{position:relative; min-height:1px;padding-right:15px;padding-left:15px; text-align:inherit; }
@media screen and (max-width:380px){
	.col-smm-12{width:100%; } 
} 
</style>
<?PHP
if (isset($_SESSION['USER_DETAILS']['id'])) {
    if (isset($_SESSION['password_reset_success'])) {
        unset($_SESSION['password_reset_success']); // keep message, skip redirect
    } else {
        header("Location: chathome.php");
        exit;
    }
}
 include("../app/xmlhttpreq.php");?>

 <?php if (isset($_SESSION['password_reset_success_shown']) === false): ?>
    <div id="successMsg" style="margin: 15px 0; padding: 10px; background: #d4edda; color: #155724; border-radius: 5px;">
        ✅ Your password was successfully updated. Please login again.
    </div>
    <?php $_SESSION['password_reset_success_shown'] = true; ?>

    <script>
    // Auto-hide the message after 5 seconds
    setTimeout(function() {
        const msg = document.getElementById('successMsg');
        if (msg) {
            msg.style.transition = "opacity 1s ease";
            msg.style.opacity = 0;
            setTimeout(() => msg.style.display = 'none', 1000);
        }
    }, 5000);
    </script>
<?php endif; ?>


<link rel="shortcut icon" href="../app/logo2.ico" type="image/ico" />
</head>

<body id="bodypg" style="font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif; ">
        <?PHP  $basefolder=$BaseUrl="../app/"; 
	          include_once("../app/header_logo.php"); 
		?>
	<div class="container-fluid" id="conainer_id" style="padding:10px;padding-top:50px; ">
    	<div class="container" style="background-color:rgba(183,240,247,0.8);padding-top:10px; "> 
        		
                <div class="row" id="login_registration_button">
                	<div class="col-smm-12" style="padding:10px; text-align:center;">
                     	<button id="login" style="height:45px; width:300px; border:solid thin rgba(0,0,255,1); font-size:18px; font-weight:900;">Login</button>
                        <button id='reg' style="height:45px; width:300px; border:solid thin rgba(0,0,255,1); font-size:18px; font-weight:900;">Register</button>
                    </div>
                    
                </div>
                <div class="row" id="resultDiv" style="display:none; background:rgba(0,64,128,1); color:rgba(255,255,255,1);" > 
                </div>
                
                <?PHP include("login_div.php"); ?>
                 <?PHP include("register_div.php"); ?>
                
               
        </div> <!---container-->
    </div><!----CONTAINER-fluid---> 
 <?PHP  $isindex=1; $istoday=0; $isQR=1; include("../app/xfooter.php");  ?><!-----footer----->  
 
 <script>
 /*functions*/

 function afterRegistration(serverResp, resultDivid){
	 var isredirect_req = 0;
	 var rdiv = document.getElementById(resultDivid);
	 if(rdiv){
		rdiv.style.display='';
		var _x = serverResp.split("~`~");
		if(typeof  _x!="undefined" && _x.length > 0 && (_x[0]=="R1" || _x[0]=="L1")){
			rdiv.innerHTML = "Status:Success, <h1 style='font-weight:900;'>"+_x[1]+"</h1>"; 
			if(_x[0]=="L1"){
				isredirect_req = 1;	
			}
		}else{
			rdiv.innerHTML = "Status:Error, <h1 style='font-weight:900;'>"+_x[1]+"</h1>"; 
		}
		
	 }
	 var _o = setTimeout(function(){
			if(rdiv){
				rdiv.style.display='none';
				if(isredirect_req==1){
					document.location.href="chathome.php";	
				}
			}
		 }, 5000)
 }
 </script>
 
 <script>
 /*This is my custom js for login / reg.*/
 var mloginBtn = document.getElementById('login');
 var mregisterBtn = document.getElementById('reg');
 var mclsbtn  = document.getElementById('clsbtn');
 var mclsbtn2  = document.getElementById('clsbtn2');
 
 var loginregDiv = document.getElementById('login_registration_button');
 var loginDivx = document.getElementById("loginDiv");
 var regDivx = document.getElementById("regDiv");
 
 
 if(mregisterBtn){
	mregisterBtn.addEventListener("click", function(){
			if(regDivx){
				regDivx.style.display='';
			}
			if(loginregDiv){
				loginregDiv.style.display='none';	
			}
		}); 
 }
 
 if(mloginBtn){
	mloginBtn.addEventListener("click", function(){
			if(loginDivx){
				loginDivx.style.display='';	
			}
			if(loginregDiv){
				loginregDiv.style.display='none';	
			}
		}); 
 }
 
 if(mclsbtn){
	mclsbtn.addEventListener("click", function(){
		
		if(loginDivx){
				loginDivx.style.display='none';	
			}
			if(loginregDiv){
				loginregDiv.style.display='';	
			}
		
		}); 
 }
 if(mclsbtn2){
	mclsbtn2.addEventListener("click", function(){
		
		if(regDivx){
				regDivx.style.display='none';	
			}
			if(loginregDiv){
				loginregDiv.style.display='';	
			}
		
		}); 
 }
 /*DATABASE REGISTRATION RELATED WORK*/
 var freg_btn = document.getElementById("freg_btn");
 
 if(freg_btn){
	freg_btn.addEventListener("click", function(){
			var name = document.getElementById("uname");
			var upassword = document.getElementById("upassword");
			var cupassword = document.getElementById("cupassword");
			
			if(name && name.value.trim()==""){
				alert("Enter your name please."); name.focus();	return false;
			}
			if(upassword && upassword.value.trim()==""){
				alert("Enter your Password please.");upassword.focus();	return false;
			}
			if(cupassword && cupassword.value.trim()==""){
				alert("Enter your Password please."); cupassword.focus();	return false;
			}
			if(upassword.value.trim() != cupassword.value.trim()){
				alert("Your confirm Password must be same."); 
				cupassword.value="";
				cupassword.focus(); return false;
			}
			
			var _formx = new FormData();
			_formx.set("n", name.value.trim());
			_formx.set("xp", upassword.value.trim());
			var targetUri = "LOGIN_REG_DB_OPS.php?hint=reg";
			sendOnServerData(targetUri,_formx,'resultDiv',afterRegistration);
		
		}); /*closure function*/
 }
 
 /*Database Login related work*/
 var flogin_btn =document.getElementById("flogin_btn"); 
 if(flogin_btn){
	flogin_btn.addEventListener("click", function(){
			var id = document.getElementById("xuname");
			var upassword = document.getElementById("xupassword");
			
			if(id && id.value.trim()==""){
				alert("Enter your Id please."); id.focus();	return false;
			}
			if(upassword && upassword.value.trim()==""){
				alert("Enter your Password please.");upassword.focus();	return false;
			}
			
			var _formx = new FormData();
			_formx.set("id", id.value.trim());
			_formx.set("xpass", upassword.value.trim());
			var targetUri = "LOGIN_REG_DB_OPS.php?hint=login";
			sendOnServerData(targetUri,_formx,'resultDiv',afterRegistration)
			
			
		}); 
 }
 
 </script>
 
 
 
<script>
 
var body = document.body,
    html = document.documentElement;
var height = Math.max( body.scrollHeight, body.offsetHeight,html.clientHeight, html.scrollHeight, html.offsetHeight );
   if(document.getElementById('conainer_id')){
	  var hdr_dv=0;
	  if(document.getElementById('logo_title')){ 
		 hdr_dv=(document.getElementById('logo_title').offsetHeight)?document.getElementById('logo_title').offsetHeight:100; 
	  }  if(document.getElementById('conainer_id')) {
	  var ftr=(document.getElementById('xftr').offsetHeight)?document.getElementById('xftr').offsetHeight:5;
	  document.getElementById('conainer_id').style.minHeight= (height-hdr_dv-ftr)+'px';}
	 }
var isQR = 1;
</script>
<script src="../slideshow/VegasControl.js"></script> 
<script src="../app/js/jquery.min.js"></script>
<script src="../app/js/CIL_boot.min.js"></script>
<script src="../app/js/transition.min.js" ></script>
<script src="../app/js/md5.min.js" ></script>


<!----key listener: captures Enter from anywhere--->
<script>
document.addEventListener("keydown", function (e) {
  if (e.key === "Enter") {
    // Check if login form is visible
    const loginDiv = document.getElementById("loginDiv");
    const regDiv = document.getElementById("regDiv");

    // Case 1: If Login form is visible
    if (loginDiv && loginDiv.style.display !== "none") {
      const loginBtn = document.getElementById("flogin_btn");
      if (loginBtn) loginBtn.click();
      e.preventDefault();
    }

    // Case 2: If Register form is visible
    else if (regDiv && regDiv.style.display !== "none") {
      const regBtn = document.getElementById("freg_btn");
      if (regBtn) regBtn.click();
      e.preventDefault();
    }
  }
});
</script>

</body>
</html>
