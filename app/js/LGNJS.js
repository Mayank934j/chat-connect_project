//LOGIN-PAGE-JS
function resultData(data){  
    var rdv=document.getElementById('resultShowq');
	var lodrdv=document.getElementById('loaderDv');
	var logndv=document.getElementById('logndv');
	var tjj="Some Internal Error."; 
	if(JSON.stringify(data)!=""){
		var tj=data.split("~"); 
		if(tj[0]<0){tjj="<strong style='color:red; padding:5px;'>Error : &nbsp;"+tj[1]+"</strong>"; rdv.style.borderTop='solid thin #FF0000';}
		else{tjj="<strong style='color:green; padding:5px;'> "+tj[1]+" </strong>";rdv.style.borderTop='solid thin #00FF00';
		 setInterval(function(){document.location.href=redirectURI;},2000);  
		 /*after login redirected on this page*/ }
	}
	if(lodrdv){lodrdv.style.display="none";}
	if(logndv){logndv.style.display="";}
	if(rdv){rdv.style.display="";rdv.innerHTML=tjj;}
}
function isregistered(data){  
	var tjj="Some Internal Error.";
	if(JSON.stringify(data)!=""){
		var tj=data.split("~");
		var errcrs=0;
		if(tj[0]<0){ errcrs=1; tjj="<strong style='color:red; padding:5px;'>Error : "+tj[1]+"</strong>";}
		else{tjj="<strong style='color:green; padding:5px;'> "+tj[1]+" </strong>";}
	}
	if(document.getElementById('loaderDvx')){ document.getElementById('loaderDvx').style.display="none";}
	if(document.getElementById('resultShowqx')){document.getElementById('resultShowqx').style.display="";document.getElementById('resultShowqx').innerHTML=tjj;}
	  
	if(document.getElementById('abcd12x')){
	   document.getElementById('abcd12x').style.opacity=(errcrs>0)?"1":".1";
	}
	if(document.getElementById('spntx')){
	   if(document.getElementById('button2x')){
		 document.getElementById('button2x').style.backgroundColor=(errcrs>0)?"#6600FF":"rgba(24,204,4,1)";   
		 document.getElementById('button2x').disabled=(errcrs>0)?false:true;   
		 document.getElementById('button2x').style.color='#FFFFFF';
	   }
	   document.getElementById('spntx').innerHTML=(errcrs>0)?"CREATE":"Registration Done";
	   document.getElementById('spntx').style.color='#FFFFFF';	
	}
}

  var Dfrm=new FormData();
function loginUser(){
	Dfrm.append(btoa(unescape(encodeURIComponent('sb'))),btoa(unescape(encodeURIComponent('1ogin'))));
	var url="app/logincheck.php";  
	sendOnServerDataAsForm(url,Dfrm,"xz");
}
function checkvalues(t){ 
  var a=['idx','passx']; 
		 for(var i=0; i<a.length;i++){
		     var b=document.getElementById(a[i]);
			 var e=document.getElementById(a[i]+'e');
			 if(b && (!b.value || b.value.trim()=='' || b.value.trim()=='-1')){
				   b.focus(); b.value = ''
			       if(e){e.style.display='';e.innerHTML="&uarr;&nbsp;Enter Correct Value.";}
				   Dfrm=null; rcss(t); return 0;
		     }
			 else{ 
				 if(a[i]=="idx" && ValidatePAN(b.value.trim())== '-1'){
					 b.focus();
					 b.value = ''
			       	if(e){e.style.display='';e.innerHTML="&uarr;&nbsp;Enter Correct Pan Number.";}
				   	Dfrm=null; rcss(t); return 0;
				 }  
				 
				Dfrm.append(btoa(unescape(encodeURIComponent(a[i]))),btoa(unescape(encodeURIComponent(b.value.trim())))); 
				  
			 }
	  }/*for-loop*/
	 if(document.getElementById('loaderDv')){document.getElementById('loaderDv').style.display='';} 
	 return true;
}
function checkEnterKey(e){ 
	 var characterCode; 
	 e = (e || window.event); 
	 characterCode = e.keyCode || e.which;
	 if (characterCode == 13)
	 { return true; }else{return false;}
}	 

function regstrx(frm,ridx){frm.append(btoa(unescape(encodeURIComponent('sb'))),btoa(unescape(encodeURIComponent('1')))); var t=document.getElementById(ridx);
 if(t){
	t.style.display='';var url='app/register.php';  
	var _tm = setTimeout(function(){
		sendOnServerData(url,frm,ridx,isregistered);
		if(_tm){clearTimeout(_tm);}
	},1500) 
 }
}



 

 
 
