<script type="text/javascript" async>
function getXMLHTTP(){ var xmlhttp=false; try{ xmlhttp=new XMLHttpRequest(); } catch(e)	{ try{ xmlhttp= new ActiveXObject("Microsoft.XMLHTTP"); } catch(e){ try{ xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); } catch(e1){ xmlhttp=false; } } } return xmlhttp; }
function abortHttp_req(key){
	if(typeof XMLHTTP_REQ_MGR!="undefined" && typeof XMLHTTP_REQ_MGR[key]!="undefined"){ 
		var xreq = XMLHTTP_REQ_MGR[key]; 
		XMLHTTP_REQ_MGR[key]=[];
		if(xreq && xreq.length>0){ 
			xreq.forEach(function(v,i,arr){ v.abort();}); 
		} console.log(xreq.length, " total requests aborted.");
	}}
function addProcessStatusDv(r, type){
	var bgColor, color , Status;
	if(r){
		
		if(type=='e'){
			/*error-status*/	
			bgColor = 'rgba(200, 85, 22,0.3)';
			color = 'rgba(250,20,10,1)';
			Status = "Error";
		}else if(type=='c'){
			/*cancelled-status*/	
			bgColor = 'rgba(20, 85, 22,.3)';
			color = 'rgba(250,20,10,1)';
			Status = "Cancelled";
		}else if(type=='u'){
			/*update-status*/	
			bgColor = 'rgba(230, 255, 242,0.5)';
			color = 'rgba(0,200,10,1)';
			Status = "Update";
		}else{
			/*other-status*/	
			bgColor = 'rgba(230, 255, 242,1)'; 
			color = 'rgba(0,200,10,1)';
			Status = "Data Transfer";
		}
		
		/*add process status div to result div.*/
		var pdv = document.createElement("DIV");
			 	 pdv.id = 'progress_dv';
				 pdv.style.padding='2px';
				 pdv.style.border = 'dotted thin #003003';
				 pdv.style.borderRadius='5px';
				 pdv.style.backgroundColor = bgColor;
			 	 r.insertBefore(pdv,r.firstChild);
		 	 	 prog_dv = document.getElementById("progress_dv");
				 prog_dv.innerHTML = "<p style='color:blue; font-weight:900;'>"+Status+" Status:</p><span style='color:"+color+"; padding:3px; font-weight:900;' id='StatusMsgSpn'></span><br/>&nbsp;<br/>&nbsp;";
		return prog_dv;
	}
	return null;}
function transfer_complete(e,resultShowAt){
	 if(typeof resultShowAt!="undefined" && document.getElementById(resultShowAt)){
		 var rdv = document.getElementById(resultShowAt);
		 rdv.style.display='';
		 var prog_dv = document.getElementById("progress_dv");
		 if(!prog_dv){
		 	 	 prog_dv =  addProcessStatusDv(rdv, 'tc');}
		if(prog_dv)	 {
			var statusmsg = document.getElementById('StatusMsgSpn');
			statusmsg.innerHTML="Request Processing completed.";
			var tmr = setTimeout(function(){prog_dv.style.display='none'; if(tmr){clearTimeout(tmr);} },10);
		}
	 }
 }
function transfer_canceled(e,resultShowAt){
	 if(typeof resultShowAt!="undefined" && document.getElementById(resultShowAt)){
		 var rdv = document.getElementById(resultShowAt);
		 rdv.style.display='';
		 var prog_dv = document.getElementById("progress_dv");
		 if(!prog_dv){ 
		 	 prog_dv =  prog_dv = addProcessStatusDv(rdv, 'c');}
		if(prog_dv)	 {
			var statusmsg = document.getElementById('StatusMsgSpn');
			statusmsg.innerHTML="Aborted: Transfer Cancelled!";
		}
	 }
 }
function transfer_failed(e,resultShowAt){
	 if(typeof resultShowAt!="undefined" && document.getElementById(resultShowAt)){
		 var rdv = document.getElementById(resultShowAt);
		 rdv.style.display='';
		 var prog_dv = document.getElementById("progress_dv");
		 if(!prog_dv){
		 	 prog_dv = addProcessStatusDv(rdv, 'e');}
		if(prog_dv)	 {
			var statusmsg = document.getElementById('StatusMsgSpn');
			statusmsg.innerHTML="Error: Transfer Failed!, retry again later.";
		}
	 }
 }
function update_progress(e,resultShowAt){
	 if(typeof resultShowAt!="undefined" && document.getElementById(resultShowAt) && e.lengthComputable){
		 var rdv = document.getElementById(resultShowAt);
		 rdv.style.display='';
		 var prog_dv = document.getElementById("progress_dv");
		 if(!prog_dv){
		 	 prog_dv = addProcessStatusDv(rdv, 'u');}
		if(prog_dv)	 {
			var per = Math.floor((e.loaded / e.total)*100);
			var statusmsg = document.getElementById('StatusMsgSpn');
			statusmsg.innerHTML="<span style='color:gray;'>"+per+"% Completed </span>";
		}
	 }
 }
function sendOnServerData(urL_,formData,resultShowAt,isfileupload){ 
	var req = getXMLHTTP();
	if(req){ 
		req.upload.onprogress = 
		    function(e){if(typeof update_progress == "function")update_progress(e,resultShowAt);};
		req.addEventListener("load",
		    function(e){if(typeof transfer_complete == "function")transfer_complete(e,resultShowAt);}, false);
		req.addEventListener("error", 
		    function(e){if(typeof transfer_failed == "function")transfer_failed(e,resultShowAt);}, false);
		req.addEventListener("abort", 
		    function(e){if(typeof transfer_canceled == "function")transfer_canceled(e,resultShowAt);}, false);	  	
		req.onreadystatechange = function(){if (req.readyState == 4) {
	 if (req.status == 200) { if(typeof isfileupload == "function"){isfileupload(req.responseText,resultShowAt);}else{alert(req.responseText);}}
	 else{if(typeof transfer_failed == "function"){transfer_failed(e,resultShowAt);} alert('your operation not completed..Try Again later! \nresponse code: \n\n'+req.status+'\n\n'+(resultShowAt.FN)?resultShowAt.FN:"");}}} 
     req.open("POST", urL_, true);
	 req.send(formData);
	 }	/*Http function closed . */	 
}
function fetchSDataResolvePromise(urL_,formData,Pcallback){
	var resultShowAt = (typeof Pcallback!="undefined" && typeof Pcallback[2]!="undefined" && Pcallback[2]!="")?Pcallback[2]:null;
	var req = getXMLHTTP();
	if(req){ 
		req.upload.onprogress = 
		    function(e){if(typeof update_progress == "function" && resultShowAt!=null )update_progress(e,resultShowAt);};
		req.addEventListener("load",
		    function(e){if(typeof transfer_complete == "function" && resultShowAt!=null )transfer_complete(e,resultShowAt);}, false);
		req.addEventListener("error", 
		    function(e){if(typeof transfer_failed == "function" && resultShowAt!=null )transfer_failed(e,resultShowAt);}, false);
		req.addEventListener("abort", 
		    function(e){if(typeof transfer_canceled == "function" && resultShowAt!=null )transfer_canceled(e,resultShowAt);}, false);	  	
		req.onreadystatechange = function(){if (req.readyState == 4) {
	   if (req.status == 200) { 
	       var tx=req.responseText.split("~`~");
		   if(typeof tx!="undefined" && tx!=null){
			   var _data=null;
			   if(typeof tx[0]!="undefined" && tx[0]==1){
				   try{
				   			 _data=JSON.parse(tx[1]);
				  	}catch(e){ 
						_data=[null,"Error-code : Unaccepted JSON-Data, EXCEPTn: "+e1, "server-returned-text: "+tx[1]];
					}
			   }else{ _data=[null,"Error-code : Unaccepted Data", "server-returned-text: "+tx[1]];}
	          if(typeof Pcallback!="undefined"){
			       if(typeof Pcallback[0] == "function"){Pcallback[0](_data);}
			       else if(typeof Pcallback[1] == "function"){Pcallback[1](_data);}
		      }else{alert(_data);}
			  
		   }else{
			 if(typeof Pcallback[0] == "function"){Pcallback[0]([null,"Error-code : Unaccepted Data"]);}
			 else if(typeof Pcallback[1] == "function"){Pcallback[1]([null,"Error-code : Unaccepted Data"]);}   
		   }
	   }
	   else{
	      if(typeof Pcallback!="undefined"){
			if(typeof Pcallback[0] == "function"){Pcallback[0]([null,"Error-code : "+req.status]);}
			else if(typeof Pcallback[1] == "function"){Pcallback[1]([null,"Error-code : "+req.status]);}
		  }else{alert('your operation not completed..Try Again later! \nresponse code: \n\n'+req.status+'');}
	   }
	 }} 
     req.open("POST", urL_, true);
	 req.send(formData);
	 }	/*Http function closed . */	 
} 
function fetchSDataResolvePromise_withoutJson(urL_,formData,Pcallback){
	var resultShowAt = (typeof Pcallback!="undefined" && typeof Pcallback[2]!="undefined" && Pcallback[2]!="")?Pcallback[2]:null;
	var req = getXMLHTTP();
	if(req){ 
		req.upload.onprogress = 
		    function(e){if(typeof update_progress == "function" && resultShowAt!=null )update_progress(e,resultShowAt);};
		req.addEventListener("load",
		    function(e){if(typeof transfer_complete == "function" && resultShowAt!=null)transfer_complete(e,resultShowAt);}, false);
		req.addEventListener("error", 
		    function(e){if(typeof transfer_failed == "function" && resultShowAt!=null)transfer_failed(e,resultShowAt);}, false);
		req.addEventListener("abort", 
		    function(e){if(typeof transfer_canceled == "function" && resultShowAt!=null)transfer_canceled(e,resultShowAt);}, false);	  	
		req.onreadystatechange = function(){if (req.readyState == 4) {
			
	   if (req.status == 200) { 
	       var tx=req.responseText.split("~`~");
		   if(typeof tx!="undefined" && tx!=null){
			   var _data=null;
			   if(typeof tx[0]!="undefined" && tx[0]==1){
				   _data=tx[1];
			   }else{ _data=[null,"Error-code : Unaccepted Data", "server-returned-text: "+tx[1]];}
	          if(typeof Pcallback!="undefined"){
			       if(typeof Pcallback[0] == "function"){Pcallback[0](_data);}
			       else if(typeof Pcallback[1] == "function"){Pcallback[1](_data);}
		      }else{alert(_data);}
			  
		   }else{
			 if(typeof Pcallback[0] == "function"){Pcallback[0]([null,"Error-code : Unaccepted Data"]);}
			 else if(typeof Pcallback[1] == "function"){Pcallback[1]([null,"Error-code : Unaccepted Data"]);}   
		   }
	   }
	   else{
	      if(typeof Pcallback!="undefined"){
			if(typeof Pcallback[0] == "function"){Pcallback[0]([null,"Error-code : "+req.status]);}
			else if(typeof Pcallback[1] == "function"){Pcallback[1]([null,"Error-code : "+req.status]);}
		  }else{alert('your operation not completed..Try Again later! \nresponse code: \n\n'+req.status+'');}
	   }
	 }} 
     req.open("POST", urL_, true);
	 req.send(formData);
	 }	/*Http function closed . */	 
} 

function sendOnServerDataAsForm(urL_,formData,resultShowAt){
	if(document.getElementById(resultShowAt)){document.getElementById(resultShowAt).style.display='none';document.getElementById(resultShowAt).innerHTML='Wait Processing ... ';}  
	var req = getXMLHTTP();
	if(req){req.onreadystatechange = function(){if (req.readyState == 4) { 
	 if (req.status == 200) {  
	   /*if(document.getElementById(resultShowAt)){document.getElementById(resultShowAt).style.display='none';document.getElementById(resultShowAt).innerHTML=req.responseText;}  */
	   if(resultShowAt=='sunitcd' || resultShowAt=='areaName'){showunitcd(req.responseText,resultShowAt);}else{
		resultData(req.responseText);}
	    //alert(req.responseText);
	}else{alert('your operation not completed..!! Try Again. '+req.responseText);}}} 
     req.open("POST", urL_, true);
	 req.send(formData);
	 }	/*Http function closed . */	 

}
function returnToTheUser(r, rdv,o, callbackF, status){
	var dv = document.getElementById(rdv);
	if(typeof callbackF == "function"){if(dv){dv.innerHTML="Returning Data to callback function";} callbackF(r,rdv,o, status);}
	   else{ if(dv){ dv.innerHTML = r;}
	   else{console.log(req.responseText);alert("Result div not found, see server response in the consoloe."); }} 
}
function readFileFromServer(urL_,methode,formData,rdiv, callbackF, Oinfo){
	var dv = document.getElementById(rdiv);
	if(dv){dv.style.display='';dv.innerHTML='Wait Async Processing Started... ';}  
	var req = getXMLHTTP();
		req.upload.onprogress = function(e){
				if(typeof update_progress == "function" && rdiv!=null )update_progress(e,rdiv);};
		req.addEventListener("load",function(e){
				if(typeof transfer_complete == "function" && rdiv!=null)transfer_complete(e,rdiv);}, false);
		req.addEventListener("error",function(e){
				if(typeof transfer_failed == "function" && rdiv!=null)transfer_failed(e,rdiv);}, false);
		req.addEventListener("abort",function(e){
				if(typeof transfer_canceled == "function" && rdiv!=null)transfer_canceled(e,rdiv);}, false);	  	
	if(req){
		if(typeof XMLHTTP_REQ_MGR!="undefined"){ 
			if(typeof XMLHTTP_REQ_MGR["readFileFromServer"]=="undefined"){XMLHTTP_REQ_MGR["readFileFromServer"] = [];}
			 XMLHTTP_REQ_MGR["readFileFromServer"].push(req); }
		req.onreadystatechange = function(){if(req.readyState == 4) { 
	 if (req.status == 200) {
		 returnToTheUser(req.responseText, rdiv, Oinfo, callbackF, "200~`~OK");  
	}else if (req.status == 404){
				returnToTheUser(req.responseText, rdiv, Oinfo, callbackF,"404~`~Error:file Not found");
	}else if (req.status == 500){
			returnToTheUser(req.responseText, rdiv, Oinfo, callbackF,"500~`~Error: internal Server Error");
	}else{console.log('your operation not completed..!! Try Again. '+req.responseText);}}} 
    	req.open((!methode || typeof methode=='undefined')?"POST":methode, urL_, true);
	 	req.send((typeof methode!='undefined' && methode.toUpperCase()=="POST")?formData:null);
	 }	/*Http function closed . */	 

}




/*Polyfill of promise functionalty for old browsers*/
function RP_LOAD_DATA_USING_PM(arv){ 
/*This function will be used to load data using promise or XMLHttp req.	*/
/************************************************************************
arv = {URL:"",FORM_DATA={},CLBK_FN="",IS_PROMISE=falue}

INPUTS PARAMTERS: (arv)
IS_PROMISE		: IS PROMISE REQUEST (TRUE) OR JUST SIMPLE CALL (FALSE). 
URL 			: PAGE URL FROM DATA TO BE FETCHED
FORM_DATA	 	:  VALUES TO BE SENT WITH POST REQUEST TO THE TARGET URL.
CLBK_FN  	:	A FUNCTION NAME WHICH TO BE CALLED WHEN RESULTS READY <br />
					OR NULL (TO RETURN THE VALUE TO THE CALLER FUNCTION).
RETURN PARAMETER:
	CALL THE CALLBACK_FUNC OR RETURN VALUE.					
					
************************************************************************/

	if(typeof arv!="undefined"){
		var formData=(typeof arv["FORM_DATA"]!="undefined" && arv["FORM_DATA"]!=null )?arv["FORM_DATA"]:{}; 
		var urL_=(typeof arv["URL"]!="undefined" && arv["URL"]!=null )?arv["URL"]:"";
		var rsdv=(typeof arv["RDV_ID"]!="undefined" && arv["RDV_ID"]!=null )?arv["RDV_ID"]:null; /*resultdv-id*/
		    
		if(typeof arv["IS_PROMISE"]!="undefined" && arv["IS_PROMISE"]==true){
	       var pm = new Promise(function(r,e){
			      setTimeout(function(){fetchSDataResolvePromise_withoutJson(urL_,formData,[r,e,rsdv]);},500);
				  //fetchSDataResolvePromise(urL_,formData,[r,e]);
           }).then(function(r){if(typeof arv["CLBK_FN"]!="undefined" && arv["CLBK_FN"]!="" && arv["CLBK_FN"]!=null)
		   {arv["CLBK_FN"](r);}else{return r;}});
	       return pm;
		}/*if promise enabled browser*/
		else{ /*use a simple XMLHTTP WITH sync*/
			var data=null;
			var req = getXMLHTTP();
	        if(req){ 	  	
		    req.onreadystatechange = function(){if (req.readyState == 4) {
	          if (req.status == 200) {  
				  d=req.responseText.split("~`~");
				  if(typeof d!="undefined" && d!=null){
					  if(typeof d[0]!="undefined" && d[0]==1){
						  data=d[1];
					  }else{
					    alert("Internal Error: Some internal-error occurs either refresh & retry or check your input paramenters."+JSON.stringify(d));  	  data=null;
					  }
				  }else{
					alert("Internal Error: unaccepted data returned from server. check your input paramenters.");  
					data=null;  
				  }
			  }
	          else{data=null;
				   alert("Network Error: Your request can not be processed, \nStatus-code: "+req.status);
	            }
	         }} 
             req.open("POST", urL_, false);
	         req.send(formData);
	        }	/*if(req .... closed . */
			if(typeof arv["CLBK_FN"]!="undefined" && arv["CLBK_FN"]!="" && arv["CLBK_FN"]!=null)
			{arv["CLBK_FN"](data);}else{return data;}
		}/*else*/
   }else{
	 alert('function received undefined/NULL parameters, kindy check.');return null;   
   }
}
</script>