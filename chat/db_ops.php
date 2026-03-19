<?PHP if(session_id()==''){session_start();} include("globals_var.php"); ?>
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
        
        <link rel="stylesheet" href="app/css/CIL_boot.min.css">
         
        <title>Mine Vehicl Information Portal</title>
         
 <script src="http://code.jquery.com/jquery.min.js"></script>
 <link rel="stylesheet" href="slideshow/vegas.min.css"> 
 <script src="slideshow/vegas.min.js"></script> 
<style>
.col-smm-12{position:relative; min-height:1px;padding-right:15px;padding-left:15px; text-align:inherit; }
@media screen and (max-width:380px){
	.col-smm-12{width:100%; } 
} 
</style>
<?PHP
$curr_user_details = isset($_SESSION[md5("cuser")])?returnCuserDetailsArray($_SESSION[md5("cuser")]):NULL;
 include("app/xmlhttpreq.php");?> 
<link rel="shortcut icon" href="app/logo2.ico" type="image/ico" />
</head>

<body id="bodypg" style="font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif; "> 
        <?PHP  $basefolder=$BaseUrl="app/"; 
	          include_once("app/header_logo.php"); 
		?>
	<div class="container-fluid" id="conainer_id" style="background:rgba(66,66,66,0.8); height:500px;">
    
    <?PHP /*WORKING AREA: do anything you want , here.*/ ?>
    
      
    </div><!----CONTAINER---> 
 <?PHP  $isindex=1; $istoday=0; include_once("app/xfooter.php");?><!-----footer----->  
<script>
 
var body = document.body,
    html = document.documentElement;
var height = Math.max( body.scrollHeight, body.offsetHeight,html.clientHeight, html.scrollHeight, html.offsetHeight );
   /*var avilH=window.screen.availHeight;  */
   if(document.getElementById('conainer_id')){
	  var hdr_dv=0;
	  if(document.getElementById('logo_title')){ 
		 hdr_dv=(document.getElementById('logo_title').offsetHeight)?document.getElementById('logo_title').offsetHeight:100; 
	  }  if(document.getElementById('conainer_id')) {
	  /*OLD : document.getElementById('conainer_id').style.minHeight= ((2/3)*avilH+67)+'px'; */
	  var ftr=(document.getElementById('xftr').offsetHeight)?document.getElementById('xftr').offsetHeight:5;/*scrollHeight/offsetHeight also can be used*/
	  document.getElementById('conainer_id').style.minHeight= (height-hdr_dv-ftr)+'px';}
	 }
</script>
<script src="slideshow/VegasControl.js"></script> 
<script src="app/js/jquery.min.js"></script>
<script src="app/js/CIL_boot.min.js"></script>
<script src="app/js/transition.min.js" ></script>
<script src="app/js/md5.min.js" ></script> 
</body>
</html>