// JavaScript Document
var previous_div_index=-1;
function seeFullText(p,i){  /*p=parent div, i=index*/
 var d=document.getElementById('postid_'+i);
 if(d){
	 if(previous_div_index!=-1){document.getElementById(p+previous_div_index).style.backgroundColor='#F9F9F9';previous_div_index=i;}else previous_div_index=i;
	 document.getElementById(p+i).style.backgroundColor='rgba(255,255,0,.2)'; 
 }} 
function getXMLHTTP() {var xmlhttp=false;try{ xmlhttp=new XMLHttpRequest();} catch(e) { try{ xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");} catch(e){ try{ xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");} catch(e1){ xmlhttp=false;}}} 	return xmlhttp;} 
function increaseLike(){var Imgeid=parseInt(document.getElementById('imgid').value);  
	var likes=parseInt(document.getElementById('totlikes').value);
	var isliked=parseInt(document.getElementById('isliked').value);
	if(isliked==1){document.getElementById('isliked').value=0;
	      document.getElementById('totlikes').value=(likes-1);
		    document.getElementById('totlikesShow').innerHTML=" | "+(likes-1);
			document.getElementById('likebutton').style.backgroundColor='rgba(255,255,255,1)';
	}
	else{document.getElementById('isliked').value=1;
	     document.getElementById('totlikes').value=(likes+1);
		 document.getElementById('totlikesShow').innerHTML=" | "+(likes+1);		
		 document.getElementById('likebutton').style.backgroundColor='rgba(255,0,51,1)';
	}
	
	var pageU="increase_views_and_likes_hot_content.php?btnClicked=1&im="+Imgeid+"&spc=cil";
    var req = getXMLHTTP();if(req){req.onreadystatechange = function(){if (req.readyState == 4) { 
	 if (req.status == 200) { 
	}else{alert('your operation not completed..!!');}}} 
     req.open("get", pageU, true);
	 req.send(null);
	 }} 
var prevLikeid=''; prevliked='';
function call_like(btnid,Imgeid,islike){if(prevLikeid==Imgeid){islike=!prevliked; prevliked=islike; }
	else{prevliked=islike } prevLikeid=Imgeid;
	if(islike==1){text="Like +";color="#6600CC";}else{text="Liked &hearts;";color="green";}
	if(document.getElementById(btnid)){document.getElementById(btnid).style.color=color; document.getElementById(btnid).innerHTML=text;}
	
	var pageU="increase_views_and_likes_hot_content.php?btnClicked=1&im="+Imgeid+"&spc=cil";
    var req = getXMLHTTP();if(req){req.onreadystatechange = function(){if (req.readyState == 4) { 
	 if (req.status == 200) { 
	}else{alert('your operation not completed..!!');}}} 
     req.open("get", pageU, true);
	 req.send(null);
	 }}
function select_function(value,divid,index){/*this function is called from see_full_post.php*/
var postid='',thisIsOwner=0;var pageU=''; if(document.getElementById('imgid'+index)){postid=document.getElementById('imgid'+index).value;}
	if(value==2){ var d=confirm("This will be deleted from Your Profile");
	if(d==false){return ;}
		 if(document.getElementById(divid)){document.getElementById(divid).style.display='none';} 
		if(document.getElementById('owner')){thisIsOwner=document.getElementById('owner').value;}
		 pageU ="hide_show_post.php?im="+postid+"&sc=0&up="+thisIsOwner;
	   multiOpt(divid,pageU,value);
	}
	else if(value==1){
		  pageU ="starPost.php?im="+postid;
	   multiOpt(divid,pageU,value);
	}else if(value==3){
		alert("we are working on it. coming soon.");
	}
}
function multiOpt(divid,pageU,v){ /*this function is used for hiding or showing of post*/
    var req = getXMLHTTP();if(req){req.onreadystatechange = function(){if (req.readyState == 4) { 
	 if (req.status == 200) {  if(document.getElementById('hide_result_container')){document.getElementById('hide_result_container').style.display='';var txt='';if(v==1){txt='THis Post Is Sucessfully Added To Your Star List.'}else if(v==2)txt='This Post Is sucessfully Hided From Your Profile'+req.responseText; 
	 document.getElementById('hide_result').innerHTML="<strong style='color:yellow;'>&nbsp;&radic;&nbsp;&nbsp;&nbsp;</strong>"+txt;
	 } 
	}else{alert('your operation not completed..!!\n');}}} 
     req.open("get", pageU, true);
	 req.send(null);
	 }	
}
var orig_dv_data="";
var Dv_isOpn=0;
function openPostOption(opdv){if(Dv_isOpn==1)return;
	Dv_isOpn=1;
	orig_dv_data=document.getElementById(opdv).innerHTML;
	if(document.getElementById(opdv)){
	   document.getElementById(opdv).innerHTML=document.getElementById('upload_option').innerHTML;	
	}
	if(document.getElementById('more_load_dv')){
	   document.getElementById('more_load_dv').style.display='none';	
	}}
function openTextPost(opdv){ 
	if(isItGroupAndUJoined['isgroup']==1 && isItGroupAndUJoined['isjoined']!=1){alert('\nJoin This Group To Post Here.');return 0;}
	if(document.getElementById(opdv)){
	   document.getElementById(opdv).innerHTML=document.getElementById('upload_Text').innerHTML;	
	}	}
function close_upldOption(opdv){ Dv_isOpn=0;
if(document.getElementById(opdv))document.getElementById(opdv).innerHTML=orig_dv_data;	
if(document.getElementById('more_load_dv')){
	   document.getElementById('more_load_dv').style.display='none';	
	}}
var post_yes=0;
function inset_post(value){if(document.getElementById('result_dv')){
	  document.getElementById('result').innerHTML="Wait...Posting";
	 }  
	 var blng='SIMPLEPOST';if(document.getElementById('blng2')){blng=document.getElementById('blng2').value;}
	 var PostInDomain_=""; if(document.getElementById('PostInDomain')){PostInDomain_=document.getElementById('PostInDomain').value;}
	 var domainid=''; if(document.getElementById('domainID')){domainid=document.getElementById('domainID').value;}
	 var scope1=1; if(document.getElementById('scope1')){scope1=document.getElementById('scope1').value;}
	 var formData=new FormData();
	 formData.append("p",value);
	 formData.append("blng2",PostInDomain_+'_'+blng);
	 formData.append("domainid",domainid);
	 formData.append("scope1",scope1);
	var pageU="inserPOst.php";
    var req = getXMLHTTP();if(req){req.onreadystatechange = function(){ if (req.readyState == 4) {  
	 if (req.status == 200) { post_yes=1;  
	 if(document.getElementById('result_dv')){
	  document.getElementById('result').innerHTML="Your Text Is Posted Sucessfull. &nbsp;&raquo;&nbsp;<a href='home.php'>See Here</a>";
	 }
	}else{ alert('your operation not completed..!!\n reason :- 1. Check Your network connection connection\n 2. You can type maximum 60,000 characters only.');}}} 
     req.open("POST", pageU, true);
	 req.send(formData);
	} /*Http function close.*/}
function  checkEnterKey_pressed2(e,textAreaId){var chkb=document.getElementById('enterKeycheck').value;
	 var value_=document.getElementById(textAreaId).value; 
	 value_=removeWT(value_);
	 document.getElementById(textAreaId).value=value_;
	 var vvss=value_; 	  
	 var characterCode; 
	 e = (e || window.event); 
	 characterCode = e.keyCode || e.which;
	 if (characterCode == 13)
	 { if(chkb==1 || chkb=='1')	
	   {  var value_=document.getElementById(textAreaId).value;  
		   if(isLogin__=='0' || isLogin__==0) {alert('Umm Hmm, you need to login first....'); return false;}else  { 
		    if(((vvss=='' || vvss==' ' ||  vvss=='  ' || vvss==' ') || (vvss=='\n' || vvss=='\n\n' ||  vvss=='\n\n\n' ||  vvss=='\n\n\n\n'  ||  vvss=='\n\n\n\n\n' ||  vvss=='\n\n\n\n\n\n')))
		    {
			   document.getElementById(textAreaId).value="";
			   document.getElementById(textAreaId).style.backgroundColor='rgba(255,0,0,.5)';
			   document.getElementById(textAreaId).focus(); 
			   return false;
		    } 
			document.getElementById(textAreaId).value="";
		    inset_post(value_);  
		   } 
	   }/*if chkb close*/
	  return true;
}else{return false;}}
var Dv_isOpn_login=0,orig_dv_data_login="";
function OpenLogin_Div(opdv){if(Dv_isOpn_login==1)return;
	Dv_isOpn_login=1;
	orig_dv_data_login=document.getElementById(opdv).innerHTML;
	if(document.getElementById(opdv)){
	   document.getElementById(opdv).innerHTML=document.getElementById('login_form_div').innerHTML;	
	}
	if(document.getElementById('more_load_dv')){
	   document.getElementById('more_load_dv').style.display='none';	
	}}
function hideError(iddd){if(document.getElementById(iddd).style.display==''){document.getElementById(iddd).style.display='none'; if(document.getElementById('loadingimg1'))document.getElementById('loadingimg1').style.display='none';if(document.getElementById('fsubmit_')){document.getElementById('fsubmit_').value="Signup";}}	}
function _s_k(urL_,divid_){var req = getXMLHTTP();if (req)  {req.onreadystatechange = function() {  if (req.readyState == 4) {     if (req.status == 200)    {  var rt=parseInt(req.responseText); isCIL=1; 
		   document.getElementById(divid_).style.display='';
		   if(rt=='-1' || rt==-1)
		   {
			   document.getElementById(divid_).innerHTML="<span style='color:red;'>&nbsp;'Error :</span> the user id is already exist in database. please try another one.&nbsp;<br/>&nbsp;";  
			   if(document.getElementById('fsubmit_')){
				   document.getElementById('fsubmit_').value="Signup";
			   }
		   }
		   else if(rt=='-2' || rt==-2){
			   document.getElementById(divid_).innerHTML="<span style='color:red;'>&nbsp;Error :</span> please enter correct user-id or passwords&nbsp;";
			   Timecounts=3;
			   IdToBeClosed=divid_; 
		   }
		   else {  
			    document.getElementById(divid_).innerHTML="<strong style='color:green;'>"+req.responseText+"</strong>";
				whereToredirect="home.php"; 
				Reload_flag=1; 
				Timecounts=3;
				IdToBeClosed=divid_; 
		       }
	      if(document.getElementById('loadingimg'))document.getElementById('loadingimg').style.display='none'; 
	      if(document.getElementById('loadingimg1'))document.getElementById('loadingimg1').style.display='none';
      } 
      else {
		   document.getElementById(divid_).innerHTML="there is an internal problem,Check You Internet Connection Or Refresh The page.<br/>&nbsp;"; 
		   Timecounts=3;
		   IdToBeClosed=divid_;  
		   if(document.getElementById('loadingimg'))document.getElementById('loadingimg').style.display='none';
		   if(document.getElementById('loadingimg1'))document.getElementById('loadingimg1').style.display='none'; 
		   if(document.getElementById('submit__')){document.getElementById('submit__').value="Login .";} 
		   if(document.getElementById('fsubmit_')){document.getElementById('fsubmit_').value="Signup";} 
	 } 
	 }} 
     req.open("get", urL_, true);req.send(null);}
 }
var yEntr="";var yEntr2="";
function sendonLoginPage(opt,resdv){  var url__=""; 
/*value of yEntr is setted from CheckvalidationFormEnteies()*/
	 if(opt=='2' || opt==2){
		 yEntr2=document.getElementById('userid__').value+'`';
		 yEntr2+=document.getElementById('pass__').value;
		 url__="loginOrsignup.php?v="+yEntr2+"&o=2"; }else{ url__="loginOrsignup.php?v="+yEntr+"&o=1"; }
		 if(document.getElementById('submit__')){document.getElementById('submit__').value='Wait...'; document.getElementById('submit__').style.fontWeight=900;document.getElementById('submit__').style.backgroundColor='blue';}
		 
	_s_k(url__,resdv);}
function CheckValidationFormEnteries(){yEntr2=''; var idArr=Array(); idArr[0]='fname_';idArr[1]='fmail_';idArr[2]='fseruid_';idArr[3]='fpass_';idArr[4]='fcaptcha_';
 if(document.getElementById('signupFormV')){
	 
	 for(id_=0;id_<5; id_++){
	 var _val_=document.getElementById(idArr[id_]).value;
	 _val_=removeWT(_val_);
	 if(_val_=='' || _val_==' ' || _val_=='  ' || _val_=='   ' || _val_=='#' || _val_=='@' || _val_=='!' || _val_=='%' || _val_=='^' || _val_=='&' || _val_=='*' || _val_=='{' || _val_=='}' || _val_=='[' || _val_==']' || _val_=='$' || _val_=='-' || _val_=='_' || _val_=='+' || _val_=='=' || _val_=='~' || _val_=='`' || _val_=='	'){  document.getElementById('err'+id_).style.display=''; document.getElementById(idArr[id_]).focus();
	 document.getElementById(idArr[id_]).value==''; return false;}
	 if(idArr[id_]=='fcaptcha_'){if(document.getElementById(idArr[id_]).value!=document.getElementById('currectCaptcha').value){document.getElementById(idArr[id_]).value='';document.getElementById(idArr[id_]).focus();document.getElementById('err'+id_).style.display='';return false;}}
	 document.getElementById(idArr[id_]).value=_val_;
	 if(id_==0)yEntr=_val_;
	 else {yEntr+='`'+_val_;}
  }
	 return true;
 }
 else{alert('we are confused . please refresh your tab.');}}
function swtich1(cc){var p;
  switch(cc){case 1: p="A";break;case 2: p="D";break;case 3: p="Y";break;case 4: p="Z";break;case 5: p="R";break;case 6: p="I";break;case 7: p="L";break;case 8: p="*";break;case 9: p="S";break;default :p="E";break;}return p;}function changeCaptcha(idd){if(document.getElementById('fcaptcha_')){document.getElementById('fcaptcha_').value='';}var n=10;var m=1;var value_="";var t1=Math.floor(Math.random( ) * n - m + 1) + m;var t2=Math.floor(Math.random( ) * n - m + 1) + m; if(t1>=3 && t1<=5)value_+="$"; else if(t1>5 && t1<=9)value_+="X";else value_+=t1;var cc=(t1+t2)%10; value_=value_+swtich1(cc);if(t2>=3 && t2<=5)value_+="#"; else if(t2>5 && t2<=9)value_+="Y";else value_+=t2;var cc=(t1-t2)%10; value_=value_+swtich1(Math.abs(cc));document.getElementById(idd).value=value_;document.getElementById('currectCaptcha').value=value_;}
function saveEditedData(frm,result){
if(document.getElementById('loader_image'))document.getElementById('loader_image').style.display='';
if(document.getElementById(result)){
document.getElementById(result).style.opacity='.2';	
}
if(document.getElementById('Ex_Non_Exe')){
if(document.getElementById('Other_then_Ex_Non_Exe')){
	document.getElementById('Other_then_Ex_Non_Exe').value=document.getElementById('Ex_Non_Exe').value;
}
}
var form=new FormData(); 
 for(i=0;i<frm.length;i++){
	 
	 var v=removeWT(frm[i].value);
	 if(v!='' && v!=' ' && v!='  ' && v!='   ' && v!='    ' && v!='.' && v!=' .' && v!='. ' && v!=' . ' && v!='  . ' && v!='.  ' && v!='   .' && v!='.  '){
  form.append(frm[i].id,v);
	 }else{
		 if(document.getElementById(frm[i].id)){
			 alert("this types of values are not allowed. enter correct values\nField-name : "+frm[i].id+" = "+v);
			 document.getElementById(frm[i].id).focus();
		 }
		 if(document.getElementById('loader_image'))document.getElementById('loader_image').style.display='none';
		 if(document.getElementById(result)){
          document.getElementById(result).style.opacity='1';	
         }
		return false;
	 }
 }
var pageU='';
if('Edit_contact_container'==result){pageU="saveProfileUpdate.php?p=3";}else if('Edit_Employee_container'==result){pageU="saveProfileUpdate.php?p=100";} else{pageU="saveProfileUpdate.php?p=2";}
    var req = getXMLHTTP();if(req){req.onreadystatechange = function(){if (req.readyState == 4) { 
	 if (req.status == 200) { post_yes=1; //alert(req.responseText);
	 if(document.getElementById(result)){
	  document.getElementById(result).innerHTML="<h4 style='color:green; padding-top:10px; padding-left:20px;'>Your Informations has been saved, Sucessfully. &nbsp;&raquo;&nbsp;<a href='profile.php'>See Here</a></h4>";
	  document.getElementById(result).style.opacity='1';	
	 }
	 if(document.getElementById('loader_image'))document.getElementById('loader_image').style.display='none';
	}else{alert('your operation not completed..!!'); if(document.getElementById('loader_image'))document.getElementById('loader_image').style.display='none';}}} 
     req.open("post", pageU, true);
	 req.send(form);
	 }	/*Http function closed . */}
	 
var loadPostFromindex=0; var Postbtnclicked=0; var readyState=1;
function readRespectData(btnid,result,_searchfor){
	if(readyState==0){ alert('Slow-Down and wait..., Data loading in process.'); readyState=1; return;}readyState=0;
	if(document.getElementById('loader_image'))document.getElementById('loader_image').style.display='';
	var pageU='';
if('1'==btnid){pageU="readBtnData.php?p=liked&u="+_searchfor; loadPostFromindex=0; Postbtnclicked=0;} else if('2'==btnid){pageU="readBtnData.php?p=stars&u="+_searchfor; loadPostFromindex=0; Postbtnclicked=0;}else if('3'==btnid){pageU="joinedGroups.php?p=groups&u="+_searchfor+'&Rstdv='+result; loadPostFromindex=0; Postbtnclicked=0;}else if('4'==btnid){pageU="readBtnData.php?p=images&u="+_searchfor; loadPostFromindex=0; Postbtnclicked=0;}else if('5'==btnid){pageU="fetchPostsonProfile.php?p=post&u="+_searchfor+'&lim='+loadPostFromindex; loadPostFromindex=(loadPostFromindex+30); if(Postbtnclicked==0 && document.getElementById(result)){ document.getElementById(result).innerHTML="";} Postbtnclicked=1;}
    var req = getXMLHTTP();if(req){req.onreadystatechange = function(){if (req.readyState == 4) { 
	 if (req.status == 200) {  //alert(req.responseText);
	 readyState=1;
	 if(document.getElementById(result)){
		 document.getElementById(result).style.display='';
		 if('5'==btnid){
		 if((loadPostFromindex-30)==0){
		 var cm=document.createElement('div');
		     cm.id='posts_'; cm.innerHTML=''; document.getElementById(result).appendChild(cm);	 
		 var ldm=document.createElement('div'); ldm.id='LoadMorePosts'; ldm.align='center';ldm.innerHTML="<button style='padding:4px; border-radius:3px; color:brown;' onclick=\"readRespectData('5','SBCR','"+_searchfor+"');\">Load more</button>";document.getElementById(result).appendChild(ldm);}
		 var dv_=document.createElement('div');
		 dv_.id="lastid"+(loadPostFromindex-30);
		 dv_.innerHTML=req.responseText;
		 document.getElementById('posts_').appendChild(dv_);}else{
	     document.getElementById(result).innerHTML=req.responseText;}
		 if((loadPostFromindex-30)>0)
		  {if(document.getElementById('forFocus'+(loadPostFromindex-30)))document.getElementById('forFocus'+(loadPostFromindex-30)).focus();}
	 }
	 if(document.getElementById('loader_image'))document.getElementById('loader_image').style.display='none';
	}else{alert('your operation not completed..!!'); if(document.getElementById('loader_image'))document.getElementById('loader_image').style.display='none';}}} 
     req.open("get", pageU, true);
	 req.send(null);
	 }	/*Http function closed . */}
var tghx="";if(document.getElementById('message_container'))tghx=document.getElementById('message_container').innerHTML;
var mainDV_cont={'OrgDVC':tghx};	 

function deleteCookie_gen(name,value,days){  	
var exp = new Date( );
var nowPlusdays = exp.getTime( ) -(days * 24 * 60 * 60 * 1000);
exp.setTime(nowPlusdays); 
document.cookie = name+"="+"; expires=" + exp.toGMTString( );}
function setcook_gen(name,value,days){	deleteCookie_gen(name,value,days);
var exp = new Date( );
var nowPlusdays = exp.getTime( ) + (days * 24 * 60 * 60 * 1000); 
exp.setTime(nowPlusdays); 
document.cookie = name+"="+value+"; expires=" + exp.toGMTString( );
}

function setCookies_(sv){
var exp = new Date( );
var nowPlusOneWeek = exp.getTime( ) + (7 * 24 * 60 * 60 * 1000);
exp.setTime(nowPlusOneWeek); 
document.cookie = "ShowFrom="+sv+"; expires=" + exp.toGMTString( );}
function select_option(sv,divid){
	/*This function is called from home.  sv=selected value*/ 
var svalues={"0_HO":"Home", "1_NI":"Idea\'s &diams;","2_FA":"FAQ &Xi;","3_PP":"Public &bull;","4_TV":"viewed &spades;","5_YS":"stared","6_YD":"Department &ETH;","7_YG":"Groups &clubs;","8_LP":"LATEST &diams;"};
if(document.getElementById('loader_image')){document.getElementById('loader_image').style.display='';}
var t=sv.split('~.~');
sv=(t.length>1)?t[0]:sv;
var In=(t.length>1)?t[1]:'';
if(sv=='7_YG'){
   if(document.getElementById('message_container') && In==''){document.getElementById('message_container').innerHTML=document.getElementById(sv+'_dv').innerHTML;setCookies_('GROUP');}else if(In!=''){setCookies_('GROUP~.~'+In);}
}
else if(sv=='1_NI'){setCookies_('IDEA~.~'+In);}
    else if(sv=='2_FA'){setCookies_('FAQ~.~'+In);}
    else if(sv=='3_PP'){setCookies_('PUBLIC~.~'+In);}
	else if(sv=='4_TV'){setCookies_('TOPVIWED~.~'+In);}
	else if(sv=='5_YS'){setCookies_('STARED~.~'+In);}
	else if(sv=='6_YD'){setCookies_('DEPARTMENT~.~'+In);}
	else if(sv=='8_LP'){setCookies_('LATEST~.~'+In);}
	else if(sv=='0_HO'){setCookies_('HOME');}
sv=svalues[sv];
if(document.getElementById(divid)){
document.getElementById(divid).innerHTML=sv;	
}if(document.getElementById('loader_image')){document.getElementById('loader_image').style.display='none';}
}
function fetchSearchedGroups(v,fldid,result){
if(document.getElementById('loader_image')){document.getElementById('loader_image').style.display='';}if(document.getElementById(fldid))document.getElementById(fldid).value='';
var pageU='';
pageU="fetchSearchedGroups.php?p="+v;
    var req = getXMLHTTP();if(req){req.onreadystatechange = function(){if (req.readyState == 4) { 
	 if (req.status == 200) { post_yes=1; 
	 if(document.getElementById(result)){
	  document.getElementById(result).style.display=''; document.getElementById(result).innerHTML=req.responseText;
	 }
	 if(document.getElementById('loader_image'))document.getElementById('loader_image').style.display='none';
	}else{alert('your operation not completed..!!'); if(document.getElementById('loader_image'))document.getElementById('loader_image').style.display='none';}}} 
     req.open("get", pageU, true);
	 req.send(null);
	 }	/*Http function closed . */
 
}
function updategroupDbData(thisdv,wtdv,o,gid){
/*O=1==join, O=2==leave group, */
  if(o==1){
	var U='LeaveJoinGroup.php?g='+gid+'&o=1';
	  readDataPutInDv(U,wtdv);
  }
  else if(o==2){ var d=false; d=confirm("Want to Leave This Group."); if(d!=true)return;
	  var U='LeaveJoinGroup.php?g='+gid+'&o=2';
	  readDataPutInDv(U,wtdv);
  }
}
function checkIsEnterKey(e,fldId){
	 var value_=document.getElementById(fldId).value; 
	 value_=removeWT(value_);
	 document.getElementById(fldId).value=value_;
	 var vvss=value_; 	  
	 var characterCode; 
	 e = (e || window.event); 
	 characterCode = e.keyCode || e.which;
	 if (characterCode == 13)
	 {   var value_=document.getElementById(fldId).value;   
		    if(((vvss=='' || vvss==' ' ||  vvss=='  ' || vvss=='   ') || (vvss=='\n' || vvss=='\n\n' ||  vvss=='\n\n\n' ||  vvss=='\n\n\n\n'  ||  vvss=='\n\n\n\n\n' ||  vvss=='\n\n\n\n\n\n'))){document.getElementById(fldId).value=""; document.getElementById(fldId).style.backgroundColor='red'; return 0;} 
	  return true;
}else{return false;}}
function readDataPutInDv(pageU,result){
  var req = getXMLHTTP();if(req){req.onreadystatechange = function(){if (req.readyState == 4) { 
	 if (req.status == 200) {  
	 if(document.getElementById(result)){
	  document.getElementById(result).style.display=''; document.getElementById(result).innerHTML=req.responseText;
	 }
	 if(document.getElementById('loader_image'))document.getElementById('loader_image').style.display='none';
	}else{alert('your operation not completed..!!'); if(document.getElementById('loader_image'))document.getElementById('loader_image').style.display='none';}}} 
     req.open("get", pageU, true);
	 req.send(null);
	 }	/*Http function closed . */	}
function AGS(resdv,gid){  /*this function is about group or group settings*/
	if(resdv=='GroupAbout' && document.getElementById(resdv)){if(document.getElementById('GroupSettings'))document.getElementById('GroupSettings').style.display='none';
	   document.getElementById(resdv).style.display='';  
	   document.getElementById(resdv).innerHTML="<div class='col-lg-12'><div style=\" width:0px; height:0px; border-left: 13px solid transparent; border-right: 13px solid transparent; border-bottom: 18px solid #FFF;  position:absolute;top:-13px; right:200px; z-index:13;\" ></div>&nbsp;Wait... while data loading</div>";	
	     readDataPutInDv("aboutGroup.php?gid="+gid,resdv);
	}else if(resdv=='GroupSettings' && document.getElementById(resdv)){ if(document.getElementById('GroupAbout'))document.getElementById('GroupAbout').style.display='none';  
	   document.getElementById(resdv).style.display='';  
	   document.getElementById(resdv).innerHTML="<div class='col-lg-12'><div style=\" width:0px; height:0px; border-left: 13px solid transparent; border-right: 13px solid transparent; border-bottom: 18px solid #FFF;  position:absolute;top:-13px; right:100px; z-index:13;\" ></div>&nbsp;Wait... while data loading</div>";	
	   readDataPutInDv("SettingsGroup.php?gid="+gid,resdv);
	}	
}
function deleteAdmin(colid,uid,gid){
	if(document.getElementById('resltdv')){document.getElementById('resltdv').style.display='';}
if(document.getElementById(colid)){
document.getElementById(colid).innerHTML='none';
}
var u="delupdAdmin.php?gid="+gid+"&adui="+uid+'&op=DEL';readDataPutInDv(u,'resltdv');
}
function saveAdmins(gid,rstdv,OLDADMN){
	if(''!=gid){  
	var OLD={};
	 OLD=OLDADMN.split('~.~');
	   if(document.getElementById('admin2update') && document.getElementById('admin2update').style.display=='' && document.getElementById('admin2update').value!=''){
			 OLD[1]=document.getElementById('admin2update').value;
	    }
	  if(document.getElementById('admin3update') && document.getElementById('admin3update').style.display=='' && document.getElementById('admin3update').value!=''){
			 OLD[2]=document.getElementById('admin3update').value;
		 }	
	  var uid=OLD.join('~.~');	 
	  var u="delupdAdmin.php?gid="+gid+'&op=UPDT&upAdmn='+uid; readDataPutInDv(u,rstdv); 
	}
}
function selectAdmin(aType,auid,aindx,name){
	if(document.getElementById('updateAdmin_form')){
		document.getElementById('updateAdmin_form').style.display='';
	if(aType=='2' && document.getElementById('admin2update')){document.getElementById('admin2update').value=auid;document.getElementById('admin2update').style.display=''; document.getElementById('adnm2').style.display='';document.getElementById('adnm2').value=name;}
	if(aType=='3' && document.getElementById('admin3update')){document.getElementById('admin3update').value=auid;document.getElementById('admin3update').style.display=''; document.getElementById('adnm3').style.display='';document.getElementById('adnm3').value=name;}
 }
}
function GjoinReqHandle(action,uid,gid,rstdv){	  
  var u="ApproveCancelGReq.php?gid="+gid+"&Juid="+uid+"&ac="+action; readDataPutInDv(u,rstdv); 
}
 
function fetchJoinedG(rstdv){
	var u="JoinedGroups.php"; readDataPutInDv(u,rstdv); 
}
function fetchCompany_details(working_at_results,initial_header,search_for){
	if(document.getElementById(initial_header)){document.getElementById(initial_header).style.display='none';}
	if(document.getElementById(working_at_results)){document.getElementById(working_at_results).style.display=''; document.location.href='#'+working_at_results;}
	actU=search_for.substr(3,(search_for.length-6));
	var u="cil_company_details.php?search_for="+actU;
	readDataPutInDv(u,working_at_results);
}
function saveDataAsForm(pageU,form,result){
if(document.getElementById('loader_image'))document.getElementById('loader_image').style.display='';
    var req = getXMLHTTP();if(req){req.onreadystatechange = function(){if (req.readyState == 4) { 
	 if (req.status == 200) { //alert(req.responseText);
	 if(document.getElementById(result)){ trainingResultDvTimer=5;
	 var colr='green';var t="Your Informations has been saved, Sucessfully. &nbsp;&nbsp; ";
	 var c=req.responseText.split("_+_"); if(c[0]=='error'){colr='red'; t=c[1];}
	  document.getElementById(result).style.display='';document.getElementById(result).innerHTML="<h4 style='color:"+colr+"; padding-top:10px; padding-left:20px;'>"+t+"</h4>"; 
	 }
	 if(document.getElementById('loader_image'))document.getElementById('loader_image').style.display='none';
	}else{alert('your operation not completed..!!'); if(document.getElementById('loader_image'))document.getElementById('loader_image').style.display='none';}}} 
     req.open("post", pageU, true);
	 req.send(form);
	 }	/*Http function closed . */}
function isValidValue(v){
      
}
function SubmitTrainingData(btn,flg){
	var allFieldIds=['Employee_EIS_NEIS_','Employee_Name_','Employee_Designation_','Employee_Area_','Employee_Department_','Employee_Company_','Training_Title_','Training_Place_','Training_From_','Training_Upto_','HQ_Letter_No_','Release_Letter_','Release_From_','Released_Upto_'];
	var i=0; if(document.getElementById('wait_and_result')){document.getElementById('wait_and_result').style.display='none';}
	if(btn=='Reset_btn_'){ /*resetall values */  var t=0; if(flg==1 || flg=='1'){t=confirm('You\'ll lost all entered fields data..!!!\n want to reset...?');}else{t=true;}
	  if(t==0 || t==false){return false;}
	     for(i=0;i<allFieldIds.length;i++){
			if(document.getElementById(allFieldIds[i])){document.getElementById(allFieldIds[i]).value='';}
		  } return false;
		}else if(btn=='Submit_btn_'){/*checking form values*/
			var form=new FormData();  var breaked=0;
			for(i=0;i<allFieldIds.length;i++){
				
				if(document.getElementById(allFieldIds[i])){  
				   var cv=removeWT(document.getElementById(allFieldIds[i]).value);
				  if(cv!='' && cv!=' '){
			     if('Employee_EIS_NEIS_'==allFieldIds[i]){if(!isNaN(cv)){form.append(allFieldIds[i],cv);}else{alert('please enter numeric value in Employee EIS/NEIS No. ');if(document.getElementById(allFieldIds[i])){document.getElementById(allFieldIds[i]).style.backgroundColor='#F0ABCD'; document.getElementById(allFieldIds[i]).focus(); document.getElementById(allFieldIds[i]).value='';} breaked=1; break;}}else {form.append(allFieldIds[i],cv);}}else{if(document.getElementById(allFieldIds[i])){document.getElementById(allFieldIds[i]).style.backgroundColor='#F0ABCD'; document.getElementById(allFieldIds[i]).focus(); document.getElementById(allFieldIds[i]).value='';} breaked=1; break;}
				}else{ if(document.getElementById(allFieldIds[i])){document.getElementById(allFieldIds[i]).style.backgroundColor='#F0ABCD'; document.getElementById(allFieldIds[i]).focus();document.getElementById(allFieldIds[i]).value='';} breaked=1; break;}
		  }
		  if(breaked==0){	 
			 var st=confirm("Please Check your data carefully once again, After that your can not Edit it.\nIf you want to proceed then click 'OK' .");if(st==0 || st==false){return false;}
			 if( document.getElementById('wait_and_result1'))document.getElementById('wait_and_result1').style.display='';
		  var u="createTraining.php";saveDataAsForm(u,form,'wait_and_result'); IdToBeClosed='wait_and_result1'; Timecounts=10; return true;
		  }
		}
		return '0';
}