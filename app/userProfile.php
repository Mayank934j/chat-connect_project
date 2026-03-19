<?PHP  session_start();
include("../globals_var.php");

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/CIL_boot.min.css">
 
<title><?PHP echo $_SESSION["Globals_var"]["Tital"]; ?></title>
<style>
.col-smm-12{position:relative; min-height:1px;padding-right:15px;padding-left:15px; text-align:inherit; }
@media screen and (max-width:380px){
	.col-smm-12{width:100%; } 
}
.oherrotate2:hover{-webkit-transform: rotateZ(1deg);-ms-transform: rotateZ(1deg);transform: rotateZ(1deg);border-radius:50%;}.button1 {display: inline-block;border-radius: 4px;background-color: #f3f3f37d;border: solid thin rgba(0,51,0,1);color: #000000;text-align: center;font-size: 24px;padding: 10px;width: 180px;transition: all 0.5s;cursor: pointer;margin: 5px;font-weight:900;font-family:"Courier New", Courier, monospace;}.button1 span {cursor: pointer;display: inline-block;position: relative;transition: 0.5s;}.button1 span:after {	content: '\00bb';position: absolute;opacity: 0;top: 0;right: -20px;transition: 0.5s;}.button1:hover span {padding-right: 25px; }.button1:hover {background-color:#00FFFF;}.button1:hover span:after { opacity: 1;right: 0;}/*SUBMIT-BUTTN*/ .button2 {display: inline-block;border-radius: 4px;background-color: inherit;border: solid thin rgba(0,51,0,1);color: inherit;text-align: center;font-size: 18px;padding: 7px;width: 140px;transition: all 0.5s;cursor: pointer;margin: 5px;font-weight:900;font-family:"Courier New", Courier, monospace;}.button2 span {cursor: pointer;display: inline-block;position: relative;transition: 0.5s;}.button2 span:after {	content: '\00bb';position: absolute;opacity: 0;top: 0;right: -20px;transition: 0.5s;}.button2:hover span {padding-right: 25px; }.button2:hover {background-color:#FFFFFF;}.button2:hover span:after { opacity: 1;right: 0;}/*-----------------------------*/
/* scroll bar tyle */
.style-11::-webkit-scrollbar {width: 10px;background-color: #CCCCCC;}
/**  STYLE 11 */
.style-11::-webkit-scrollbar-track {border-radius: 10px;background: #CCCCCC;border: 1px solid #D9D9D9;}
.style-11::-webkit-scrollbar-thumb { border-radius: 10px;  background: #CCCCCC ; border: 1px solid #999;}
.style-11::-webkit-scrollbar-thumb:hover {background: rgba(52,60,65,1);}
.style-11::-webkit-scrollbar-thumb:active { background: linear-gradient(left, #00FF33 #0033FF );}
</style>
<script src="js/javascipt_cookies.js"></script>    
<?PHP 

?>
<!--
<![if !IE>
    <link rel="icon" href="logo.ico" type="image/x-icon" />
<![endif]>
!-->
<link rel="shortcut icon" href="../logo.ico" type="image/ico" />
</head>
<body class="style-11">
<?PHP include_once("header_logo.php");
      include("xmlhttpreq.php"); 
      include("js/REPORTS_JS.php"); 
?>
<div class="container-fluid" style="border-bottom:none;" id="conainer_id"> 
	<?PHP	  
		$USER_TYPE = NULL;
		$IS_LOGIN = NULL;
        if(isset($_SESSION[md5("cuser")])){	 
			$current_user_details = returnCuserDetailsArray($_SESSION[md5("cuser")]);
			 
            $IS_LOGIN = isset($_SESSION[md5("cuser")][base64_encode("IS_LOGIN")])?$_SESSION[md5("cuser")][base64_encode("IS_LOGIN")]:"";
			$USER_TYPE = isset($_SESSION[md5("cuser")][base64_encode("USER_TYPE")])?$_SESSION[md5("cuser")][base64_encode("USER_TYPE")]:NULL;
			$IS_ACTIVE = isset($_SESSION[md5("cuser")][base64_encode("IS_ACTIVE")])?$_SESSION[md5("cuser")][base64_encode("IS_ACTIVE")]:"";
			if(trim($IS_LOGIN) == "" || $IS_LOGIN != base64_encode("1") || trim($IS_ACTIVE) == "" || $IS_ACTIVE != base64_encode("1"))
			{echo loginError(); die();}
    ?>
        <div class="row" id="menuOptionsDiv" >
        	<div class="col-lg-12" style="height:48px; border:none; border-bottom:solid thin rgba(204,204,204,0.4);">
            	<?PHP if(isset($_SESSION[md5("cuser")][base64_encode("PARTY_NAME")]))
				      {
			    ?>
            	      <img src="user_15.png" draggable="false" style="border:solid thin rgba(108,108,108,1); border-radius:100%; position:absolute; right:5%; top:15px;" data-toggle="tooltip" title="<?PHP echo (isset($_SESSION[md5("cuser")][base64_encode("PARTY_NAME")])?base64_decode($_SESSION[md5("cuser")][base64_encode("PARTY_NAME")]):""); ?>" onClick="var xa = document.getElementById('usermenudv'); if(xa){xa.style.display = (xa.style.display=='none')?'':'none';}" />
                      <div id="usermenudv" style="position:absolute; right:4.5%; top:35px; z-index:500;  border:solid thin rgba(82,82,82,0.5); padding:10px; border-radius:5px; background:#FFF9FF; color:#30A916; width:100%; height:100px;  max-width:230px;   font-weight:900; display:none;" >
                      	<button style="padding:5px; width:90%; cursor:pointer; border:solid thin #00300F; background:#FFF;  " onMouseOver="this.style.border='solid thin #00F00F';" onMouseOut="this.style.border='solid thin #00300F';" onClick="document.location.href='logout.php';">Logout&nbsp; &gt;</button>
                        <span style="padding:5px; cursor:pointer; border:solid thin #00300F; border-radius:100px; z-index:550;  color:red; position:absolute; bottom:5px; right:5px; " onMouseOver="this.style.border='solid thin #00F00F';" onMouseOut="this.style.border='solid thin #00300F';"  title="click to close this window." onClick="var xxa = document.getElementById('usermenudv'); if(xxa){xxa.style.display = 'none';}">&nbsp; x &nbsp;</span>
                      </div>
                <?PHP } ?>
                
                            	<select id="menus" class="hoverefct1" style="width:99%; max-width:100px; height:35px; border:solid 
                                 rgba(0,0,102,.3); margin:5px; border-radius:3px;" onKeyPress="var d=document.getElementById(this.id+'e');if(d){d.style.display='none';}" data-rdiv="menuActivityDiv" data-ldiv="dataLoadingDiv" onmouseover="this.style.maxWidth='500px';" onBlur="this.style.maxWidth='100px';"> 
                    <option value="-1" selected>&equiv; Menu</option>
                    <option value="HOME">&larr; Home Page</option>
                    <?PHP if(isset($USER_TYPE) && $USER_TYPE!=NULL && trim(strtoupper($USER_TYPE))==base64_encode("DOPARTY")){  $reportOf = 'DOPARTYReports'; ?>
                    <option value="<?PHP echo base64_encode('AddVehicle'); ?>" selected>&plusmn; Add New Vehicle </option>
                    <option value="<?PHP echo base64_encode('ModifyVehicle'); ?>">&Omega; Modify Vehicle</option>
                    <option value="<?PHP echo base64_encode('AllocateVehicle'); ?>">&infin; Map / Un-Map Vehicles for DO</option>
                    <?PHP }else if(isset($USER_TYPE) && $USER_TYPE!=NULL && trim(strtoupper($USER_TYPE))==base64_encode("EMPLOYEE")){ $reportOf = 'EMPLOYEEReports';  ?>
                    <option value="<?PHP echo base64_encode('Add_area_mines'); ?>" >&plusmn; Add New Area, Mines etc. </option>
                    <option value="<?PHP echo base64_encode('ApproveDo'); ?>" >&radic; Approve New D.O </option>
                    <option value="<?PHP echo base64_encode('ApproveVehicle'); ?>" >&radic; Approve New Vehicle </option>
                    <option value="<?PHP echo base64_encode('ApproveUser'); ?>">&radic; Approve New User</option>
                    <option value="<?PHP echo base64_encode('Upload_DO_Data'); ?>">&ugrave; Upload DO Data</option>
                    <option value="<?PHP echo base64_encode('Daily_Quota_Allotment'); ?>">&clubs; Daily Quota Allotment </option>
                    <?PHP } ?>
                    <option value="<?PHP echo base64_encode($reportOf); ?>">&real; View Reports </option>
                </select><p id="menus" style="color:red; display:none; ">SELECT CORRECT OPTION PLEASE.</p>
           </div>
      </div><!--menuOptionsDiv-->
      <div class="row" id="menuActivity" >
        	<div class="col-lg-12" id="dataLoadingDiv" style="display:none; text-align:center; padding:10px; background:rgba(204,255,204,0.7); font-weight:900;">Wait Data is loading...</div>
            <div class="col-lg-12" id="menuActivityDiv" style="display:; padding-top:10px;"></div>
    </div>
        
        
	<?PHP }else{ 
			echo loginError();
	 }/*else*/ ?>
	<?PHP if(isset($USER_TYPE) && $USER_TYPE!=NULL && trim(strtoupper($USER_TYPE))==base64_encode("DOPARTY")){ 
			include("CONSUMER_DESHBOARD.php");
		  }else if(isset($USER_TYPE) && $USER_TYPE!=NULL && trim(strtoupper($USER_TYPE))==base64_encode("EMPLOYEE")){
			include("EMPLOYEE_DESHBOARD.php");
		  } ?>
     <div class="row"><div class="col-lg-12" style="height:70px;">&nbsp;</div></div>
</div> <!------container-fuid---->
<?PHP $isindex=0; include_once("xfooter.php");?><!-----footer----->             
<script>
var frmd=new FormData();
var avilH=window.screen.availHeight;
   if(document.getElementById('conainer_id')){
	  var hdr_dv=0;
	  if(document.getElementById('logo_title')){ 
		 hdr_dv=document.getElementById('logo_title').scrollHeight; 
	  }  if(document.getElementById('conainer_id'))
	  document.getElementById('conainer_id').style.minHeight= (avilH-80)+'px';
	 }	 
function checkEnterKey(e){ 
	 var characterCode; 
	 e = (e || window.event); 
	 characterCode = e.keyCode || e.which;
	 if (characterCode == 13)
	 { return true;
}else{return false;}}	 
function str_rot13 (str) {/*
    // +   original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // +   improved by: Ates Goral (http://magnetiq.com)
    // +   bugfixed by: Onno Marsman
    // +   improved by: Rafał Kukawski (http://blog.kukawski.pl)
    // *     example 1: str_rot13('Kevin van Zonneveld');
    // *     returns 1: 'Xriva ina Mbaariryq'
    // *     example 2: str_rot13('Xriva ina Mbaariryq');
    // *     returns 2: 'Kevin van Zonneveld'
    // *     example 3: str_rot13(33);
    // *     returns 3: '33'*/
    return (str + '').replace(/[a-z]/gi, function (s) {
        return String.fromCharCode(s.charCodeAt(0) + (s.toLowerCase() < 'n' ? 13 : -13));
    });}
function gen_uniq(EIS,MMYY1){var u=md5(str_rot13("Salary"+EIS+"RamGNXT")+"CurrentMonth"+MMYY1); return u;}
function removeArr(ar,arv){/*delete selected value from array.*/
         return ar.filter(function(e){
	                      return e!=arv;});
}
function HideShow(s,h){
  if(typeof s!="undefined"){
	for(var i=0;i<s.length;i++){ 
	    var c1=document.getElementById(s[i]); 
		if(typeof c1!="undefined"){c1.style.display='';}
	}
  }
  if(typeof h!="undefined"){
	for(var i=0;i<h.length;i++){
	    var c1=document.getElementById(h[i]);	
		if(typeof c1!="undefined"){c1.style.display='none';}
	}
  }
}
/*------------all-functions-are-used-for-area-project----------------------------------*/

function updateURLParameter(url, param, paramVal){ /*this function can add any paramter to usrl*/
    var newAdditionalURL = "";
    var tempArray = url.split("?");
    var baseURL = tempArray[0];
    var additionalURL = tempArray[1];
    var temp = "";
    if (additionalURL) {tempArray = additionalURL.split("&"); 
	    for (var i=0; i<tempArray.length; i++){if(tempArray[i].split('=')[0] != param){
			newAdditionalURL += temp + tempArray[i];temp = "&";}}
    }
    var rows_txt = temp + "" + param + "=" + paramVal;
    return baseURL + "?" + newAdditionalURL + rows_txt;
}  
var _grades={
          "G_1":"G-1",
		  "G_2":"G-2",
		  "G_3":"G-3",
		  "G_4":"G-4",
		  "G_5":"G-5",
		  "G_6":"G-6",
		  "G_7":"G-7",
		  "G_8":"G-8",
		  "G_9":"G-9",
		  "G_10":"G-10",
		  "G_11":"G-11",
		  "G_12":"G-12",
		  "G_13":"G-13",
		  "G_14":"G-14",
		  "G_15":"G-15",
		  "G_16":"G-16",
		  "G_17":"G-17",
		  "NSG":"Not specified / Mixed Grade"
		}; 
var _areas={
            "RAIGARH":"RAIGARH", 
            "DIPKA":"DIPKA",
			"JOHILA":"JOHILA",
			"HASHDEV":"HASHDEV",
			"BISRAMPUR":"BISRAMPUR",
			"BAIKUNTHPUR":"BAIKUNTHPUR",
			"KORBA":"KORBA",
			"KHUSMUNDA":"KHUSMUNDA",
		    "GEVERA":"GEVERA",
            "SECL_HQ":"SECL HQ",
            "BHATGAON":"BHATGAON"
		  }; 
function showFullScreen(dvid){
	var dv=document.createElement("div");
	    dv.id="b_"+Math.random(1,10)+"DV_"+Math.random(1,500)+"_"+Math.random(100,1000);
		dv.style.position="absolute";
		dv.style.top='2px'
		dv.style.left="1px";
		dv.style.padding='8px';
		dv.style.right="10px";
		dv.style.width='99.7%';
		dv.style.height='99.5%';
		dv.style.overflow="auto";
		dv.style.backgroundColor='rgba(255,252,252,1)';
		var	cbtn=document.createElement("span");
			cbtn.innerHTML="&nbsp;X&nbsp;";
			cbtn.title="CLICK TO CLOSE IT";
			cbtn.style.position='absolute';
			cbtn.style.cursor='pointer';
			cbtn.style.borderRadius='2px';
			cbtn.style.right='10px';
			cbtn.style.padding='4px';
			cbtn.style.backgroundColor='rgba(250,10,10,1)';
			cbtn.style.color='rgba(250,253,255,1)';
			cbtn.style.fontWeight=900;
			cbtn.style.zIndex='1000';
			dv.appendChild(cbtn);
			cbtn.addEventListener("click", function(){if(document.getElementById(dv.id)){document.body.removeChild(document.getElementById(dv.id));}document.body.style.overflow='auto'; });
		var dv2=document.createElement("div");
			dv2.style.padding='10px';
			dv2.style.margin='10px';
			dv2.innerHTML=(document.getElementById(dvid)?document.getElementById(dvid).innerHTML:"There is no content to show!");
			dv2.style.overflow="auto";
			dv.appendChild(dv2);
		document.body.appendChild(dv);
		if(typeof scrollUptoDv!="undefined"){scrollUptoDv("logo_title");}
		document.body.style.overflow='hidden';
}

</script>
 <script src="js/js_functions.js" async></script>
 <script src="js/jquery.min.js" ></script>
<script src="js/CIL_boot.min.js" ></script>
<script src="js/md5.min.js"></script>
<script src="js/d3.min.js"></script>
<script src="js/csvarsor_papa.js"></script>
 <?PHP include_once("preview_js.php"); ?>
 <script> 
 function loadAreaMines_data(conditions){
    /*conditions = {'COMPANY':atob('SECL'),'AREA_SAP_PLANTCD':null,'MINES_SAP_PLANTCD':null}; /*any value null:-> means load all possible values.*/
    var company = (typeof conditions!='undefined' && typeof conditions['COMPANY']!='undefined' && conditions['COMPANY']!='' )?conditions['COMPANY']:null;
    if(typeof company == 'undefined' || company==null || company==''){console.log('Select a company Name first to load the area details.'); return false;}
    var data = "company~::~"+btoa(company); 
    var _newfrm = new FormData(); 
    _newfrm.set(btoa(unescape(encodeURIComponent('sb'))),btoa(unescape(encodeURIComponent('FetchCompAreaMines_Names'))));
    _newfrm.set(btoa(unescape(encodeURIComponent('data'))),btoa(data));  
    var url="register_new_area_mines.php";  
    var resultDvId = "result_area";
    if(document.getElementById(resultDvId)){
       document.getElementById(resultDvId).dataset.isreloadpage='1';
       document.getElementById(resultDvId).dataset.triggerafter_miliseconds='100';
    }
    sendOnServerData(url,_newfrm,resultDvId,isOperationSuccessful); 
 }
 function onclick_area_create(ths){
     if(typeof ths=='undefined' || ths==null){
         alert('some InternalError occurred @onclick_area_create module.'); return false;
     }
    var cmpny = (ths.dataset.company!='undefined' && ths.dataset.company!=null && ths.dataset.company!='')?ths.dataset.company:null; 
    var arean = (typeof document.getElementById('pa_areaname') !='undefined' && document.getElementById('pa_areaname')!=null && document.getElementById('pa_areaname').value.trim()!='')?document.getElementById('pa_areaname').value:null;
    var areaPcode = (typeof document.getElementById('pa_areapc') !='undefined' && document.getElementById('pa_areapc')!=null && document.getElementById('pa_areapc').value.trim()!='')?document.getElementById('pa_areapc').value:null;
    if(cmpny==null || arean==null || areaPcode==null){
        alert('Either company, Area name or plant code etc. is missing, kindly check and retry.');
        if(arean==null){
            document.getElementById('pa_areaname').focus();
            document.getElementById('pa_areanamee').style.display='';
            return false;
        }
        if(areaPcode==null){
            document.getElementById('pa_areapc').focus();
            document.getElementById('pa_areapce').style.display='';
            return false;
        }
    }
    var data = "company~::~"+btoa(cmpny)+"~`~"+"area~::~"+btoa(arean)+"~`~"+"areapcode~::~"+btoa(areaPcode); 
    var _newfrm = new FormData(); 
    _newfrm.set(btoa(unescape(encodeURIComponent('sb'))),btoa(unescape(encodeURIComponent('registerNewAreaName'))));
    _newfrm.set(btoa(unescape(encodeURIComponent('data'))),btoa(data));  
    var url="register_new_area_mines.php";  
    var resultDvId = "result_area";
    if(document.getElementById(resultDvId)){
       document.getElementById(resultDvId).dataset.isreloadpage='1';
       document.getElementById(resultDvId).dataset.triggerafter_miliseconds='100';
    }
    sendOnServerData(url,_newfrm,resultDvId,isOperationSuccessful);  
 }
 function openNewDiv_with(openDivFor,params){
    var tmpDv = document.createElement("div"); 
    var div_id = 'tmp';
    if(openDivFor=="addNewArea"){
        var Company_Name = (typeof params!="undefined" && typeof params["company"]!="undefined")?atob(params["company"]):null; if(Company_Name==null || Company_Name==''){alert('Select correct company Name first.'); return;}
        div_id += md5(Math.random()*100);
        tmpDv.id = div_id;
        tmpDv.style.position='absolute';
        tmpDv.style.left='0px';
        tmpDv.style.top='0px';
        tmpDv.style.minHeight='890px';
        tmpDv.style.height='99.9%'; 
        tmpDv.style.width='99.9%';
        tmpDv.style.overflow='auto';
        tmpDv.style.backgroundColor='rgba(247, 253, 255,1)';
        tmpDv.style.padding='60px';
        tmpDv.style.fontSize='18px';
       
        tmpDv.innerHTML="<div style='border-bottom:solid thin rgba(247, 229, 150,1);padding:5px;padding-top:10px; fontWeight:900; font-size:22px;'><span data-parentnode_id='"+tmpDv.id+"' style=\"color:#FF3003; font-size:13px; padding:5px; border:solid thin ; border-radius:1%; cursor:pointer;\" onmousedown=\"this.classList.add('mdwn_plus');\" onmouseup=\"this.classList.remove('mdwn_plus');\" onblur=\"this.classList.remove('mdwn_plus');this.classList.add('mover_plus');\" onmouseover=\"this.classList.add('mover_plus');\" onmouseout=\"this.classList.remove('mover_plus');\" title='click to close this window.' data-toggle='tooltip' onclick=\"window.document.body.classList.remove('stop_scrolling'); if(document.getElementById(this.dataset.parentnode_id).parentNode!='undefined'){document.getElementById(this.dataset.parentnode_id).parentNode.removeChild(document.getElementById(this.dataset.parentnode_id));}\" >&nbsp;x&nbsp;</span>&nbsp; Add New Area Name</div><br/>&nbsp;<br/>";
        tmpDv.innerHTML +="<div style='border-bottom:solid thin rgba(247, 229, 150,1);padding:5px;'>Company Name<br/><input type='text' id='pa_company' style='width:99%; max-width:350px; height:45px; border:solid thin rgba(0,0,102,.3); margin:5px; ' disabled value='"+Company_Name+"' /></div>";
        tmpDv.innerHTML +="<div style='border-bottom:solid thin rgba(247, 229, 150,1);padding:5px;'>Enter Area Name<br/><input type=\"text\" id=\"pa_areaname\" class=\"hoverefct1\" style=\"width:99%; max-width:350px; height:45px; border:solid thin rgba(0,0,102,.3); margin:5px; \" onKeyPress=\"var d=document.getElementById(this.id+'e');if(d){d.style.display='none';}\" onBlur=\"setValue_or_innerHTML_asDataset(this);\"  /><p id=\"pa_areanamee\" class=\"errp_c\" style=\"display:none\">Enter Correct Area Name</p></div>";
        tmpDv.innerHTML +="<div style='border-bottom:solid thin rgba(247, 229, 150,1);padding:5px;'>Enter Area SAP Plant Code<br/><input type=\"text\" id=\"pa_areapc\" class=\"hoverefct1\" style=\"width:99%; max-width:350px; height:45px; border:solid thin rgba(0,0,102,.3); margin:5px; \" onKeyPress=\"var d=document.getElementById(this.id+'e');if(d){d.style.display='none';}\" onBlur=\"setValue_or_innerHTML_asDataset(this);\"  /><p id=\"pa_areapce\" class=\"errp_c\" style=\"display:none\">Enter Correct SAP Plant code</p></div>";
        tmpDv.innerHTML +="<br/><div style='border-bottom:solid thin rgba(247, 229, 150,1);padding:5px;'> <button class=\"button2\" data-company='"+Company_Name+"' id=\"saveNewArea_details\" style=\"vertical-align:middle;background:rgba(0, 4, 2,1); color:#FFFFFF; width:95%; max-width:370px;\" data-toggle=\"tooltip\" data-loaderImgUrl='14.gif' data-btnText=\"<span id='spntx'> Save Details </span>\" title=\"Click to save Details\" onclick='onclick_area_create(this);'><span id=\"spntx\"> Save Details </span></button></div><div id='result_area' style='display:none; padding:5px;'></div>";
        
         
        window.document.body.appendChild(tmpDv);
        window.document.body.classList.add('stop_scrolling');
    } 
 }
 function checkArea_mines_entry_details_returnJson(flds){
    var return_json = {'0':null,'1':''}; 
    var fld_vals ="";
    if(typeof flds=='undefined' || flds=={} || flds==null){return false; } 
    if(flds.length>0){
        for(var x=0; x< flds.length;x++){
            var _fid = flds[x];
            if(document.getElementById(_fid)){
                 var _fval = (typeof document.getElementById(_fid).dataset.convertbs64!='undefined' && document.getElementById(_fid).dataset.convertbs64=='1')?btoa(document.getElementById(_fid).value):document.getElementById(_fid).value;
                if(typeof _fval == 'undefined' && _fval==null || _fval.trim()=='' || _fval.trim()=='-1'){
                    document.getElementById(_fid).focus();
                    if(document.getElementById(_fid+'e')){
                        document.getElementById(_fid+'e').style.display='';
                        return {'0':null,'1':''};
                    }
                }else{
                    if(fld_vals ==''){fld_vals += _fid+"~::~"+_fval;}else{fld_vals += "~`~"+ _fid+"~::~"+_fval;}
                }
            }
        }
        return_json = {'0':1,'1':fld_vals};
    }
    return return_json;
 }
 function renderMappingEditScreen(Mapped_data_obj, mdv){  
    if(typeof Mapped_data_obj =='undefined' || Mapped_data_obj == null ||  Object.keys(Mapped_data_obj).length <= 0){ alert('in module renderMappingEditScreen: Mapping Data is missing, either refresh this page and retry or contact the technical team.'); return;} 
    var RUID =  PARTY_CODE =   LOCK = VEHICLE_NUMBER =   DO_NUMBER = DO_VALIDITY =  CURRENT_STATUS = ASSIGNED_ON =   MINE_ENTRY_ON =  REJECTED_ON =  EXITED_FROM_MINES_ON =  LOADED_QTY =  REMARKS  = '';
    mdv.innerHTML='';
    var RSP_STR = "";
    var colors = genrateRandom_rgb();
    mdv.style.backgroundColor="rgba("+colors.r+", "+colors.g+", "+colors.b+", 0.1)";
    mdv.style.overflow = 'auto';
    RSP_STR  += "<div class='row' style='padding:5px; border:none; '>"; 
    
    RSP_STR  += " <div class=\"col-lg-12\" style=\"padding:10px;\"><br/>";
                RSP_STR  += "<table id='DO_MAPPING_TBL' cellpadding='5' cellspacing='5' style='border:solid thin #003003; width:99%; font-size:12px;'>";
                    RSP_STR  += " <tr style='padding:5px;  font-weight:900; text-align:center; border-bottom:solid thin rgba(195, 239, 247,0.8); background-color:rgba(255, 255, 255,0.3) ;'>";
                        RSP_STR  += " <td colspan='6' style='padding:5px; border:solid thin rgba(166, 196, 247,1); min-width:140px; ' ><h4>Selected Mapping Details</h4></TD>";
                    RSP_STR  += " </tr>";
                Object.keys(Mapped_data_obj).forEach(k1 => {
                    var Mapped_data = Mapped_data_obj[k1];
                        RUID =  (typeof Mapped_data["RUID"] !='undefined')?Mapped_data["RUID"]:'';
                        PARTY_CODE =  (typeof Mapped_data["PARTY_CODE"] !='undefined')?Mapped_data["PARTY_CODE"]:''; 
                        LOCK = (typeof Mapped_data["LOCKED"] !='undefined')?Mapped_data["LOCKED"]:'';
                        VEHICLE_NUMBER = (typeof Mapped_data["VEHICLE_NUMBER"] !='undefined')?Mapped_data["VEHICLE_NUMBER"]:'';
                        DO_NUMBER = (typeof Mapped_data["DO_NO"] !='undefined')?Mapped_data["DO_NO"]:''; 
                        DO_VALIDITY = (typeof Mapped_data["DO_VALIDITY"] !='undefined')?Mapped_data["DO_VALIDITY"]:'';
                        CURRENT_STATUS = (typeof Mapped_data["CURRENT_STATUS"] !='undefined')?Mapped_data["CURRENT_STATUS"]:'';
                        ASSIGNED_ON =  (typeof Mapped_data["ASSIGNED_ON"] !='undefined')?Mapped_data["ASSIGNED_ON"]:'';
                        MINE_ENTRY_ON =  (typeof Mapped_data["MINE_ENTRY_ON"] !='undefined')?Mapped_data["MINE_ENTRY_ON"]:'';
                        REJECTED_ON =  (typeof Mapped_data["REJECTED_ON"] !='undefined')?Mapped_data["REJECTED_ON"]:'';
                        EXITED_FROM_MINES_ON =  (typeof Mapped_data["EXITED_FROM_MINES_ON"] !='undefined')?Mapped_data["EXITED_FROM_MINES_ON"]:'';
                        LOADED_QTY =  (typeof Mapped_data["LOADED_QTY"] !='undefined')?Mapped_data["LOADED_QTY"]:'';
                        REMARKS  =  (typeof Mapped_data["REMARKS"] !='undefined')?Mapped_data["REMARKS"]:'';
                    RSP_STR  += " <tr style='padding:5px;  font-weight:900; text-align:center; border-bottom:solid thin rgba(195, 239, 247,0.8); background-color:rgba(255, 255, 255,1) ;'>";
                        RSP_STR  += " <td colspan='6' style='padding:5px; border:solid thin rgba(166, 196, 247,1); min-width:140px; ' >&nbsp;</td>";
                    RSP_STR  += " </tr>";
                    RSP_STR  += " <tr style='background-color:rgba(255, 255, 255,1);'>"; 
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);background-color:rgba(195, 239, 247,0.2); min-width:110px; ' >";
                            if(LOCK=='0' || (LOADED_QTY!='' && LOADED_QTY > 0 ) || (typeof EXITED_FROM_MINES_ON!='undefined' && EXITED_FROM_MINES_ON!=null && EXITED_FROM_MINES_ON!='')){
                                RSP_STR +="<input type='checkbox' class='css_checkbox' id='"+RUID+"' data-selectval='"+RUID+"' onclick=\"selectThisRecord(this,'MAPPINGS_TOBE_DELETED');\" style='height:23px; width:23px; cursor:pointer;' title='Select to Delete / Un-Map the item' /> &nbsp;";
                            }else{
                                RSP_STR +="<input type='checkbox' id='not"+RUID+"' onclick=\"alert('You can not delete vehicle till either vehicle rejected or exited from the mines after coal Loading.'); return false;\" style='height:23px; width:23px; background-color: red; border:dotted thin #FF0000; opacity:0.2; cursor:pointer;' title='This item cant be deleted, since it locked due to vehicle is in mines.' /> &nbsp;";
                            }
                            RSP_STR +="VEHICLE NUMBER</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);font-weight:900;' >"+VEHICLE_NUMBER+"</TD>"; 
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);background-color:rgba(195, 239, 247,0.2); min-width:110px; ' >D.O. NO</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1); font-weight:900;' >"+DO_NUMBER+"</TD>"; 
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);background-color:rgba(195, 239, 247,0.2); min-width:110px; ' >D.O. PARTY CODE</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+PARTY_CODE+"</TD>";
                    RSP_STR  += " </tr>"; 
                    RSP_STR  += " <tr style='background-color:rgba(255, 255, 255,1);'>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);background-color:rgba(195, 239, 247,0.2); min-width:110px; ' >VALIDITY DATE</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_VALIDITY+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);background-color:rgba(195, 239, 247,0.2); min-width:110px; ' >VEHICLE CURRENT STATUS</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+((CURRENT_STATUS=='ASSIGNED')?' VEHICLE ASSIGNED to D.O ':CURRENT_STATUS)+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);background-color:rgba(195, 239, 247,0.2); min-width:110px; ' >VEHICLE MAPPED ON</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+ASSIGNED_ON+"</TD>";
                    RSP_STR  += " </tr>"; 
                    RSP_STR  += " <tr style='background-color:rgba(255, 255, 255,1);'>"; 
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);background-color:rgba(195, 239, 247,0.2); min-width:110px; ' >LOADED COAL QTY</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+LOADED_QTY+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);background-color:rgba(195, 239, 247,0.2); min-width:110px; ' >VEHICLE ENTERED IN MINES ON</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+( (MINE_ENTRY_ON == '0000-00-00 00:00:00')?'':MINE_ENTRY_ON )+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);background-color:rgba(195, 239, 247,0.2); min-width:110px; ' >VEHICLE REJECTED ON</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+( (REJECTED_ON == '0000-00-00 00:00:00')?'':REJECTED_ON )+"</TD>";
                    RSP_STR  += " </tr>"; 
                    RSP_STR  += " <tr style='background-color:rgba(255, 255, 255,1);'>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);background-color:rgba(195, 239, 247,0.2); min-width:110px; ' >VEHICLE LEAVE MINES ON</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+( (EXITED_FROM_MINES_ON == '0000-00-00 00:00:00')?'':EXITED_FROM_MINES_ON )+"</TD>";
                        RSP_STR  += " <td  style='padding:5px; border:solid thin rgba(166, 196, 247,1);background-color:rgba(195, 239, 247,0.2); min-width:110px; ' >REMARKS</TD>";
                        RSP_STR  += " <td colspan='3' style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+REMARKS+"</TD>";
                    RSP_STR  += " </tr>"; 
                }); /*Object.keys....*/    
                    RSP_STR  += " <tr style='background-color:rgba(255, 255, 255,0.8);'>";
                        RSP_STR  += " <td colspan='6' style='padding:5px; border:solid thin rgba(166, 196, 247,1); font-weight:900; height:90px; text-align:center;' ><button class=\"button2\"  id=\"btn_"+RUID+"\" style=\"vertical-align:middle;background:#ef233c; color:#FFFFFF; width:95%; max-width:370px;\" data-toggle=\"tooltip\" data-loaderImgUrl='14.gif' onclick=\"approveSelectedRecords(this, 'MAPPINGS_TOBE_DELETED','mappedvehicles');\" data-btnText=\"<span id='spntx'> Delete The Selected Records</span>\" title=\"Click to Delete the selected records\"><span id=\"spntx\"> Delete The Selected Records </span></button> </TD> ";
                    RSP_STR  += " </tr>";
                    RSP_STR  += " <tr style='background-color:rgba(255, 255, 255,0.8);'>";
                        RSP_STR  += " <td colspan='6' style='padding:5px; border:solid thin rgba(166, 196, 247,1); font-weight:900; height:90px; text-align:center; display:none;' id='actionbtn_rsltDv' data-sbtn=\"btn_"+RUID+"\" >&nbsp; </TD> ";
                    RSP_STR  += " </tr>";
                RSP_STR  += "</table>"; 
            RSP_STR  += "</div>"; 
    RSP_STR  += "</div>";   
    mdv.innerHTML = RSP_STR ;
    
 }
 function renderMappingDataScreen(Do_data, mdv){
    if(typeof Do_data =='undefined' || Do_data == null ||  Object.keys(Do_data).length <= 0){ alert('in module renderMappingDataScreen: D.O. Data is missing, either refresh this page and retry or contact the technical team.'); return;}
    var DO_NUMBER = (typeof Do_data["DO_NO"] !='undefined')?Do_data["DO_NO"]:'';
    var DO_DATE = (typeof Do_data["DO_DATE"] !='undefined')?Do_data["DO_DATE"]:'';
    var DO_QTY = (typeof Do_data["DO_QTY"] !='undefined')?Do_data["DO_QTY"]:'';
    var DO_VALIDITY = (typeof Do_data["DO_VALIDITY"] !='undefined')?Do_data["DO_VALIDITY"]:'';
    var DO_BASIC_RATE = (typeof Do_data["BASIC_RATE"] !='undefined')?Do_data["BASIC_RATE"]:'';
    var DO_FSA_AUCTION = (typeof Do_data["FSA_AUCTION_TYPE"] !='undefined')?Do_data["FSA_AUCTION_TYPE"]:'';
    var DO_FSA_AUCTION_BID_NO = (typeof Do_data["FSA_AUCTION_BID_NO"] !='undefined')?Do_data["FSA_AUCTION_BID_NO"]:'';
    var DO_GRADE = (typeof Do_data["GRADE"] !='undefined')?Do_data["GRADE"]:'';
    var DO_SIZE = (typeof Do_data["SIZE"] !='undefined')?Do_data["SIZE"]:'';
    var DO_RELEASE_TYPE = (typeof Do_data["RELEASE_TYPE"] !='undefined')?Do_data["RELEASE_TYPE"]:'';
    var DO_AREA_MINE = (typeof Do_data["AREA"] !='undefined' && typeof Do_data["MINES"] !="undefined")?Do_data["AREA"]+" - "+Do_data["MINES"]:'';
    
    var DO_PARTY_CODE = (typeof Do_data["PARTY_CODE"] !='undefined')?Do_data["PARTY_CODE"]:'';
    var DO_PARTY_NAME = (typeof Do_data["PARTY_NAME"] !='undefined')?Do_data["PARTY_NAME"]:'';
    var DO_PARTY_ADDRESS = (typeof Do_data["PARTY_ADDRESS"] !='undefined')?Do_data["PARTY_ADDRESS"]:'';
    var DO_DESTINATION = (typeof Do_data["DESTINATION"] !='undefined')?Do_data["DESTINATION"]:'';
    var DO_ISSUE_NO = (typeof Do_data["ISSUE_NO"] !='undefined')?Do_data["ISSUE_NO"]:'';
    var DO_ISSUE_DATE = (typeof Do_data["ISSUE_DATE"] !='undefined')?Do_data["ISSUE_DATE"]:'';
    var DO_PARTY_PRIORITY_TEXT = (typeof Do_data["PRIORITY_TEXT"] !='undefined')?Do_data["PRIORITY_TEXT"]:'';
    var DO_APPROVED_BY = (typeof Do_data["APROVED_BY"] !='undefined')?Do_data["APROVED_BY"]:'';
    var DO_APPROVED_ON = (typeof Do_data["APROVED_ON"] !='undefined')?Do_data["APROVED_ON"]:'';
    var DO_CONSUMER_TYPE = (typeof Do_data["CONSUMER_TYPE"] !='undefined')?Do_data["CONSUMER_TYPE"]:'';
    var REMARKS = (typeof Do_data["remarks"] !='undefined')?Do_data["remarks"]:'';
    
    
    mdv.innerHTML='';
    var RSP_STR = "";
    var colors = genrateRandom_rgb();
    mdv.style.backgroundColor="rgba("+colors.r+", "+colors.g+", "+colors.b+", 0.1)";
    mdv.style.overflow = 'auto';
    RSP_STR  += "<div class='row' style='padding:5px; border:none; '>"; 
            
            RSP_STR  += " <div class=\"col-lg-12\" style=\"padding:10px;\"><br/>";
                RSP_STR  += "<table id='DO_DETAILS_TBL' cellpadding='5' cellspacing='5' style='border:solid thin #003003; width:99%;'>";
                    RSP_STR  += " <tr style='padding:5px;  font-weight:900; text-align:center; border-bottom:solid thin rgba(195, 239, 247,0.8); background-color:rgba(255, 255, 255,0.3) ;'>";
                        RSP_STR  += " <td colspan='11' style='padding:5px; border:solid thin rgba(166, 196, 247,1); min-width:140px; ' ><h4>Selected D.O. Details</h4></TD>";
                    RSP_STR  += " </tr>";
                    RSP_STR  += " <tr style='background-color:rgba(195, 239, 247,0.2);'>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1); min-width:140px; ' >D.O. No</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1); min-width:140px; ' >DO DATE</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1); min-width:140px; ' >D.O. QTY</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1); min-width:140px; ' >VALIDITY DATE</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1); min-width:140px; ' >BASIC RATE(Rs.)</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1); min-width:140px; ' >FSA / AUCTION TYPE</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1); min-width:140px; ' >FSA / AUCTION BID_NO</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1); min-width:140px; ' >GRADE</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1); min-width:140px; ' > SIZE</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1); min-width:140px; ' >RELEASE_TYPE</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1); min-width:140px; ' >AREA / MINES</TD>";
                    RSP_STR  += " </tr>";  
                    RSP_STR  += " <tr style='background-color:rgba(255, 255, 255,0.8);'>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1); font-weight:900;' >"+DO_NUMBER+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_DATE+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_QTY+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_VALIDITY+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_BASIC_RATE+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_FSA_AUCTION+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_FSA_AUCTION_BID_NO+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_GRADE+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_SIZE+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_RELEASE_TYPE+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_AREA_MINE+"</TD>";
                    RSP_STR  += " </tr>";
                    RSP_STR  += " <tr style='background-color:rgba(195, 239, 247,0.2);'>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1); ' >PARTY CODE</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >PARTY NAME</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >ISSUE No</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >ISSUE DATE</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >CONSUMER TYPE</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >DESTINATION</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >PARTY ADDRESS</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >PRIORITY</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >D.O. APROVED BY </TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >D.O. APROVED ON</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >REMARKS</TD>";
                    RSP_STR  += " </tr>";  
                    RSP_STR  += " <tr style='background-color:rgba(255, 255, 255,0.8);'>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);font-weight:900; ' >"+DO_PARTY_CODE+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_PARTY_NAME+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_ISSUE_NO+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_ISSUE_DATE+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_CONSUMER_TYPE+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_DESTINATION+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_PARTY_ADDRESS+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_PARTY_PRIORITY_TEXT+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_APPROVED_BY+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+DO_APPROVED_ON+"</TD>";
                        RSP_STR  += " <td style='padding:5px; border:solid thin rgba(166, 196, 247,1);' >"+REMARKS+"</TD>";
                    RSP_STR  += " </tr>";
                    RSP_STR  += " <tr style='padding:5px;border:none; background-color:rgba(255, 255, 255,1) ; height:55px;'>";
                        RSP_STR  += " <td colspan='11' style=' border-left:solid thin rgba(166, 196, 247,1); border-right:solid thin rgba(166, 196, 247,1); ' >&nbsp;</TD>";
                    RSP_STR  += " </tr>";
                    RSP_STR  += " <tr style='padding:5px;  font-weight:900; text-align:center;background-color:rgba(255, 255, 255,1) ;'>";
                        RSP_STR  += " <td colspan='11' style='padding:5px; border:solid thin rgba(166, 196, 247,1); font-size:12.5px; border-top:dashed thin rgba(166, 196, 247,0.4);  min-width:140px; ' >Vehicles Available For Mapping.</TD>";
                    RSP_STR  += " </tr>";
                    RSP_STR  += " <tr style='padding:5px;  font-weight:900; text-align:center; border-bottom:solid thin rgba(195, 239, 247,0.8); background-color:rgba(255, 255, 255,1) ;'>";
                        RSP_STR  += " <td colspan='11' style='padding:5px; border:solid thin rgba(166, 196, 247,1); min-width:140px; ' id='showVehicles'>&nbsp;</TD>";
                    RSP_STR  += " </tr>";
                RSP_STR  += "</table>"; 
            RSP_STR  += "</div>"; 
    RSP_STR  += "</div>";  
    mdv.innerHTML = RSP_STR ;
    var vtd = document.getElementById('showVehicles');
    if(typeof WaitDataLoading !="undefined" && vtd!= null){
        WaitDataLoading(vtd, '', '1');
        /*HereLoadVehicles*/ 
    		var formdt = new FormData();
    		formdt.set(btoa(unescape(encodeURIComponent('sb'))),btoa(unescape(encodeURIComponent('available_registered_vehicles'))));
    		formdt.set(btoa(unescape(encodeURIComponent('party_code'))),btoa(unescape(encodeURIComponent(DO_PARTY_CODE))));
    		formdt.set(btoa(unescape(encodeURIComponent('do_no'))),btoa(unescape(encodeURIComponent(DO_NUMBER))));
    		formdt.set(btoa(unescape(encodeURIComponent('result_tdID'))),btoa(unescape(encodeURIComponent(vtd.id))));
    		formdt.set(btoa(unescape(encodeURIComponent('do_validity'))),btoa(unescape(encodeURIComponent(DO_VALIDITY))));
    		var url="fetch_register_vehicle.php";  
    		var xtmr = setTimeout(function(){
    		        sendOnServerData(url,formdt,vtd.id,isOperationSuccessful);
    		        if(xtmr){clearTimeout(xtmr);}
    		},500);  
    }
   
 }
 function renderModifyDataScreen(vehicle_data, mdv){
	 if(mdv){ 
		 var VEHICLE_NUMBER = (typeof vehicle_data["VEHICLE_NUMBER"] !='undefined')?vehicle_data["VEHICLE_NUMBER"]:"";
		 var IS_VALID_INSURENCE = (typeof vehicle_data["IS_VALID_INSURENCE"] !='undefined')?vehicle_data["IS_VALID_INSURENCE"]:"";
		 var INSURENCE_NUMBER = (typeof vehicle_data["INSURENCE_NUMBER"] !='undefined')?vehicle_data["INSURENCE_NUMBER"]:""; 
		 var TARE_WEIGHT = (typeof vehicle_data["TARE_WEIGHT"] !='undefined')?vehicle_data["TARE_WEIGHT"]:""; 
		 var VEHICLE_TYPE = (typeof vehicle_data["VEHICLE_TYPE"] !='undefined')?vehicle_data["VEHICLE_TYPE"]:""; 
		 var marked_by_owner = (typeof vehicle_data["marked_by_owner"] !='undefined')?vehicle_data["marked_by_owner"]:"1"; 
		 var IS_ACTIVE = (typeof vehicle_data["IS_ACTIVE"] !='undefined')?vehicle_data["IS_ACTIVE"]:"";
		 var pdf_file = (typeof vehicle_data["pdf_file"] !='undefined')?vehicle_data["pdf_file"]:""; 
		 var modify_fldform = new FormData(); 
		 
		 mdv.innerHTML='';
		 var colors = genrateRandom_rgb();
		 mdv.style.backgroundColor="rgba("+colors.r+", "+colors.g+", "+colors.b+", 0.1)";
		 mdv.style.overflow = 'auto';
		 mdv.innerHTML  += "<div class='row' style='padding:5px; border:none;'>"
		 					+ " <div class=\"col-lg-12\" style=\"padding:20px;\">"
                				+"<strong>Mark This Vehicle as</strong><br/>";
				 mdv.innerHTML  +="<SELECT id=\"mvahicle_invalid\" class=\"hoverefct1\" value=\""+marked_by_owner+"\" data-oldvalue='"+marked_by_owner+"' data-toggle=\"tooltip\" title=\"Mark this vehicle valid or invalid\" style=\"width:99%; max-width:350px; height:38px; border:solid thin rgba(0,0,102,.3); margin:5px;\" onBlur=\"setValue_or_innerHTML_asDataset(this);\" ><option value='0'> &times; &nbsp;INVALID.</option><option value='1'> &radic; &nbsp;VALID.</option></SELECT><p id=\"mvahicle_invalide\" class=\"errp_c\"></p></div>";	
				  
				if(IS_ACTIVE=='0'){	
                 mdv.innerHTML  +="<div class=\"col-lg-12\" style=\"padding:20px;\"><strong>Change Vehicle Number</strong><br/><input type=\"text\" id=\"mvahicle\" class=\"hoverefct1\" value=\""+VEHICLE_NUMBER.toUpperCase()+"\" data-oldvalue='"+VEHICLE_NUMBER.toUpperCase()+"' data-toggle=\"tooltip\" title=\"Change your valid vehicle Number\" placeholder=\"Vehicl Number\"  style=\"width:99%; max-width:350px; height:45px; border:solid thin rgba(0,0,102,.3); margin:5px;\" onBlur=\"setValue_or_innerHTML_asDataset(this);\" /><p id=\"mvahiclee\" class=\"errp_c\"></p></div>";
				}else{
					mdv.innerHTML  +="<div class=\"col-lg-12\" style=\"padding:20px;\"><strong>Your Vehicle Number</strong><br/><p id=\"mvahicle\" data-oldvalue='"+VEHICLE_NUMBER.toUpperCase()+"' style=\"width:99%; max-width:350px; height:45px; border:solid thin rgba(0,0,102,.3); margin:5px; font-weight:900; padding:7px; font-size:18px; cursor:not-allowed;\" onBlur=\"setValue_or_innerHTML_asDataset(this);\">"+VEHICLE_NUMBER.toUpperCase()+"</p></div>";
				}
				 
			 mdv.innerHTML  +=""
							+ " <div class=\"col-lg-12\" style=\"padding:20px;border-top:dotted thin rgba(224,224,224,1);\">"
                				+"<strong>is this vehicle has valid Insurance</strong><br/>"
                				+"<input type=\"radio\" id=\"mvalid_insurence\" name=\"mvalid_insurence\" class=\"hoverefct1\" " 
									+"data-toggle=\"tooltip\" title=\"Your vehicle has valid insurence as on date\"  "
									+"style=\"width:99%; max-width:30px; height:30px; border:solid thin rgba(0,0,102,.3); margin:5px;\"" 
									+"value=\""+IS_VALID_INSURENCE+"\" "
									+"onClick=\"var x1=document.getElementById('mvalid_insurence');if(x1){x1.dataset.fldval='YES';} var Ins = document.getElementById('mIns_dv');" 
										+" if(Ins){Ins.style.display='';}\" data-fldval='"+IS_VALID_INSURENCE+"' data-oldvalue='"+IS_VALID_INSURENCE+"' checked /> " 
									+"<strong style=\" font-weight:900; font-size:16px;\"> Yes </strong>" 
                					+"<span style=\"width:70px;\">&nbsp;&nbsp;</span>"
                					+"<input type=\"radio\" id=\"mvalid_insurence_no\" name=\"mvalid_insurence\" class=\"hoverefct1\" data-toggle=\"tooltip\" " 
									+"title=\"Your vehicle does not have a valid insurence as on date\" " 
									+"style=\"width:99%; max-width:30px; height:30px; border:solid thin rgba(0,0,102,.3); margin:5px;\""
									+" value=\"NO\""
									+" onClick=\"var x2=document.getElementById('mvalid_insurence');if(x2){x2.dataset.fldval='NO';}"
										+"var Ins = document.getElementById('mIns_dv'); if(Ins){Ins.value=''; Ins.style.display='none';}\" /> "
								+"<strong style=\"font-weight:900; font-size:16px;\"> No </strong><p id=\"mvalid_insurencee\" class=\"errp_c\"></p>"
            				+"</div>"
							
							+ " <div class=\"col-lg-12\" style=\"padding:20px; border-top:dotted thin rgba(224,224,224,1);display:;\" id=\"mIns_dv\" >"
                				+"<strong>Modify Vehicle Insurance Number</strong><br/>"
                				+"<input type=\"text\" id=\"minsurencenumber\" class=\"hoverefct1\" value=\""+INSURENCE_NUMBER+"\""
									+" data-toggle=\"tooltip\" title=\"Enter your valid vehicle Insurence Number\" placeholder=\"Insurence Number...\""
									+"  style=\"width:99%; max-width:350px; height:45px; border:solid thin rgba(0,0,102,.3); margin:5px;\""
									+" onBlur=\"setValue_or_innerHTML_asDataset(this)\" data-oldvalue='"+INSURENCE_NUMBER+"' />"
								+"<p id=\"minsurencenumber\" class=\"errp_c\"></p>"
            				+"</div>"
							
							+ " <div class=\"col-lg-12\" style=\"padding:20px; border-top:dotted thin rgba(224,224,224,1);\"  >"
                				+"<strong>Modify Vehicle Type</strong><br/>"
                				+"<select id=\"mvtype\" class=\"hoverefct1\" style=\"width:99%; max-width:350px; height:45px; border:solid thin rgba(0,0,102,.3); margin:5px; \""
									+" onKeyPress=\"var d=document.getElementById(this.id+'e');if(d){d.style.display='none';}\""
									+" onBlur=\"setValue_or_innerHTML_asDataset(this)\" data-oldvalue='"+VEHICLE_TYPE+"' >" 
                    					+"<option value=\"DumperTipper\">Dumper / Tipper</option>"
                    					+"<option value=\"Truck6\" >Truck 6 wheel </option>"
                    					+"<option value=\"Truck10\" >Truck 10 wheel </option>"
                    					+"<option value=\"Trailor\" selected >Trailor </option>"
                				+"</select>"
								+"<p id=\"mvtypee\" class=\"errp_c\" style=\"display:none\">Enter Correct vahicle Type</p>"
            				+"</div>"
							
							+ " <div class=\"col-lg-12\" style=\"padding:20px; border-top:dotted thin rgba(224,224,224,1);display:;\"  >"
                				+" <strong>Modify Vehicle Tare Weight (in Tonne)</strong><br/>"
                				+"<input type=\"text\" id=\"mvtareweight\" class=\"hoverefct1\" value=\""+TARE_WEIGHT+"\" data-oldvalue='"+TARE_WEIGHT+"' data-toggle=\"tooltip\" title=\"Enter your vehicle Tare Weight\""
									+" placeholder=\"Enter Tare Weight ...\"  style=\"width:99%; max-width:350px; height:45px; border:solid thin rgba(0,0,102,.3); margin:5px;\""
									+" onBlur=\"setValue_or_innerHTML_asDataset(this);\" />"
                       			+"<p id=\"pvtareweighte\" class=\"errp_c\"></p>"
            				+"</div>"
							
							+ " <div class=\"col-lg-12\" style=\"padding:20px; border-top:dotted thin rgba(224,224,224,1);display:;\"  >"
                				+" <strong>Select PDF file of supporting Docs.</strong>&nbsp;<span id=\"mhelpdocs\" onClick=\"var xz = document.getElementById('mdocshelptext');if(xz){xz.style.display=''; if(typeof scrollUptoDv=='function'){scrollUptoDv('docshelptext');}}\" " 
								+"style=\"color:rgba(0,0,0,1); background-color:rgba(255,255,0,1); border:solid thin rgba(24,24,24,1); border-radius:100%; cursor:pointer; padding:5px;\">&nbsp;?&nbsp;</span><br/>"
                				+"<input type=\"file\" id=\"mvfiledocs\" class=\"hoverefct1\" value=\""+pdf_file+"\" data-oldvalue='"+pdf_file+"' data-toggle=\"tooltip\" title=\"Select PDF file\""
									+" style=\"width:99%; max-width:250px; height:25px; border:none; margin:5px;\""
									+" onBlur=\"setValue_or_innerHTML_asDataset(this)\" accept=\"application/pdf\" "
									+" onChange=\"if(document.getElementById('mvfiledocse')){document.getElementById('mvfiledocse').style.display='none';}this.dataset.ismodified = true;\" />"
                       			+"<p id=\"mdocshelptext\" style=\"display:none; padding:10px; background:#FFFF00; border:solid thin rgba(150,150,150,1);\">"
									+"Select single pdf file of following documents.<br/>"
									+"<strong>Vehicle Number & RTO Docs</strong><br/>"
                					+"<strong >Vehicle insurence details</strong><br/><br/> "
                    				+"<strong style='color:#C100C1;'>NOTE: Your vehicle will be verified based on these supporting documents only, therefore please include all relevant papers in one pdf.</strong><br/> <br/><br/>"
                    				+"<strong style=\"cursor:pointer;\" onClick=\" var yz=document.getElementById('mdocshelptext');if(yz){yz.style.display='none';}\">Close</strong><br/>"
                				+"</p>"
								+"<p id=\"mvfiledocse\" class=\"errp_c\"></p>"
								+"<div style='background-color:rgba(35,35,35,0.5); border:solid thin #003003;padding:1px; border:solid thin rgba(35,35,35,0.5);'><style> .pdf {width: 100%; aspect-ratio: 4 / 3;} </style>"
									+"<p  style='background: linear-gradient(to left, #ffff66 0%, #ccffff 100%); color:rgba(0,0,0,0.9); padding:10px; height:45px; font-weight:900; font-size:18px; border-bottom:solid thin rgba(237, 245, 2,1);'>Already Uploaded Documents.&nbsp;<span style='cursor:pointer; color:#F03F03;' onclick=\"var pdfobj = document.getElementById('pdfobj'); if(pdfobj){if(pdfobj.style.display=='none'){pdfobj.style.display='';}else{pdfobj.style.display='none';}}\">&nbsp; &rsaquo; See Here</span> </p><object id='pdfobj' class=\"pdf\" data=\"vehicle_docs/"+pdf_file+"\" width=\"800\" height=\"500\" style=\"display:none;\">"
									+"</object></div>"
            				+"</div>"
							
							+ " <div class=\"col-lg-12\" style=\"padding:20px; border-top:dotted thin rgba(224,224,224,1);\"  >"
                				+"<button class=\"button2\"  id=\"ModifyVehicleBtn\" style=\"vertical-align:middle;background:#6600FF; color:#FFFFFF; width:95%; max-width:350px;\" "
									+" data-toggle=\"tooltip\" data-loaderImgUrl='14.gif' data-btnText=\"<span id='mspntx'> Modify Vehicle</span>\" "
									+" title=\"Click To Register | रजिस्टर करने के लिए क्लिक करें। \"><span id=\"mspntx\"> Modify Vehicle</span></button><br/>"
									+"<span style=\"font-size:11px; color:#999999; padding:7px;\">By clicking above button you're agreed our "
										+"<a href=\"app/termsofuse.php?c=SECL\" target=\"_blank\">terms</a> of use.</span>"
            				+"</div>"
							
							+ "<div class=\"col-lg-12\"  style=\"padding:20px; border-top:dotted thin rgba(224,224,224,1); display:none;\" id=\"vehiclemodifydv\" data-sbtn='ModifyVehicleBtn'>"
							+ "</div>"
							+ ""
						+ "</div>"
						; 
		 var ORG_VEHICLE_NUM = (typeof vehicle_data["VEHICLE_NUMBER"] !='undefined')?vehicle_data["VEHICLE_NUMBER"]:"";				
		 modify_fldform.set(btoa("porgnl_vn"), btoa(ORG_VEHICLE_NUM));
		 modify_fldform.set(btoa("pvahicle"), btoa(VEHICLE_NUMBER));
		 modify_fldform.set(btoa("pvalid_insurence"), btoa(IS_VALID_INSURENCE));
		 modify_fldform.set(btoa("pinsurencenumber"), btoa(INSURENCE_NUMBER));
		 modify_fldform.set(btoa("pvtype"), btoa(VEHICLE_TYPE));
		 modify_fldform.set(btoa("pvtareweight"), btoa(TARE_WEIGHT));
		 modify_fldform.set(btoa("pvvalid"), btoa(marked_by_owner));
		 modify_fldform.set(btoa("pdffile"), null);
		 
		 
		 var mvahicle_invalid = document.getElementById('mvahicle_invalid');
		 var mvahicle = document.getElementById('mvahicle');
		 var mvalid_insurence = document.getElementById('mvalid_insurence');	
		 var mvalid_insurence_no = document.getElementById('mvalid_insurence_no');
		 var minsurencenumber = document.getElementById('minsurencenumber'); 
		 var mvtype = document.getElementById('mvtype');
		 var mvtareweight = document.getElementById('mvtareweight');
		 var mvfiledocs =  document.getElementById('mvfiledocs');
		 var _pdf = null;
		 if(typeof mvfiledocs!="undefined" && mvfiledocs!=null){
			mvfiledocs.addEventListener("change", function(){
				_pdf = isThisPdfFile_retSize(this.id) ; /*it will return: {'isPDF':'1','size':size,'size-in':'MB','fobj':pdf_.files[0]};*/
				if(typeof _pdf!="undefined" && (_pdf["isPDF"]=='-1' || _pdf["size"]>3.5 || _pdf["size"]<1.5) ){
					alert("Please Select correct pdf file (*.pdf).\n\n1.5 MB <= file Size < 3.5 MB");
					mvfiledocs.value='';
					mvfiledocs.focus();
				}
				if(typeof _pdf!="undefined" && _pdf["fobj"]!=null){modify_fldform.set(btoa("pdffile"), _pdf["fobj"]); }
			},false);
		 }
		 if(typeof mvahicle_invalid !="undefined" && mvahicle_invalid!=null){ 
			mvahicle_invalid.value = marked_by_owner; 
			mvahicle_invalid.addEventListener("change", function(){
				modify_fldform.set(btoa("pvvalid"), btoa(this.value)); 
			}, false);
		 }
		 if(typeof mvahicle !="undefined" && mvahicle!=null){
			mvahicle.addEventListener("blur", function(){
				modify_fldform.set(btoa("pvahicle"), btoa(this.value));
				modify_fldform.set(btoa("porgnl_vn"), btoa(this.dataset.oldvalue)); 
			}, false);
		 }
		 if(typeof mvalid_insurence !="undefined" && mvalid_insurence!=null){
			mvalid_insurence.addEventListener("change", function(){
				modify_fldform.set(btoa("pvalid_insurence"), btoa(this.dataset.fldval)); 
			}, false);
		 }
		 if(typeof mvalid_insurence_no !="undefined" && mvalid_insurence_no!=null){
			mvalid_insurence_no.addEventListener("change", function(){
				modify_fldform.set(btoa("pvalid_insurence"), btoa(mvalid_insurence.dataset.fldval)); 
			}, false);
		 } 
		 if(typeof minsurencenumber !="undefined" && minsurencenumber!=null){
			minsurencenumber.addEventListener("blur", function(){
				modify_fldform.set(btoa("pinsurencenumber"), btoa(this.value)); 
			}, false);
		 }
		 if(typeof mvtype !="undefined" && mvtype!=null){ 
			mvtype.value = VEHICLE_TYPE;
			mvtype.addEventListener("blur", function(){
				modify_fldform.set(btoa("pvtype"), btoa(this.value)); 
			}, false);
		 }
		 if(typeof mvtareweight !="undefined" && mvtareweight!=null){
			mvtareweight.addEventListener("blur", function(){
				modify_fldform.set(btoa("pvtareweight"), btoa(this.value)); 
			}, false);
		 }
		if(document.getElementById('ModifyVehicleBtn')){
			document.getElementById('ModifyVehicleBtn').addEventListener("click", function(){
				var _c = confirm('Do you really want to update the vehicle details for\nVehicl_Number: '+VEHICLE_NUMBER);
				if(_c){  
					if(_pdf!=null && typeof _pdf["isPDF"]!="undefined" && _pdf["isPDF"]=='-1'){
						mvfiledocs.click();	
					}
					modifyVehicle(modify_fldform);
				}
			},false);
		}
		  
		
	 }/*if(mdv..*/
 }
 function WaitDataLoading(div, content, display){
	if(div){
		content = (typeof content == "undefined" || content=="" || content==null)?"Please Wait, Data is Loading...<img src='3kb.gif' draggable='false' />":content;
		div.style.display = (typeof display!="undefined" && display!=null && display=='1')?'':'none';
		var r = Math.floor(Math.random()*79 + 17) % 54;
		var g = Math.floor(Math.random()*379 + r) % 254;
		var b = Math.floor(Math.random()*307 + g) % 54;
		div.style.backgroundColor="rgba("+r+","+g+","+b+",0.3)";
		div.innerHTML = content;	
	}
}
var tmr = null;
var last_opened_div = document.getElementById("QWRkVmVoaWNsZQ==");
function loadMenuData(btnval, btn){
    if(document.getElementById('containerx')){document.getElementById('containerx').className='container';}
	if(btnval=="HOME"){document.location.href='../';}
	if(tmr){ clearTimeout(tmr);}
	if(btn){
		var rDiv = (typeof btn.dataset.rdiv !='undefined')?document.getElementById(btn.dataset.rdiv):null;
		var Ldiv = (typeof btn.dataset.ldiv !='undefined')?document.getElementById(btn.dataset.ldiv):null;
		if(typeof Ldiv!="undefined" && Ldiv!=null){WaitDataLoading(Ldiv, null, display='1');}
		if(typeof rDiv!="undefined" && rDiv!=null){
				rDiv.style.display='';
				if(last_opened_div!=null){last_opened_div.style.display='none';}
				tmr = setTimeout(function(){
						var formDv = document.getElementById(btnval);
						last_opened_div = formDv; 
						var url = new URL(window.location.href);
						url.searchParams.set("lm", btnval); 
                        window.history.pushState(null, '', url.toString());
						if(formDv){formDv.style.display='';} 
						if(btnval == "QWRkVmVoaWNsZQ=="){ /*addvehicle*/
							var oprtn = "onkeypress_function";	
							var flds = ["pvahicle"];
							/*addKeyPressEvent*/
							var evnt = "keyPress";
							for(var i=0;i<flds.length;i++){
								var fld = document.getElementById(flds[i]);
								if(fld){
									fld.addEventListener("keypress", function(event){
										var eky = checkEnterKey(event); 
										if(eky == true ){
											if(document.getElementById('AddVehicleBtn')){
												document.getElementById('AddVehicleBtn').click();}} 
												var d=document.getElementById(this.id+'e');
												if(d){d.style.display='none';}
										}, false);
								} 
							}
							var submitBtn = document.getElementById("AddVehicleBtn");
							if(submitBtn){
								submitBtn.addEventListener("click", function(){ 
									if(typeof Ldiv!="undefined" && Ldiv!=null){WaitDataLoading(Ldiv, "Please Wait, System is Validating Your Data...<img src='3kb.gif' draggable='false' />", display='1');} 
									var SpcialValidations_cond = {};
									var param1_cond1 = (typeof document.getElementById('pvahicle').dataset.fldval!="undefined" && document.getElementById('pvahicle').dataset.fldval!="")?atob(document.getElementById('pvahicle').dataset.fldval):""; 
									SpcialValidations_cond["pvahicle"] = {'func_name':'ValidateVehicleNumber','func_parm':['pvahicle'],'func_returnval':'1'}
									
									SpcialValidations_cond["pinsurencenumber"] = {'func_name':'ValidateInsurence','func_parm':['pinsurencenumber','pvalid_insurence'],'func_returnval':'1'}
									
									var formdata_r = checkvalues_returnForm(button = submitBtn, fieldsList=["pvahicle","pvalid_insurence", "pinsurencenumber", "pvtype","pvtareweight"], SpcialValidations=SpcialValidations_cond);
									
									if(formdata_r == null ){
										if(typeof Ldiv!="undefined" && Ldiv!=null){WaitDataLoading(Ldiv, "...", display='none');}
									}else{
										var final_formdata = add_PDFfile_toformdata(formdata_r, 'pvfiledocs', submitBtn);
									   	if(final_formdata!=null){ 
											submitBtn.dataset.ldiv = Ldiv.id;
											registerNewVehicle(formdata_r);
											if(typeof scrollUptoDv=='function'){scrollUptoDv(Ldiv.id);}
										}
										else{
											if(typeof Ldiv!="undefined" && Ldiv!=null){WaitDataLoading(Ldiv, "...", display='none');}	
										}
									}
								}, false);	
							}/*if(submitBtn...*/
						}/*if(btnval == "QWRkVmVoaWNsZQ==")...*/
						else if(btnval == "TW9kaWZ5VmVoaWNsZQ=="){ /*modifyvehicle*/
							if(typeof Ldiv!="undefined" && Ldiv!=null){WaitDataLoading(Ldiv, "...", display='');}	
							if(document.getElementById('pmvehicle_number')){
								document.getElementById('pmvehicle_number').dataset.ldiv = Ldiv.id;
								loadRegisteredVehicles(formDv,selectbtn = 'pmvehicle_number');
								document.getElementById('pmvehicle_number').addEventListener("change",
								 function(e){
									 	var mdv = document.getElementById('vmodifydv');
								 		if(this.value=='-1' || this.value==''){
											var __e = document.getElementById(this.id+"e");	
											if( __e){
												 __e.style.display='';	
												 mdv.style.display='none';
												 mdv.innerHTML='';
											}
										}else{ /*HereLoad The Vehicle Details*/ 
											
											if(mdv){
												mdv.style.display='';
												mdv.innerHTML='';
												var cdata_array = typeof(this.dataset.srtval)?JSON.parse(this.dataset.srtval):null;		
												var vehicle_data = null;
												if(cdata_array!=null && typeof cdata_array[atob(this.value)]!="undefined"){
													vehicle_data = cdata_array[atob(this.value)];
													if(typeof vehicle_data!='undefined' && vehicle_data!=null){
														renderModifyDataScreen(vehicle_data, mdv);
													}
												}																			
											}
										}
								 }, false);
							}else{
								alert('Error occurred while loading modify vehicles.\nRefresh this page and try again later.');	return false;
							}
							
						}/*if(btnval == "TW9kaWZ5VmVoaWNsZQ==")...*/
						else if(btnval == "VXBsb2FkX0RPX0RhdGE="){ /*upload csv*/
							if(typeof Ldiv!="undefined" && Ldiv!=null){WaitDataLoading(Ldiv, "...", display='');}	
							var _aBTN = document.getElementById('UploadDOBtn');
							if(_aBTN){
								_aBTN.dataset.ldiv = Ldiv.id;
								_aBTN.addEventListener("click", function(event){ 
									var filefld = document.getElementById('pdodetails');
									if(filefld && filefld!=null){
										var CSV_ = isThisCSVFile_retSize(filefld.id);
										if(typeof CSV_ == 'undefined' || Object.keys(CSV_).length <= 0 || CSV_["iscsv"]=="-1" || CSV_["size"]>3)	{
											filefld.focus(); alert("select a correct csv file of max. length upto 3.0 MB.");	return false;
										}
										var formData_ = new FormData();
										formData_.set(btoa("csvfile"), CSV_["fobj"]); 
                                        var filex = CSV_["fobj"]; 
                                        if (filex) {
                                            Papa.parse(filex, {
                                                header: true,
                                                complete: function(results) {
                                                    var data_str = JSON.stringify(results.data, null, 2);
                                                    console.log(data_str, results.data);
                                                },
                                                error: function(error) {
                                                    console.error('Error parsing CSV:', error);
                                                }
                                            });
                                        } 
										uploadCSV_DO_DETAILS(formData_);
									}
								},false);  
							}else{
								alert('Error occurred while loading upload csv.\nRefresh this page and try again later.');	return false;
							}
							
						}/*if(btnval == "VXBsb2FkX0RPX0RhdGE=")...*/
						else if(btnval == "QXBwcm92ZVZlaGljbGU="){ /*approve new vehicles*/
						    if(document.getElementById('containerx')){document.getElementById('containerx').classList.remove('container');document.getElementById('containerx').classList.add('container-fluid');}
							if(typeof Ldiv!="undefined" && Ldiv!=null){WaitDataLoading(Ldiv, "...", display='');}	
							var _aBTN = document.getElementById('fetchvehicles');
							if(_aBTN){
								_aBTN.dataset.ldiv = Ldiv.id;
								_aBTN.addEventListener("click", function(event){ 
								    var formdt = new FormData();
								    formdt.set(btoa(unescape(encodeURIComponent('sb'))),btoa(unescape(encodeURIComponent('fetchNewVehicle'))));
			                        var url="fetch_vehicles_to_be_approved.php";  
									sendOnServerData(url,formdt,"tobeapproveddv",isOperationSuccessful);
								},false);  
							}else{
								alert('Error occurred while loading vehicles to be approved \nRefresh this page and try again later.');	return false;
							}
							
						}/*if(btnval == "QXBwcm92ZVZlaGljbGU=")...*/
						else if(btnval == "QXBwcm92ZVVzZXI="){ /*approve new user*/
						    if(document.getElementById('containerx')){document.getElementById('containerx').classList.remove('container');document.getElementById('containerx').classList.add('container-fluid');}
							if(typeof Ldiv!="undefined" && Ldiv!=null){WaitDataLoading(Ldiv, "...", display='');}	
							var _aBTN = document.getElementById('fetchaccounts');
							if(_aBTN){
								_aBTN.dataset.ldiv = Ldiv.id;
								_aBTN.addEventListener("click", function(event){ 
								    var formdt = new FormData();
								    formdt.set(btoa(unescape(encodeURIComponent('sb'))),btoa(unescape(encodeURIComponent('fetchNewAccounts'))));
			                        var url="fetch_accounts_to_be_approved.php";  
									sendOnServerData(url,formdt,"Accountstobeapproveddv",isOperationSuccessful);
								},false);  
							}else{
								alert('Error occurred while loading Accounts to be approved \nRefresh this page and try again later.');	return false;
							}
							
						}/*if(btnval == "QXBwcm92ZVVzZXI=")...*/
						else if(btnval == "QXBwcm92ZURv"){ /*approve new DO Number*/
						    if(document.getElementById('containerx')){document.getElementById('containerx').classList.remove('container');document.getElementById('containerx').classList.add('container-fluid');}
							if(typeof Ldiv!="undefined" && Ldiv!=null){WaitDataLoading(Ldiv, "...", display='');}	
							var _aBTN = document.getElementById('fetchaDos');
							if(_aBTN){
								_aBTN.dataset.ldiv = Ldiv.id;
								_aBTN.addEventListener("click", function(event){ 
								    var formdt = new FormData();
								    formdt.set(btoa(unescape(encodeURIComponent('sb'))),btoa(unescape(encodeURIComponent('fetchNewDos'))));
			                        var url="fetch_do_details_to_approval.php";  
									sendOnServerData(url,formdt,"doapproveddv",isOperationSuccessful);
								},false);  
							}else{
								alert('Error occurred while loading Accounts to be approved \nRefresh this page and try again later.');	return false;
							}
							
						}/*if(btnval == "QXBwcm92ZURv")...*/ 
						else if(btnval == "RE9QQVJUWVJlcG9ydHM=" || btnval == "RU1QTE9ZRUVSZXBvcnRz"){ /*doparty / employees reports menu btn*/
						    if(document.getElementById('containerx')){document.getElementById('containerx').classList.remove('container');document.getElementById('containerx').classList.add('container-fluid');}
							if(typeof Ldiv!="undefined" && Ldiv!=null){WaitDataLoading(Ldiv, "...", display='');}	
							/*
							 ... coding will be done here 
							*/
							
						}/*if(btnval == "QXBwcm92ZURv")...*/ 
						else if(btnval == "QWRkX2FyZWFfbWluZXM="){ /*Add new Area Mines */
						    if(document.getElementById('containerx')){document.getElementById('containerx').classList.remove('container');document.getElementById('containerx').classList.add('container-fluid');}
							if(typeof Ldiv!="undefined" && Ldiv!=null){WaitDataLoading(Ldiv, "...", display='');}
							
							/*fetch Area Names Against dropdown of company selection*/
							var _acompanyBTN = document.getElementById('pacompany'); 
							if(_acompanyBTN){
							    var otherDependantDivs = ['areadv','minesnamedv','minescodedv'];
							    _acompanyBTN.addEventListener("change", function(event){ 
							        if(document.getElementById(this.id+"e")){
							                document.getElementById(this.id+"e").style.display='none';
							            }
							        if(this.value =='-1' || this.value==''){
							            this.focus();
							            if(document.getElementById(this.id+"e")){
							                document.getElementById(this.id+"e").style.display='';
							            }
							            otherDependantDivs.forEach(function(val, k, arr){
    							            if(document.getElementById(val)){
    							                document.getElementById(val).style.display='none';
    							            }
							            });
							            return false;
							        }
							        otherDependantDivs.forEach(function(val, k, arr){
							            if(document.getElementById(val)){
							                document.getElementById(val).style.display='';
							            }
							        });
							        
							        /*Fetch-Already-Existing Area Names.*/
							        var formdtx = new FormData();
								    formdtx.set(btoa(unescape(encodeURIComponent('sb'))),btoa(unescape(encodeURIComponent('FetchArea_details'))));
								    formdtx.set(btoa(unescape(encodeURIComponent('companycd'))),btoa(unescape(encodeURIComponent(atob(this.value)))));
			                        var url="register_new_area_mines.php";  
									sendOnServerData(url,formdtx,"paareaname",isOperationSuccessful);
							        
							    }, false);
							}
							/*Here We will save the new unit/mines*/
							var _aBTN = document.getElementById('saveArea_details');  
							if(_aBTN){
								_aBTN.dataset.ldiv = Ldiv.id;
								_aBTN.addEventListener("click", function(event){  
								    var formdt = new FormData();
								    formdt.set(btoa(unescape(encodeURIComponent('sb'))),btoa(unescape(encodeURIComponent('registernewMines_details'))));
								    if(document.getElementById('paminesname')){document.getElementById('paminesname').dataset.convertbs64='1';}
								    if(document.getElementById('paminesname')){document.getElementById('paminesname_sapcode').dataset.convertbs64='1';}
								    var _rJsonx = checkArea_mines_entry_details_returnJson(flds = ['pacompany','paareaname','paminesname','paminesname_sapcode']);  
								    if(_rJsonx==null || _rJsonx[0]==null){return false;}
								    formdt.set(btoa(unescape(encodeURIComponent('data'))),btoa(unescape(encodeURIComponent(_rJsonx[1]))));
			                        var url="register_new_area_mines.php";  
			                        var resultDvId = "save_areaDetailsdv";
			                        if(document.getElementById(resultDvId)){
                                       document.getElementById(resultDvId).dataset.isreloadpage='1';
                                       document.getElementById(resultDvId).dataset.triggerafter_miliseconds='500';
                                    }
									sendOnServerData(url,formdt,resultDvId,isOperationSuccessful);
								},false);  
							}else{
								alert('Error occurred while loading Accounts to be approved \nRefresh this page and try again later.');	return false;
							}
							
						}/*if(btnval == "QWRkX2FyZWFfbWluZXM=")...*/ 
						else if(btnval == "QWxsb2NhdGVWZWhpY2xl"){ /*map do with vehicles*/
						    if(document.getElementById('containerx')){document.getElementById('containerx').classList.remove('container');document.getElementById('containerx').classList.add('container-fluid');}
							if(typeof Ldiv!="undefined" && Ldiv!=null){WaitDataLoading(Ldiv, "...", display='');}	
							if(document.getElementById('pdo_number')){
								document.getElementById('pdo_number').dataset.ldiv = Ldiv.id;
								loadRegisteredDos(formDv,selectbtn = 'pdo_number');
								loadExistingMappings(formDv,selectbtn = 'mpdo_number');
								document.getElementById('pdo_number').addEventListener("change",
								 function(e){
									 	var mdv = document.getElementById('vdomapdv');
								 		if(this.value=='-1' || this.value==''){
											var __e = document.getElementById(this.id+"e");	
											if( __e){
												 __e.style.display='';	
												 mdv.style.display='none';
												 mdv.innerHTML='';
											}
										}else{ /*HereLoad The Vehicle Details*/ 
											
											if(mdv){
												mdv.style.display='';
												mdv.innerHTML='';
												var cdata_array = typeof(this.dataset.srtval)?JSON.parse(this.dataset.srtval):null;		
												var vehicle_data = null;
												if(cdata_array!=null && typeof cdata_array[atob(this.value)]!="undefined"){
													vehicle_data = cdata_array[atob(this.value)];
													if(typeof vehicle_data!='undefined' && vehicle_data!=null){
														renderMappingDataScreen(vehicle_data, mdv);
													}
												}																			
											}
										}
								 }, false);
								 /*EDIT/Delete Mapped_data*/
								 document.getElementById('mpdo_number').addEventListener("change",
								 function(e){
									 	var mdv = document.getElementById('vdomapdv');
								 		if(this.value=='-1' || this.value==''){
											var __e = document.getElementById(this.id+"e");	
											if( __e){
												 __e.style.display='';	
												 mdv.style.display='none';
												 mdv.innerHTML='';
											}
										}else{ /*HereLoad The Vehicle Details*/ 
											if(mdv){
												mdv.style.display='';
												mdv.innerHTML='';
												var mdata_array = typeof(this.dataset.srtval)?JSON.parse(this.dataset.srtval):null;		
												var Mapped_data = null;
												if(mdata_array!=null && typeof mdata_array[atob(this.value)]!="undefined"){
													Mapped_data = mdata_array[atob(this.value)];
													if(typeof Mapped_data!='undefined' && Mapped_data!=null){
														renderMappingEditScreen(Mapped_data, mdv);
													}
												}																			
											}
										}
								 }, false); 
							}else{
								alert('Error occurred while loading Map DO vehicles.\nRefresh this page and try again later.');	return false;
							}
							
						}/*if(btnval == "QWxsb2NhdGVWZWhpY2xl")...*/
						
						
						
						
						if(tmr){ clearTimeout(tmr);}
						WaitDataLoading(Ldiv, null, display='0');
					},500); 
		}
	} 
}
 $(document).ready(function(){ $('[data-toggle="tooltip"]').tooltip();  
  if(document.getElementById('menus')){
	 var t=document.getElementById('menus');
	     t.addEventListener("mousedown", function(){if(typeof msdwn!="undefined"){msdwn(t);} }, false);
		 t.addEventListener("change", function(){if(typeof msup!="undefined"){msup(t);}loadMenuData(this.value, this);}, false);
		 //t.addEventListener("mouseup", function(){msup(t); }, false); 
  } 
  if(typeof loadAreaMines_data !="undefined"){
      var conditions = {'COMPANY':atob('SECL'),'AREA_SAP_PLANTCD':null,'MINES_SAP_PLANTCD':null}; /*any value null:-> means load all possible values.*/
      loadAreaMines_data(conditions);
  }
  if(typeof loadMenuData !="undefined"){
    var params = new URL(document.location.toString()).searchParams; 
    var load_this_menu = params.get("lm");
    var menu_id = "QWRkVmVoaWNsZQ==";
    if(typeof load_this_menu!="undefined" && load_this_menu!=null){
        menu_id = load_this_menu;
    }
	loadMenuData(menu_id, document.getElementById('menus')); 
  }
  
  
});  
 </script>
</body>
</html>