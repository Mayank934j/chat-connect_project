<script>
/*REPORTS_JS*/
var LAST_LOADED_REPORT_JsFORM={};  /*this will hold last loaded form & url that can be used for excel dwnlaod*/
function createTD(_v,_cspn,_id){
	_cspn=_cspn || 0; _id= _id|| (Math.round(Math.random()*10000+5000));
 	var td=document.createElement("TD");
	    td.id="TD-"+_id;
		td.colspan=_cspn;
		td.style.border='solid thin rgba(242,200,24,1)';
		td.style.padding='5px';
		td.innerHTML=_v;
		return td;
}

function add_prodTable_Data(p,pr,dv,ov){
	pr=pr || "";dv=dv || '';ov=ov || '';
 var _id=(Math.round(Math.random()*10000+15000));		
 var tr=document.createElement("TR");	
     tr.id='TR-'+_id;
	 tr.style.color='#003003';
	 tr.style.padding='5px';
	 var ov_=0;
	 var dv_=0;
	 if(pr!=""){
	 tr.appendChild(createTD(p));
	 tr.appendChild(createTD(pr));
	 if(dv!=""){
		 dv_=Number(dv).toFixed(3)
	 }
	 if(ov!=""){
		 ov_=Number(ov).toFixed(3);
	 }
	 var tot=0;
	 tot=Number(parseFloat(dv_)+parseFloat(ov_)).toFixed(3);
	 tr.appendChild(createTD(dv_));
	 tr.appendChild(createTD(ov_));
	 tr.appendChild(createTD(tot)); 
	 
	 }else{/*empty row*/
	    tr.style.backgroundColor='rgba(235,235,235,1)';
		tr.style.height='20px';
		tr.appendChild(createTD(''));
	 	tr.appendChild(createTD(''));
	 	tr.appendChild(createTD(''));
		tr.appendChild(createTD(''));
		tr.appendChild(createTD(''));
	 }
	  
	 return tr;
 
}
function add_prodTable_header(hdr){ 
	hdr=hdr || ['Party-Name','Particulars','Departmental A','Outsource B','Total  (A+B) '];
 var _id=(Math.round(Math.random()*10000+15000));		
 var tr=document.createElement("TR");	
     tr.id='HTR-'+_id;
	 tr.style.color='#003003';
	 tr.style.fontWeight='900';
	 tr.style.backgroundColor='rgba(242,200,24,1)';
	 if(typeof hdr!="undefined" && hdr!=null){
		for(var i in hdr){
			tr.appendChild(createTD(hdr[i]));
		}
	 }
	 
	 return tr;
 
}
function Show_Grade_Details(u_,g_,_f){
 _f=_f || 'PROD'; var _id=(Math.round(Math.random()*10000+5000));	
 var rdv=document.getElementById('MoreDtl_dv');
 if(typeof rdv!="undefined" && rdv!=null){
	 var avilH=window.screen.availHeight;
	 rdv.style.display='';	
	 rdv.style.zIndex=2000;
	 rdv.style.MaxHeight=(avilH-30)+'px';
	 var rdvD=document.getElementById('MoreDtl_dv_Data');
	 rdvD.innerHTML="";
   var _u=null;
   if(_f=="PROD" && document.getElementById("PROD_ARX")){
      _u=JSON.parse(document.getElementById("PROD_ARX").innerHTML);  /*unit row*/
   }
   
 if(typeof _u!="undefined" && typeof u_!="undefined" && typeof g_!="undefined" && typeof _u[u_][g_]!="undefined" && _u!=null){
	_u=_u[u_][g_]; 
  
  
  var dv=document.createElement("div");
  	  dv.id="dv-"+_id; 
	  dv.style.padding='5px';
	  dv.style.borderBottom='solid thin rgba(242,200,24,1)';
	  if(_f=="PROD"){
	     dv.innerHTML="More Details of  - &nbsp;"+"UNIT: <strong>"+u_+"</strong>, GRADE: <strong>G-"+g_+"</strong>";
	  }else{
		   dv.innerHTML="More Details of  - &nbsp;"+"UNIT: <strong>"+u_+"</strong>";  
	  }
	  rdvD.appendChild(dv);
  var tbl=document.createElement("table");
  	  tbl.id="tbl-"+_id;
	  tbl.cellpadding='3';
	  tbl.cellspacing='3';
	  tbl.style.width='98%';
	  tbl.style.maxWidth='900px';
	  rdvD.appendChild(tbl);
	  tbl.appendChild(add_prodTable_header());
  for(var _prw in _u){
	var _p=_u[_prw];  
	
	tbl.appendChild(add_prodTable_Data(_prw,"ON-DATE",_p["ONDATE"]["DEPARTMENT"],_p["ONDATE"]["OUTSOURCE"]));
	tbl.appendChild(add_prodTable_Data('',"PROG.MONTHLY",_p["PTD"]["DEPARTMENT"],_p["PTD"]["OUTSOURCE"]));
	tbl.appendChild(add_prodTable_Data('',"PROG.YEARLY",_p["PTY"]["ACTUAL"]["DEPARTMENT"],_p["PTY"]["ACTUAL"]["OUTSOURCE"]));
	tbl.appendChild(add_prodTable_Data('',"LAST_Year ON-DATE",_p["LONDATE"]["DEPARTMENT"],_p["LONDATE"]["OUTSOURCE"]));
	tbl.appendChild(add_prodTable_Data('',"LAST_Year PROG.MONTHLY",_p["LPTD"]["DEPARTMENT"],_p["LPTD"]["OUTSOURCE"]));
	tbl.appendChild(add_prodTable_Data('',"LAST_Year PROG.YEARLY",_p["LPTY"]["ACTUAL"]["DEPARTMENT"],_p["LPTY"]["ACTUAL"]["OUTSOURCE"]));
	tbl.appendChild(add_prodTable_Data('',"",'',''));
	_p=null;
  }
  rdvD.innerHTML+="<div style='padding:5px;'><br/><p style='color:rgba(205,200,200,1);font-size:9px; border-top:solid thin rgba(222,222,222,1); padding-top:5px;'>Developed By R.P.Meena, AM(System), Raigarh Area</p></div>";
  if(rdvD){
	 if(typeof scrollUptoDv=="function"){ scrollUptoDv('logo_title'); 
	 document.body.scrollTop=0; 
     document.body.style.overflow='hidden';
	 }
   }
  }/*unit-databse-loaded*/
  else{
	alert('Internal-Error:While loading Production Object in js.');  
  }
 }else{
	alert('System-Error: Popup-div is not available.'); return false;
 }
}

function Show_PARTY_Details(u_,g_,_f){
	_f=_f || 'OBR';var _id=(Math.round(Math.random()*10000+5000));	
 var rdv=document.getElementById('MoreDtl_dv');
 if(typeof rdv!="undefined" && rdv!=null){
	 var avilH=window.screen.availHeight;
	 rdv.style.display='';	
	 rdv.style.zIndex=2000;
	 rdv.style.MaxHeight=(avilH-30)+'px';
	 var rdvD=document.getElementById('MoreDtl_dv_Data');
	 rdvD.innerHTML="";
   var _u=null;
   if(_f=="OBR" && document.getElementById("OBR_ARX")){
      _u=JSON.parse(document.getElementById("OBR_ARX").innerHTML);  /*unit row*/
   }
 if(typeof _u!="undefined" && typeof u_!="undefined" && typeof g_!="undefined" && typeof _u[u_][g_]!="undefined" && _u!=null){
	_u=_u[u_]; 
   var  _prw=g_;
  
  var dv=document.createElement("div");
  	  dv.id="dv-"+_id; 
	  dv.style.padding='5px';
	  dv.style.borderBottom='solid thin rgba(242,200,24,1)';
	  if(_f=="OBR"){
	     dv.innerHTML="More Details of  - &nbsp;"+"UNIT: <strong>"+u_+"</strong>, PARTY: <strong> "+g_+"</strong>";
	  }else{
		   dv.innerHTML="More Details of  - &nbsp;"+"UNIT: <strong>"+u_+"</strong>";  
	  }
	  rdvD.appendChild(dv);
  var tbl=document.createElement("table");
  	  tbl.id="tbl-"+_id;
	  tbl.cellpadding='3';
	  tbl.cellspacing='3';
	  tbl.style.width='98%';
	  tbl.style.maxWidth='900px';
	  rdvD.appendChild(tbl);
	  tbl.appendChild(add_prodTable_header());
  
	var _p=_u[_prw];  
	tbl.appendChild(add_prodTable_Data(_prw,"ON-DATE",_p["ONDATE"]["DEPARTMENT"],_p["ONDATE"]["OUTSOURCE"]));
	tbl.appendChild(add_prodTable_Data('',"PROG.MONTHLY",_p["PTD"]["DEPARTMENT"],_p["PTD"]["OUTSOURCE"]));
	tbl.appendChild(add_prodTable_Data('',"PROG.YEARLY",_p["PTY"]["ACTUAL"]["DEPARTMENT"],_p["PTY"]["ACTUAL"]["OUTSOURCE"]));
	tbl.appendChild(add_prodTable_Data('',"LAST_Year ON-DATE",_p["LONDATE"]["DEPARTMENT"],_p["LONDATE"]["OUTSOURCE"]));
	tbl.appendChild(add_prodTable_Data('',"LAST_Year PROG.MONTHLY",_p["LPTD"]["DEPARTMENT"],_p["LPTD"]["OUTSOURCE"]));
	tbl.appendChild(add_prodTable_Data('',"LAST_Year PROG.YEARLY",_p["LPTY"]["ACTUAL"]["DEPARTMENT"],_p["LPTY"]["ACTUAL"]["OUTSOURCE"]));
	tbl.appendChild(add_prodTable_Data('',"",'',''));
	_p=null;

  rdvD.innerHTML+="<div style='padding:5px;'><br/><p style='color:rgba(205,200,200,1);font-size:9px; border-top:solid thin rgba(222,222,222,1); padding-top:5px;'>Developed By R.P.Meena, AM(System), Raigarh Area</p></div>";
  if(rdvD){
	 if(typeof scrollUptoDv=="function"){ scrollUptoDv('logo_title'); 
	 document.body.scrollTop=0; 
     document.body.style.overflow='hidden';
	 }
   }
  }/*unit-databse-loaded*/
  else{
	alert('Internal-Error:While loading Production Object in js.');  
  }
 }else{
	alert('System-Error: Popup-div is not available.'); return false;
 }
}
function Show_DESP_PARTY_Details(u_,g_,_f){ 
 _f= _f || 'DESP'; var _id=(Math.round(Math.random()*10000+5000));	
 var rdv=document.getElementById('MoreDtl_dv');
 if(typeof rdv!="undefined" && rdv!=null){
	 var avilH=window.screen.availHeight;
	 rdv.style.display='';
	 rdv.style.zIndex=2000;	
	 rdv.style.MaxHeight=(avilH-30)+'px';
	 var rdvD=document.getElementById('MoreDtl_dv_Data');
	 rdvD.innerHTML="";
   var _u=null;
   if(_f=="DESP" && document.getElementById("DESP_ARX")){
      _u=JSON.parse(document.getElementById("DESP_ARX").innerHTML);  /*unit row*/
   }
 if(typeof _u!="undefined" && typeof u_!="undefined" && typeof g_!="undefined" && typeof _u[u_][g_]!="undefined" && _u!=null){
	_u=_u[u_]; 
    
  var dv=document.createElement("div");
  	  dv.id="dv-"+_id; 
	  dv.style.padding='5px';
	  dv.style.borderBottom='solid thin rgba(242,200,24,1)';
	  if(_f=="DESP"){
	     dv.innerHTML="More <strong>DESPATCH</strong> Details of  - &nbsp;"+"UNIT: <strong>"+u_+"</strong>, GRADE: <strong> G-"+g_+"</strong>";
	  }else{
		   dv.innerHTML="More Details of  - &nbsp;"+"UNIT: <strong>"+u_+"</strong> <br/>&nbsp;";  
	  }
	  rdvD.appendChild(dv);
  var tbl=document.createElement("table");
  	  tbl.id="tbl-"+_id;
	  tbl.cellpadding='3';
	  tbl.cellspacing='3';
	  tbl.style.width='98%';
	  tbl.style.maxWidth='900px';
	  rdvD.appendChild(tbl);
	  tbl.appendChild(add_prodTable_header(['Party-Name','Particulars','Road A','Rail B','Total A+B ']));
  
	var xp=_u[g_];  
	for(var _pn in xp){ 
	var _p=xp[_pn];  
	tbl.appendChild(add_prodTable_Data(_pn,"ON-DATE",_p["ONDATE"]["ROAD"],_p["ONDATE"]["RCR"]));
	tbl.appendChild(add_prodTable_Data('',"PROG.MONTHLY",_p["PTD"]["ROAD"],_p["PTD"]["RCR"]));
	tbl.appendChild(add_prodTable_Data('',"PROG.YEARLY",_p["PTY"]["ACTUAL"]["ROAD"],_p["PTY"]["ACTUAL"]["RCR"]));
	/*tbl.appendChild(add_prodTable_Data('',"LAST_Year ON-DATE",_p["LONDATE"]["ROAD"],_p["LONDATE"]["RCR"]));
	tbl.appendChild(add_prodTable_Data('',"LAST_Year PROG.MONTHLY",_p["LPTD"]["ROAD"],_p["LPTD"]["RCR"]));
	tbl.appendChild(add_prodTable_Data('',"LAST_Year PROG.YEARLY",_p["LPTY"]["ACTUAL"]["ROAD"],_p["LPTY"]["ACTUAL"]["RCR"]));*/
	tbl.appendChild(add_prodTable_Data('',"",'',''));
	_p=null;
	}
  rdvD.innerHTML+="<div style='padding:5px;'><br/><p style='color:rgba(205,200,200,1);font-size:9px; border-top:solid thin rgba(222,222,222,1); padding-top:5px;'>Developed By R.P.Meena, AM(System), Raigarh Area</p></div>";
  if(rdvD){
	 if(typeof scrollUptoDv=="function"){ scrollUptoDv('logo_title'); 
	 document.body.scrollTop=0; 
     document.body.style.overflow='hidden';
	 }
   }
  }/*unit-databse-loaded*/
  else{
	alert('Internal-Error:While loading Production Object in js.');  
  }
 }else{
	alert('System-Error: Popup-div is not available.'); return false;
 }
}
function Show_MTR_PARTY_Details(u_,g_,_f,sr_){ 
_f=_f || 'MTR';sr_=sr_ || 'SEND';
 var _id=(Math.round(Math.random()*10000+5000));	
 var rdv=document.getElementById('MoreDtl_dv'); 
 if(typeof rdv!="undefined" && rdv!=null){
	 var avilH=window.screen.availHeight;
	 rdv.style.display='';	
	 rdv.style.zIndex=2000;
	 rdv.style.MaxHeight=(avilH-30)+'px';
	 var rdvD=document.getElementById('MoreDtl_dv_Data');
	 rdvD.innerHTML="";
   var _u=null;
   if(_f=="MTR" && document.getElementById("MTR_ARX")){ 
      _u=JSON.parse(document.getElementById("MTR_ARX").innerHTML);  /*unit row*/
   }
    console.log(_u);
    
 if(g_!=null){ g_="G-"+g_;}
 if(typeof _u!="undefined" && _u!=null && typeof u_!="undefined" && typeof g_!="undefined" && typeof _u[u_]!="undefined" ){
	var _uo={};
	var _ui={};
	if(sr_=="RECV"){
	  for(var fu in _u){
		  var t1=null;t1=_u[fu];
		for(var tu in t1){ 
			var t2=null;t2=t1[tu];
			if(tu==u_ && typeof t2!="undeinfed" && t2!=null){
				for(var g in t2){
				  if(g_==g){
					  if(typeof _ui[fu]=='undefined'){
					    _ui[fu]={};	  
					  }
					 _ui[fu][g]=t2[g];
				  }
				}
			}
		}
	  }
	}else{
		var t1=null; t1=_u[u_];
		for(var tu in t1){
			var t2=null; t2=t1[tu];
			for(var g in t2){
				  if(g_==g){
					   if(typeof _uo[tu]=='undefined'){
					    _uo[tu]={};	  
					  }
					 _uo[tu][g]=t2[g];
				  }
			}
			
		}
	}
	
  var dv=document.createElement("div");
  	  dv.id="dv-"+_id; 
	  dv.style.padding='5px';
	  dv.style.borderBottom='solid thin rgba(242,200,24,1)';
	  var SR="SENT TO ";
	  if(sr_=="RECV"){SR="RECEIVED FROM ";}
	  if(_f=="MTR"){
	     dv.innerHTML="More <strong>MINE-TRANSFER: <span style='color:rgba(186, 3, 252,1);'>"+SR+"</span> </strong> Details of  - &nbsp;"+"UNIT: <strong>"+u_+"</strong>, GRADE: <strong> "+g_+"</strong>";
	  }else{
		   dv.innerHTML="More Details of  - &nbsp;"+"UNIT: <strong>"+u_+"</strong> <br/>&nbsp;";  
	  }
	  rdvD.appendChild(dv);
  var tbl=document.createElement("table");
  	  tbl.id="tbl-"+_id;
	  tbl.cellpadding='3';
	  tbl.cellspacing='3';
	  tbl.style.width='98%';
	  tbl.style.maxWidth='900px';
	  rdvD.appendChild(tbl);
	  
  
	var _io=null;
	if(sr_=="RECV"){_io=_ui;
	   tbl.appendChild(add_prodTable_header(['FROM-UNIT','Party-Name','Particulars','Road A','Rail B','Total A+B ']));
	}else{_io=_uo;
	   tbl.appendChild(add_prodTable_header(['TO-Unit','Party-Name','Particulars','Road A','Rail B','Total A+B ']));
	}
	for(var unt in _io){ 
	var _prw=_io[unt][g_]; 
	var un="";un=unt;
	 for(var _pn in _prw){
		var _p= _prw[_pn];
	    if(_p["ONDATE"]["ROAD"]>0.000 || _p["ONDATE"]["RCR"]>0.000 || _p["PTD"]["ROAD"]>0.000 || _p["PTD"]["RCR"]>0.000 || _p["PTY"]["ACTUAL"]["ROAD"]>0.000 || _p["PTY"]["ACTUAL"]["RCR"]>0.000){
		var TRD=null; TRD=add_prodTable_Data(_pn,"ON-DATE",_p["ONDATE"]["ROAD"],_p["ONDATE"]["RCR"]);
		var TDD=null; TDD=createTD(un);
		TRD.insertBefore(TDD,TRD.childNodes[0]);
	    tbl.appendChild(TRD);
		
		var TRD=null; TRD=add_prodTable_Data('',"PROG.MONTHLY",_p["PTD"]["ROAD"],_p["PTD"]["RCR"]);
		var TDD=null; TDD=createTD('');
		TRD.insertBefore(TDD,TRD.childNodes[0]);
	    tbl.appendChild(TRD);
		
		var TRD=null; TRD=add_prodTable_Data('',"PROG.YEARLY",_p["PTY"]["ACTUAL"]["ROAD"],_p["PTY"]["ACTUAL"]["RCR"]);
		var TDD=null; TDD=createTD('');
		TRD.insertBefore(TDD,TRD.childNodes[0]);
	    tbl.appendChild(TRD);
		
		/*var TRD=null; TRD=add_prodTable_Data('',"LAST_Year ON-DATE",_p["LONDATE"]["ROAD"],_p["LONDATE"]["RCR"]);
		var TDD=null; TDD=createTD('');
		TRD.insertBefore(TDD,TRD.childNodes[0]);
	    tbl.appendChild(TRD);
	     
		var TRD=null; TRD=add_prodTable_Data('',"LAST_Year PROG.MONTHLY",_p["LPTD"]["ROAD"],_p["LPTD"]["RCR"]);
		var TDD=null; TDD=createTD('');
		TRD.insertBefore(TDD,TRD.childNodes[0]);
	    tbl.appendChild(TRD); 
		
		var TRD=null; TRD=add_prodTable_Data('',"LAST_Year PROG.YEARLY",_p["LPTY"]["ACTUAL"]["ROAD"],_p["LPTY"]["ACTUAL"]["RCR"]);
		var TDD=null; TDD=createTD('');
		TRD.insertBefore(TDD,TRD.childNodes[0]);
	    tbl.appendChild(TRD); */
		 
		 var TRD=null; TRD=add_prodTable_Data('',"",'','');
		 var TDD=null; TDD=createTD('');
		 TRD.insertBefore(TDD,TRD.childNodes[0]);
	     tbl.appendChild(TRD); 
		 
		 
	    un="";
		}
	   _p=null;
	 }
	}
  rdvD.innerHTML+="<div style='padding:5px;'><br/><p style='color:rgba(205,200,200,1);font-size:9px; border-top:solid thin rgba(222,222,222,1); padding-top:5px;'>Developed By R.P.Meena, AM(System), Raigarh Area</p></div>";
  if(rdvD){
	 if(typeof scrollUptoDv=="function"){ scrollUptoDv('logo_title'); 
	 document.body.scrollTop=0; 
     document.body.style.overflow='hidden';
	 }
   }
  }/*unit-databse-loaded*/
  else{
	alert('Internal-Error:While loading MINE-TRANSFER Object in js.');  
  }
 }else{
	alert('System-Error: Popup-div is not available.'); return false;
 }
}

function Show_MTRANS_PARTY_Details(u_,g_,_f,sr_,lo_){ 
lo_= lo_ || "";
_f=_f || 'MINE';sr_=sr_ || 'SEND';
 var _id=(Math.round(Math.random()*10000+5000));	
 var rdv=document.getElementById('MoreDtl_dv'); 
 if(typeof rdv!="undefined" && rdv!=null){
	 var avilH=window.screen.availHeight;
	 rdv.style.display='';	
	 rdv.style.zIndex=2000;
	 rdv.style.MaxHeight=(avilH-30)+'px';
	 var rdvD=document.getElementById('MoreDtl_dv_Data');
	 rdvD.innerHTML="";
   var _u=null;
   if(document.getElementById(_f+"_ARX")){ 
      _u=JSON.parse(document.getElementById(_f+"_ARX").innerHTML);  /*unit row*/
   }
  
  
 //if(g_!=null){ g_="G-"+g_;}
 if(typeof _u!="undefined" && _u!=null && typeof u_!="undefined" && typeof g_!="undefined" && typeof _u[u_]!="undefined" ){
	var _uo={};
	var _ui={};
	if(sr_=="RECV"){
	  for(var fu in _u){
		  var t1=null;t1=_u[fu];
		for(var tu in t1){ 
			var t2=null;t2=t1[tu];
			if(tu==u_ && typeof t2!="undeinfed" && t2!=null){
				for(var g in t2){
				  if(g_==g){
					  if(typeof _ui[fu]=='undefined'){
					    _ui[fu]={};	  
					  }
					 _ui[fu][g]=t2[g];
				  }
				}
			}
		}
	  }
	}else{
		var t1=null; t1=_u[u_];
		for(var tu in t1){
			var t2=null; t2=t1[tu];
			for(var g in t2){
				  if(g_==g){
					   if(typeof _uo[tu]=='undefined'){
					    _uo[tu]={};	  
					  }
					 _uo[tu][g]=t2[g];
				  }
			}
			
		}
	}
	
  var dv=document.createElement("div");
  	  dv.id="dv-"+_id; 
	  dv.style.padding='5px';
	  dv.style.borderBottom='solid thin rgba(242,200,24,1)';
	  var SR="SENT TO ";
	  if(sr_=="RECV"){SR="RECEIVED FROM ";}
	  if(_f!=""){
	     dv.innerHTML="More <strong>MINE-TRANSFER: <span style='color:rgba(186, 3, 252,1);'>"+SR+"</span> </strong> Details of  - &nbsp;"+"UNIT: <strong>"+u_+"</strong>, GRADE: <strong> G-"+g_+"</strong>";
	  }else{
		   dv.innerHTML="More Details of  - &nbsp;"+"UNIT: <strong>"+u_+"</strong> <br/>&nbsp;";  
	  }
	  rdvD.appendChild(dv);
  var tbl=document.createElement("table");
  	  tbl.id="tbl-"+_id;
	  tbl.cellpadding='3';
	  tbl.cellspacing='3';
	  tbl.style.width='98%';
	  tbl.style.maxWidth='900px';
	  rdvD.appendChild(tbl);
	  
  
	var _io=null;
	if(sr_=="RECV"){_io=_ui;
	   tbl.appendChild(add_prodTable_header(['FROM-UNIT','Party-Name','Particulars','Road A','Rail B','Total A+B ']));
	}else{_io=_uo;
	   tbl.appendChild(add_prodTable_header(['TO-Unit','Party-Name','Particulars','Road A','Rail B','Total A+B ']));
	}
	for(var unt in _io){ 
	var _prw=_io[unt][g_]; 
	var un="";un=unt;
	 for(var _pn in _prw){
		var _p= _prw[_pn];
	    if(_p[lo_+"ONDATE"]["ROAD"]>0.000 || _p[lo_+"ONDATE"]["RCR"]>0.000 || _p[lo_+"PTD"]["ROAD"]>0.000 || _p[lo_+"PTD"]["RCR"]>0.000 || _p[lo_+"PTY"]["ACTUAL"]["ROAD"]>0.000 || _p[lo_+"PTY"]["ACTUAL"]["RCR"]>0.000){
		var TRD=null; TRD=add_prodTable_Data(_pn,lo_+"ON-DATE",_p[lo_+"ONDATE"]["ROAD"],_p[lo_+"ONDATE"]["RCR"]);
		var TDD=null; TDD=createTD(un);
		TRD.insertBefore(TDD,TRD.childNodes[0]);
	    tbl.appendChild(TRD);
		
		var TRD=null; TRD=add_prodTable_Data('',lo_+"PROG.MONTHLY",_p[lo_+"PTD"]["ROAD"],_p[lo_+"PTD"]["RCR"]);
		var TDD=null; TDD=createTD('');
		TRD.insertBefore(TDD,TRD.childNodes[0]);
	    tbl.appendChild(TRD);
		
		var TRD=null; TRD=add_prodTable_Data('',lo_+"PROG.YEARLY",_p[lo_+"PTY"]["ACTUAL"]["ROAD"],_p[lo_+"PTY"]["ACTUAL"]["RCR"]);
		var TDD=null; TDD=createTD('');
		TRD.insertBefore(TDD,TRD.childNodes[0]);
	    tbl.appendChild(TRD);
		
		/*var TRD=null; TRD=add_prodTable_Data('',"LAST_Year ON-DATE",_p["LONDATE"]["ROAD"],_p["LONDATE"]["RCR"]);
		var TDD=null; TDD=createTD('');
		TRD.insertBefore(TDD,TRD.childNodes[0]);
	    tbl.appendChild(TRD);
	     
		var TRD=null; TRD=add_prodTable_Data('',"LAST_Year PROG.MONTHLY",_p["LPTD"]["ROAD"],_p["LPTD"]["RCR"]);
		var TDD=null; TDD=createTD('');
		TRD.insertBefore(TDD,TRD.childNodes[0]);
	    tbl.appendChild(TRD); 
		
		var TRD=null; TRD=add_prodTable_Data('',"LAST_Year PROG.YEARLY",_p["LPTY"]["ACTUAL"]["ROAD"],_p["LPTY"]["ACTUAL"]["RCR"]);
		var TDD=null; TDD=createTD('');
		TRD.insertBefore(TDD,TRD.childNodes[0]);
	    tbl.appendChild(TRD); */
		 
		 var TRD=null; TRD=add_prodTable_Data('',"",'','');
		 var TDD=null; TDD=createTD('');
		 TRD.insertBefore(TDD,TRD.childNodes[0]);
	     tbl.appendChild(TRD); 
		 
		 
	    un="";
		}
	   _p=null;
	 }
	}
  rdvD.innerHTML+="<div style='padding:5px;'><br/><p style='color:rgba(205,200,200,1);font-size:9px; border-top:solid thin rgba(222,222,222,1); padding-top:5px;'>Developed By R.P.Meena, AM(System), Raigarh Area</p></div>";
  if(rdvD){
	 if(typeof scrollUptoDv=="function"){ scrollUptoDv('logo_title'); 
	 document.body.scrollTop=0; 
     document.body.style.overflow='hidden';
	 }
   }
  }/*unit-databse-loaded*/
  else{
	alert('Internal-Error:While loading MINE-TRANSFER Object in js.');  
  }
 }else{
	alert('System-Error: Popup-div is not available.'); return false;
 }
}
/*print-popup-window*/
function PrintReport(rptid,Byuser,onDat){
  if(document.getElementById(rptid)){
	var mywn=window.open('', '_blank', 'toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,left=5, top=30, width=1000px, height=500px, visible=yes;');
	mywn.document.open();
	var dcs="<!DOCTYPE html><html><head>";
        dcs+="<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\" >";
        dcs+="<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
        dcs+="<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" >";
        dcs+="<link rel=\"stylesheet\" href=\"css/CIL_boot.min.css\">";
        dcs+="<title>Production, OB, Dispatch Details Portal</title>";
		dcs+="</head><body>";
		dcs+="<div class='container-fluid' style='border-bottom:solid thin #003003;' align='left'>";
		dcs+="<div style='width:99%; max-width:150px; float:left;'>";
		dcs+=(document.getElementById('hdr_img'))?document.getElementById('hdr_img').innerHTML:"";     
		dcs+="</div>";
		dcs+="<div style=\"width:99.5%;\">";
		dcs+=(document.getElementById('hdr_txt'))?document.getElementById('hdr_txt').innerHTML:"<h1 style='font-weight:900;'>SECL Raigarh Area</h1><p style='font-size:11px'>Production, OBR, Despatch Portal</p>";     
		dcs+="</div>";
		dcs+="<div class='row' style='overflow:auto; float:none;'>";
		dcs+=document.getElementById(rptid).innerHTML;
		dcs+="</div>";
		dcs+="</div>";
		dcs+="<div align='right' style='padding:5px; border-top:solid thin rgba(235,235,235,1); color:rgba(235,230,235,1); font-size:10px; '>Report Generated By : <strong>"+Byuser+"</strong> , on <strong>"+onDat+"</strong></div>";
		
		dcs+="<div align='center' style='padding:5px; border-top:solid thin rgba(235,235,235,1); '><button style=\"padding:7px; color:#003003; font-weight:900; background:rgba(25,230,255); \" id=\"pbtn_\" >&nbsp;Click to Print&nbsp;</button></div>";
		dcs+="</body></html>";
	mywn.document.write(dcs);
	mywn.document.close();
	 
	if(mywn.document.getElementById('pbtn_')){
		mywn.document.getElementById('pbtn_').addEventListener("click", function(){
			this.style.visibility='hidden'; mywn.print();this.style.visibility='';
		});
	}
	if(mywn.document.getElementById('pbtn_')){
		mywn.document.getElementById('pbtn_').addEventListener("afterprint", function(){
			this.style.visibility='';
		});
	}
	if(mywn.document.getElementById('pbtn_')){mywn.document.getElementById('pbtn_').click();this.style.visibility='';}
	
	//mywn.print();
	return ;
  }
}
/*download reports*/
function Isdwnloaded(r,dvid){
  console.log("DOWNLOADED : ", r);
}

function dwnloadurl(urlx,ridx){ //alert(fmd.get('grades'));
  $.ajax({
           url: urlx,
           type: "GET",
		   
           success: function(datax, textStatus, jqXHR) {  
		            window.location = urlx;
		             if(document.getElementById(ridx)){
					   document.getElementById(ridx).innerHTML="<div style='background-color:rgba(20,235,20,.3); padding:8px; padding-top:15px; padding-bottom:15px; font-weight:900; border-radius:4px;'>Excel file Downloaded Successfully!&nbsp;&raquo;&nbsp;Check your Downloads folders.&nbsp;&uarr;&nbsp; Click Above Button to reload the report.</div>";
					 }
                   },
		   error: function (textStatus, jqXHR, errorThrown)	{
			       if(document.getElementById(ridx)){
					   document.getElementById(ridx).innerHTML=	'TX:'+textStatus+'<br/>jQ:'+JSON.stringify(jqXHR)+'<br/>eT:'+errorThrown;
					 }
		          }
               });	
}

function convertJsFormToQueryString(f){
	var q_="";
	f.forEach(function(vl,k){if(q_==""){q_=k+"="+vl;}else{q_+="&"+k+"="+vl;}});
	return q_;
}
function downldReport(rdv){
	if(typeof LAST_LOADED_REPORT_JsFORM!="undefined" && LAST_LOADED_REPORT_JsFORM!=null){
	  	var url_=(LAST_LOADED_REPORT_JsFORM["url"])?LAST_LOADED_REPORT_JsFORM["url"]:"";
		if(url_!=""){
			var formdt_=(LAST_LOADED_REPORT_JsFORM["formdt"])?LAST_LOADED_REPORT_JsFORM["formdt"]:null;	
			if(formdt_){
			   formdt_.append("dwnld",'yes');
			   var queryString=convertJsFormToQueryString(formdt_);
			   if(queryString && queryString!=""){
			      dwnloadurl(url_+"&"+queryString,rdv); 
			   }else{alert('Error @downldReport: Searching parameters missing\n refresh and retry!');}
			}
		}
	}
}
function _today(){
	var _DATE_ = new Date();
	var	_DATE = String(_DATE_.getDate()).padStart(2,'0') +"-"+ String(_DATE_.getMonth() + 1).padStart(2,'0') +"-"+ String(_DATE_.getFullYear());
	return _DATE;
}
function calTarget_tillMonth(u_targ,v,_dates, flg){
	var Target_TM =0;
	var dmm = parseInt(_dates[1]);
	var dyy = parseInt(_dates[2]); 
	if(typeof u_targ!="undefined" && u_targ!=null && typeof u_targ[v]!="undefined"){ 
		for(var i=1; i<=12;i++){ 
				var ddy = dyy;
				var mm = (i>0 && i<10)?"0"+i:i;
				 if(dmm ==1){
					 if(i!=2 && i!=3){
						 if(i!=1){ddy = (dyy - 1);}
						 Target_TM += (typeof u_targ[v][mm]!="undefined" && typeof u_targ[v][mm][ddy]!="undefined" && typeof u_targ[v][mm][ddy][flg]!="undefined" && typeof u_targ[v][mm][ddy][flg]["MT"]!="undefined")?parseFloat(u_targ[v][mm][ddy][flg]["MT"]):0;
					 }
				 }else if(dmm ==2){
					 if(i!=3){
						 if(i!=1 && i!=2){ddy = (dyy - 1);}
						 Target_TM += (typeof u_targ[v][mm]!="undefined" && typeof u_targ[v][mm][ddy]!="undefined" && typeof u_targ[v][mm][ddy][flg]!="undefined" && typeof u_targ[v][mm][ddy][flg]["MT"]!="undefined")?parseFloat(u_targ[v][mm][ddy][flg]["MT"]):0;
					 }
				 }else if(dmm ==3){ 
						 if(i!=1 && i!=2 && i!=3){ddy = (dyy - 1);}
						 Target_TM += (typeof u_targ[v][mm]!="undefined" && typeof u_targ[v][mm][ddy]!="undefined" && typeof u_targ[v][mm][ddy][flg]!="undefined" && typeof u_targ[v][mm][ddy][flg]["MT"]!="undefined")?parseFloat(u_targ[v][mm][ddy][flg]["MT"]):0;
					 }else{
						 if(i>3 && i<=dmm){ 
						 Target_TM += (typeof u_targ[v][mm]!="undefined" && typeof u_targ[v][mm][ddy]!="undefined" && typeof u_targ[v][mm][ddy][flg]!="undefined" && typeof u_targ[v][mm][ddy][flg]["MT"]!="undefined")?parseFloat(u_targ[v][mm][ddy][flg]["MT"]):0;             }
					 }
		 }/*forloop...*/
	}/*if...*/
	return parseFloat(Target_TM).toFixed(2);	
}
function DesignAnalysisTableAnd_show(DataJsn, keys_, rsdv, HAHA){
	var _rdv = document.getElementById(rsdv);
	if(_rdv){ 
		var REPORT_OF = ""; 
		var FLG = "", FLG_2 = "";
		var _dates = DataJsn["ONDATE"]["DATE"]; /*dd,mm,yy*/
		var _areaData = (typeof HAHA["AREA_NAME"]!="undefined" && typeof DataJsn[HAHA["AREA_NAME"]]!="undefined")?DataJsn[HAHA["AREA_NAME"]]:null;
		if(typeof _areaData=="undefined" || _areaData==null || Object.keys(_areaData).length <= 0){
			alert("No-date return from the service for this area name: "+HAHA["AREA_NAME"]);
			return false;
		}
		
		console.log(DataJsn, keys_);
		
		if(typeof DataJsn !="undefined" && keys_.length>0){
			/************* COAL - PRODUCTION - ANALYSIS *************************************/	
				 REPORT_OF = "COAL PRODUCTION"; 
				 FLG = "PROD";
				 FLG_2 = "PRODUCTION";
			var _tbl = document.createElement("TABLE");
				_tbl.id = "_"+FLG+"_";
				_rdv.innerHTML="";
			    _rdv.appendChild(_tbl);
				_tbl.style.width='99%';
				//_tbl.style.fontWeight=900;
				_tbl.setAttribute("cellpadding",'4');
				_tbl.setAttribute("cellspacing",'4');
				var _tr0 = document.createElement("TR");
					_tbl.appendChild(_tr0);
					var _td0 = document.createElement("TD");
						_tr0.appendChild(_td0);
						_td0.setAttribute("colspan",19);
						_td0.style.border="solid thin #E0E0F0";
						_td0.style.textAlign="center"; 
						_td0.innerHTML="<h4 style='font-weight:900;'>ANALYSIS SHEET FOR COAL PRODUCTION AS ON "+ _dates.join(".") +" OF RAIGARH AREA</h4>";
						
				var _tr1 = document.createElement("TR");
					_tbl.appendChild(_tr1);
					var _td10_OSP = document.createElement("TD");
						_tr1.appendChild(_td10_OSP);  
						_td10_OSP.style.padding="4px";
						_td10_OSP.style.border="solid thin #E0E0F0";
						_td10_OSP.style.textAlign="center"; 
						_td10_OSP.innerHTML = REPORT_OF;
					var _td10 = document.createElement("TD");
						_tr1.appendChild(_td10);
						_td10.setAttribute("colspan",2); 
						_td10.style.padding="4px";
						_td10.style.border="solid thin #E0E0F0";
						_td10.style.textAlign="center"; 
						_td10.innerHTML = "APP TARGET";
					
					var _td11 = document.createElement("TD");
						_tr1.appendChild(_td11);
						_td11.setAttribute("colspan",2); 
						_td11.style.padding="4px";
						_td11.style.border="solid thin #E0E0F0";
						_td11.style.textAlign="center"; 
						_td11.innerHTML = "ON DATE PROD";	
						
					var _td12 = document.createElement("TD");
						_tr1.appendChild(_td12);
						_td12.setAttribute("colspan",4); 
						_td12.style.padding="4px";
						_td12.style.border="solid thin #E0E0F0";
						_td12.style.textAlign="center"; 
						_td12.innerHTML = "MONTHLY PROG.";
					
					var _td13 = document.createElement("TD");
						_tr1.appendChild(_td13);
						_td13.setAttribute("colspan",4); 
						_td13.style.padding="4px";
						_td13.style.border="solid thin #E0E0F0";
						_td13.style.textAlign="center"; 
						_td13.innerHTML = "YEARLY PROG.";		
						
					var _td14 = document.createElement("TD");
						_tr1.appendChild(_td14);
						_td14.setAttribute("colspan",2); 
						_td14.style.padding="4px";
						_td14.style.border="solid thin #E0E0F0";
						_td14.style.textAlign="center"; 
						_td14.innerHTML = "SHORT/SURP";	
						
					var _td15 = document.createElement("TD");
						_tr1.appendChild(_td15);  
						_td15.style.padding="4px";
						_td15.style.textAlign="center"; 
						_td15.style.border="solid thin #E0E0F0";
						_td15.innerHTML = "ANNUAL";	
						
					var _td16 = document.createElement("TD");
						_tr1.appendChild(_td16);  
						_td16.style.padding="4px";
						_td16.style.textAlign="center"; 
						_td16.style.border="solid thin #E0E0F0";
						_td16.innerHTML = "% ACHIEVED";	
						
					var _td17 = document.createElement("TD");
						_tr1.appendChild(_td17);  
						_td17.style.padding="4px";
						_td17.style.border="solid thin #E0E0F0";
						_td17.style.textAlign="center"; 
						_td17.innerHTML = "MONTHLY ASKING";
							
					var _td18 = document.createElement("TD");
						_tr1.appendChild(_td18);  
						_td18.style.padding="4px";
						_td18.style.border="solid thin #E0E0F0";
						_td18.style.textAlign="center"; 
						_td18.innerHTML = "YEARLY ASKING";						
								
						
				var _tr2 = document.createElement("TR");
					_tbl.appendChild(_tr2);
					var _td20_MINE = document.createElement("TD");
						_tr2.appendChild(_td20_MINE); 
						_td20_MINE.style.padding="4px";
						_td20_MINE.style.border="solid thin #E0E0F0";
						_td20_MINE.style.textAlign="center"; 
						_td20_MINE.innerHTML = "MINE";
					
					var _td20 = document.createElement("TD");
						_tr2.appendChild(_td20); 
						_td20.style.padding="4px";
						_td20.style.border="solid thin #E0E0F0";
						_td20.style.textAlign="center"; 
						_td20.innerHTML = "FOR MONTH";
					
					var _td21 = document.createElement("TD");
						_tr2.appendChild(_td21); 
						_td21.style.padding="4px";
						_td21.style.border="solid thin #E0E0F0";
						_td21.style.textAlign="center"; 
						_td21.innerHTML = "TPD";	
						
				var _td22 = document.createElement("TD");
						_tr2.appendChild(_td22); 
						_td22.style.padding="4px";
						_td22.style.textAlign="center"; 
						_td22.style.border="solid thin #E0E0F0";
						_td22.innerHTML = "THIS YR";			
							
				var _td23 = document.createElement("TD");
						_tr2.appendChild(_td23); 
						_td23.style.padding="4px";
						_td23.style.textAlign="center";
						_td23.style.border="solid thin #E0E0F0"; 
						_td23.innerHTML = "LAST YR";			
				
				var _td24 = document.createElement("TD");
						_tr2.appendChild(_td24); 
						_td24.style.padding="4px";
						_td24.style.textAlign="center"; 
						_td24.style.border="solid thin #E0E0F0";
						_td24.innerHTML = "THIS YR";			
							
				var _td25 = document.createElement("TD");
						_tr2.appendChild(_td25); 
						_td25.style.padding="4px";
						_td25.style.textAlign="center"; 
						_td25.style.border="solid thin #E0E0F0";
						_td25.innerHTML = "TPD";			
				
				
				var _td26 = document.createElement("TD");
						_tr2.appendChild(_td26); 
						_td26.style.padding="4px";
						_td26.style.textAlign="center"; 
						_td26.style.border="solid thin #E0E0F0";
						_td26.innerHTML = "LAST YR";			
							
				var _td27 = document.createElement("TD");
						_tr2.appendChild(_td27); 
						_td27.style.padding="4px";
						_td27.style.border="solid thin #E0E0F0";
						_td27.style.textAlign="center"; 
						_td27.innerHTML = "TPD";			
					
				var _td28 = document.createElement("TD");
						_tr2.appendChild(_td28); 
						_td28.style.padding="4px";
						_td28.style.textAlign="center"; 
						_td28.style.border="solid thin #E0E0F0";
						_td28.innerHTML = "TRGT TILL DATE";			
							
				var _td29 = document.createElement("TD");
						_tr2.appendChild(_td29); 
						_td29.style.padding="4px";
						_td29.style.textAlign="center"; 
						_td29.style.border="solid thin #E0E0F0";
						_td29.innerHTML = "ACTL THIS YEAR";			
				
				
				var _td210 = document.createElement("TD");
						_tr2.appendChild(_td210); 
						_td210.style.padding="4px";
						_td210.style.border="solid thin #E0E0F0";
						_td210.style.textAlign="center"; 
						_td210.innerHTML = "ACTL LAST YR";			
							
				var _td211 = document.createElement("TD");
						_tr2.appendChild(_td211); 
						_td211.style.padding="4px";
						_td211.style.textAlign="center"; 
						_td211.style.border="solid thin #E0E0F0";
						_td211.innerHTML = "% GROWTH OVR LYr";	 
					
				var _td212 = document.createElement("TD");
						_tr2.appendChild(_td212); 
						_td212.style.padding="4px";
						_td212.style.textAlign="center"; 
						_td212.style.border="solid thin #E0E0F0";
						_td212.innerHTML = "WRT APP TGT";			
							
				var _td213 = document.createElement("TD");
						_tr2.appendChild(_td213); 
						_td213.style.padding="4px";
						_td213.style.textAlign="center"; 
						_td213.style.border="solid thin #E0E0F0";
						_td213.innerHTML = "WRT LAST YEAR";			
				
				
				var _td214 = document.createElement("TD");
						_tr2.appendChild(_td214); 
						_td214.style.padding="4px";
						_td214.style.textAlign="center"; 
						_td214.style.border="solid thin #E0E0F0";
						_td214.innerHTML = "AAP TARGET";			
							
				var _td215 = document.createElement("TD");
						_tr2.appendChild(_td215); 
						_td215.style.padding="4px";
						_td215.style.textAlign="center"; 
						_td215.style.border="solid thin #E0E0F0";
						_td215.innerHTML = "WRT AAP TGT";
						
				var _td216 = document.createElement("TD");
						_tr2.appendChild(_td216); 
						_td216.style.padding="4px";
						_td216.style.textAlign="center"; 
						_td216.style.border="solid thin #E0E0F0";
						_td216.innerHTML = "RATE FOR AAP";			
							
				var _td217 = document.createElement("TD");
						_tr2.appendChild(_td217); 
						_td217.style.padding="4px";
						_td217.style.border="solid thin #E0E0F0";
						_td217.style.textAlign="center"; 
						_td217.innerHTML = "RATE FOR AAP";
						
				/*======================================================*/		
				/*      SHOW UNITS WISE DATA                            */
				/*======================================================*/	
				if(typeof HAHA["AREA_NAME"]!="undefined" && typeof DataJsn["TARGETS"]!="undefined"){ 
					var units_	= Object.keys(DataJsn["TARGETS"]);
					var Targets_arr = DataJsn["TARGETS"];
					var AreaTotal = []; 
					 units_.forEach(function(v,i,arr){
						 if(typeof Targets_arr[v]!="undefined" && Object.keys(Targets_arr[v]).length>1){ 
						 
									var _tr2 = document.createElement("TR");
										_tbl.appendChild(_tr2);
										var _td20_MINE = document.createElement("TD");
											_tr2.appendChild(_td20_MINE); 
											_td20_MINE.style.padding="4px";
											_td20_MINE.style.border="solid thin #E0E0F0";
											_td20_MINE.style.textAlign="left"; 
											_td20_MINE.innerHTML = "<strong>"+Targets_arr[v]["NAME"]+"</strong> ("+v+")";
										AreaTotal[0] = HAHA["AREA_NAME"];
										
										var u_targ = (typeof Targets_arr[v][_dates[1]]!="undefined" && typeof Targets_arr[v][_dates[1]][_dates[2]]!="undefined" && typeof Targets_arr[v][_dates[1]][_dates[2]][FLG]!="undefined")?Targets_arr[v][_dates[1]][_dates[2]][FLG]:null;
										var B4 = (u_targ!=null && typeof u_targ["MT"]!="undefined")?u_targ["MT"]:0; 
										
										var _td20 = document.createElement("TD");
											_tr2.appendChild(_td20); 
											_td20.style.padding="4px";
											_td20.style.border="solid thin #E0E0F0";
											_td20.style.textAlign="center"; 
											_td20.innerHTML = B4;
											AreaTotal[1] = (typeof AreaTotal[1]!="undefined" && AreaTotal[1]>0)?(parseFloat(AreaTotal[1]) + parseFloat(B4)):parseFloat(B4);
										
										var _td21 = document.createElement("TD");
											_tr2.appendChild(_td21); 
											_td21.style.padding="4px";
											_td21.style.border="solid thin #E0E0F0";
											_td21.style.textAlign="center"; 
											var TPD = (u_targ!=null && typeof u_targ["MT"]!="undefined" && typeof u_targ["WD"]!="undefined" && u_targ["WD"]>0)?parseFloat(u_targ["MT"] / u_targ["WD"]).toFixed(2):0;
											_td21.innerHTML = TPD;	
											AreaTotal[2] = (typeof AreaTotal[2]!="undefined" && AreaTotal[2]>0)?(parseFloat(AreaTotal[2]) + parseFloat(TPD)):parseFloat(TPD);
											
									var u_prod = (typeof _areaData[v]!="undefined" && typeof _areaData[v][FLG_2]!="undefined")?_areaData[v][FLG_2]:null;		
									var _td22 = document.createElement("TD");
											_tr2.appendChild(_td22); 
											_td22.style.padding="4px";
											_td22.style.textAlign="center"; 
											_td22.style.border="solid thin #E0E0F0";
											var OND_ = (u_prod!=null && typeof u_prod["OD"]!="undefined")?parseFloat(u_prod["OD"]).toFixed(2):0;			
											_td22.innerHTML = OND_;
											AreaTotal[3] = (typeof AreaTotal[3]!="undefined" && AreaTotal[3]>0)?(parseFloat(AreaTotal[3]) + parseFloat(OND_)):parseFloat(OND_);
												
									var _td23 = document.createElement("TD");
											_tr2.appendChild(_td23); 
											_td23.style.padding="4px";
											_td23.style.textAlign="center";
											_td23.style.border="solid thin #E0E0F0"; 
											var LOND_ = (u_prod!=null && typeof u_prod["LOD"]!="undefined")?parseFloat(u_prod["LOD"]).toFixed(2):0; 
											_td23.innerHTML = LOND_;
											AreaTotal[4] = (typeof AreaTotal[4]!="undefined" && AreaTotal[4]>0)?(parseFloat(AreaTotal[4]) + parseFloat(LOND_)):parseFloat(LOND_);
									var F4 = (u_prod!=null && typeof u_prod["PM"]!="undefined")?parseFloat(u_prod["PM"]).toFixed(2):0;
									var _td24 = document.createElement("TD");
											_tr2.appendChild(_td24); 
											_td24.style.padding="4px";
											_td24.style.textAlign="center"; 
											_td24.style.border="solid thin #E0E0F0";
											_td24.innerHTML = F4;
											AreaTotal[5] = (typeof AreaTotal[5]!="undefined" && AreaTotal[5]>0)?(parseFloat(AreaTotal[5]) + parseFloat(F4)):parseFloat(F4);
												
									var _td25 = document.createElement("TD");
											_tr2.appendChild(_td25); 
											_td25.style.padding="4px";
											_td25.style.textAlign="center"; 
											_td25.style.border="solid thin #E0E0F0";
											var MTPD_ = (u_prod!=null && typeof u_prod["PM"]!="undefined")?parseFloat(u_prod["PM"] / parseInt(_dates[0])).toFixed(2):0;
											_td25.innerHTML = MTPD_;
											AreaTotal[6] = (typeof AreaTotal[6]!="undefined" && AreaTotal[6]>0)?(parseFloat(AreaTotal[6]) + parseFloat(MTPD_)):parseFloat(MTPD_); 			
									
									
									var _td26 = document.createElement("TD");
											_tr2.appendChild(_td26); 
											_td26.style.padding="4px";
											_td26.style.textAlign="center"; 
											_td26.style.border="solid thin #E0E0F0";
											var LF4 = (u_prod!=null && typeof u_prod["LPM"]!="undefined")?parseFloat(u_prod["LPM"]).toFixed(2):0;	
											_td26.innerHTML = LF4;
											AreaTotal[7] = (typeof AreaTotal[7]!="undefined" && AreaTotal[7]>0)?(parseFloat(AreaTotal[7]) + parseFloat(LF4)):parseFloat(LF4);
												
									var _td27 = document.createElement("TD");
											_tr2.appendChild(_td27); 
											_td27.style.padding="4px";
											_td27.style.border="solid thin #E0E0F0";
											_td27.style.textAlign="center"; 
											var LMTPD_ = (u_prod!=null && typeof u_prod["LPM"]!="undefined")?parseFloat(u_prod["LPM"] / parseInt(_dates[0])).toFixed(2):0;	
											_td27.innerHTML = LMTPD_;
											
											AreaTotal[8] = (typeof AreaTotal[8]!="undefined" && AreaTotal[8]>0)?(parseFloat(AreaTotal[8]) + parseFloat(LMTPD_)):parseFloat(LMTPD_);
													
									var J4 = calTarget_tillMonth(Targets_arr,v,_dates, FLG);	
									var _td28 = document.createElement("TD");
											_tr2.appendChild(_td28); 
											_td28.style.padding="4px";
											_td28.style.textAlign="center"; 
											_td28.style.border="solid thin #E0E0F0";
											_td28.innerHTML = J4;
											AreaTotal[9] = (typeof AreaTotal[9]!="undefined" && AreaTotal[9]>0)?(parseFloat(AreaTotal[9]) + parseFloat(J4)):parseFloat(J4);			
									
									var K4 = (u_prod!=null && typeof u_prod["PY"]!="undefined")?parseFloat(u_prod["PY"]).toFixed(2):0;			
									var _td29 = document.createElement("TD");
											_tr2.appendChild(_td29); 
											_td29.style.padding="4px";
											_td29.style.textAlign="center"; 
											_td29.style.border="solid thin #E0E0F0";
											_td29.innerHTML = K4;
											AreaTotal[10] = (typeof AreaTotal[10]!="undefined" && AreaTotal[10]>0)?(parseFloat(AreaTotal[10]) + parseFloat(K4)):parseFloat(K4);	
									
									var L4 = (u_prod!=null && typeof u_prod["LPY"]!="undefined")?parseFloat(u_prod["LPY"]).toFixed(2):0;		
									var _td210 = document.createElement("TD");
											_tr2.appendChild(_td210); 
											_td210.style.padding="4px";
											_td210.style.border="solid thin #E0E0F0";
											_td210.style.textAlign="center"; 
											_td210.innerHTML = L4;
											AreaTotal[11] = (typeof AreaTotal[11]!="undefined" && AreaTotal[11]>0)?(parseFloat(AreaTotal[11]) + parseFloat(L4)):parseFloat(L4);
									
									var _td211 = document.createElement("TD");
											_tr2.appendChild(_td211); 
											_td211.style.padding="4px";
											_td211.style.textAlign="center"; 
											_td211.style.border="solid thin #E0E0F0";
											var M4 = ((L4>0)?(((parseFloat(K4) - parseFloat(L4)) / parseFloat(K4))*100).toFixed(2):0) + " %";	 
											_td211.innerHTML = M4;
											AreaTotal[12] = (typeof AreaTotal[12]!="undefined" && AreaTotal[12]>0)?(parseFloat(AreaTotal[12]) + parseFloat(M4)):parseFloat(M4);
										
									var _td212 = document.createElement("TD");
											_tr2.appendChild(_td212); 
											_td212.style.padding="4px";
											_td212.style.textAlign="center"; 
											_td212.style.border="solid thin #E0E0F0";
											var N4 = (parseFloat(K4) - parseFloat(J4)).toFixed(2);
											_td212.innerHTML = N4;
											AreaTotal[13] = (typeof AreaTotal[13]!="undefined" && AreaTotal[13]>0)?(parseFloat(AreaTotal[13]) + parseFloat(N4)):parseFloat(N4);			
												
									var _td213 = document.createElement("TD");
											_tr2.appendChild(_td213); 
											_td213.style.padding="4px";
											_td213.style.textAlign="center"; 
											_td213.style.border="solid thin #E0E0F0";
											var O4 = (parseFloat(K4) - parseFloat(L4)).toFixed(2);
											_td213.innerHTML = O4;	
											AreaTotal[14] = (typeof AreaTotal[14]!="undefined" && AreaTotal[14]>0)?(parseFloat(AreaTotal[14]) + parseFloat(O4)):parseFloat(O4);		
									
									var P4 = (u_targ!=null && typeof u_targ["YT"]!="undefined")?u_targ["YT"]:0;			
									var _td214 = document.createElement("TD");
											_tr2.appendChild(_td214); 
											_td214.style.padding="4px";
											_td214.style.textAlign="center"; 
											_td214.style.border="solid thin #E0E0F0";
											_td214.innerHTML = P4;
											AreaTotal[15] = (typeof AreaTotal[15]!="undefined" && AreaTotal[15]>0)?(parseFloat(AreaTotal[15]) + parseFloat(P4)):parseFloat(P4);
												
									var _td215 = document.createElement("TD");
											_tr2.appendChild(_td215); 
											_td215.style.padding="4px";
											_td215.style.textAlign="center"; 
											_td215.style.border="solid thin #E0E0F0";
											var Q4 = ((J4>0)?((parseFloat(K4)/parseFloat(J4))*100).toFixed(2) :0) + " %";
											_td215.innerHTML = Q4;
											AreaTotal[16] = (typeof AreaTotal[16]!="undefined" && AreaTotal[16]>0)?(parseFloat(AreaTotal[16]) + parseFloat(Q4)):parseFloat(Q4);
											
									var Left_WD_InMonth = (typeof DataJsn["ONDATE"]["LMD"]!="undefined")?parseInt(DataJsn["ONDATE"]["LMD"]):0;		
									var _td216 = document.createElement("TD");
											_tr2.appendChild(_td216); 
											_td216.style.padding="4px";
											_td216.style.textAlign="center"; 
											_td216.style.border="solid thin #E0E0F0";
											var R4 = (Left_WD_InMonth>0)?parseFloat((parseFloat(B4) - parseFloat(F4)) / Left_WD_InMonth).toFixed(2):0;	
											_td216.innerHTML = R4;
											AreaTotal[17] = (typeof AreaTotal[17]!="undefined" && AreaTotal[17]>0)?(parseFloat(AreaTotal[17]) + parseFloat(R4)):parseFloat(R4);
													
									var Left_WD_InYear = (typeof DataJsn["ONDATE"]["LYD"]!="undefined")?parseInt(DataJsn["ONDATE"]["LYD"]):0;		
									var _td217 = document.createElement("TD");
											_tr2.appendChild(_td217); 
											_td217.style.padding="4px";
											_td217.style.border="solid thin #E0E0F0";
											_td217.style.textAlign="center"; 
											var S4 = (Left_WD_InYear>0)?parseFloat((parseFloat(P4) - parseFloat(K4)) / Left_WD_InYear).toFixed(2):0;	
											_td217.innerHTML = S4; 
											AreaTotal[18] = (typeof AreaTotal[18]!="undefined" && AreaTotal[18]>0)?(parseFloat(AreaTotal[18]) + parseFloat(S4)):parseFloat(S4);
													
						 }
					 });
					 /*Area Total-row adding ....*/
					 var _tr2 = document.createElement("TR");
						 _tbl.appendChild(_tr2);
					 AreaTotal.forEach(function(v,i,arr){
						  var _td20_MINE = document.createElement("TD");
							  _tr2.appendChild(_td20_MINE); 
							  _td20_MINE.style.padding="6px";
							  _td20_MINE.style.border="solid thin #E0E0F0";
							  _td20_MINE.style.textAlign="center"; 
							  _td20_MINE.style.fontWeight = 900;
							  _td20_MINE.innerHTML = (i>0)?parseFloat(v).toFixed(2):v
					 });
				}/*...if(typeof HAHA["AREA_NAME"]!*/
			/************* END - OF - COAL - PRODUCTION - ANALYSIS *************************************/	
			
			 
			
			
		    /************* OBR - REMOVAL - ANALYSIS *************************************/	
				REPORT_OF = "OBR REMOVAL"; 
				 FLG = "OBR";
				 FLG_2 = "OBR";
			    _tbl = document.createElement("TABLE");
				_tbl.id = "_"+FLG+"_";
				_rdv.innerHTML+="<p style='border:none;'>&nbsp;<br/>&nbsp;</p>";
			    _rdv.appendChild(_tbl);
				_tbl.style.width='99%';
				//_tbl.style.fontWeight=900;
				_tbl.setAttribute("cellpadding",'4');
				_tbl.setAttribute("cellspacing",'4');
				var _tr0 = document.createElement("TR");
					_tbl.appendChild(_tr0);
					var _td0 = document.createElement("TD");
						_tr0.appendChild(_td0);
						_td0.setAttribute("colspan",19);
						_td0.style.border="solid thin #E0E0F0";
						_td0.style.textAlign="center"; 
						_td0.innerHTML="<h4 style='font-weight:900;'>ANALYSIS SHEET FOR OBR REMOVAL AS ON "+ _dates.join(".") +" OF RAIGARH AREA</h4>";
						
				var _tr1 = document.createElement("TR");
					_tbl.appendChild(_tr1);
					var _td10_OSP = document.createElement("TD");
						_tr1.appendChild(_td10_OSP);  
						_td10_OSP.style.padding="4px";
						_td10_OSP.style.border="solid thin #E0E0F0";
						_td10_OSP.style.textAlign="center"; 
						_td10_OSP.innerHTML = REPORT_OF;
					var _td10 = document.createElement("TD");
						_tr1.appendChild(_td10);
						_td10.setAttribute("colspan",2); 
						_td10.style.padding="4px";
						_td10.style.border="solid thin #E0E0F0";
						_td10.style.textAlign="center"; 
						_td10.innerHTML = "APP TARGET";
					
					var _td11 = document.createElement("TD");
						_tr1.appendChild(_td11);
						_td11.setAttribute("colspan",2); 
						_td11.style.padding="4px";
						_td11.style.border="solid thin #E0E0F0";
						_td11.style.textAlign="center"; 
						_td11.innerHTML = "ON DATE PROD";	
						
					var _td12 = document.createElement("TD");
						_tr1.appendChild(_td12);
						_td12.setAttribute("colspan",4); 
						_td12.style.padding="4px";
						_td12.style.border="solid thin #E0E0F0";
						_td12.style.textAlign="center"; 
						_td12.innerHTML = "MONTHLY PROG.";
					
					var _td13 = document.createElement("TD");
						_tr1.appendChild(_td13);
						_td13.setAttribute("colspan",4); 
						_td13.style.padding="4px";
						_td13.style.border="solid thin #E0E0F0";
						_td13.style.textAlign="center"; 
						_td13.innerHTML = "YEARLY PROG.";		
						
					var _td14 = document.createElement("TD");
						_tr1.appendChild(_td14);
						_td14.setAttribute("colspan",2); 
						_td14.style.padding="4px";
						_td14.style.border="solid thin #E0E0F0";
						_td14.style.textAlign="center"; 
						_td14.innerHTML = "SHORT/SURP";	
						
					var _td15 = document.createElement("TD");
						_tr1.appendChild(_td15);  
						_td15.style.padding="4px";
						_td15.style.textAlign="center"; 
						_td15.style.border="solid thin #E0E0F0";
						_td15.innerHTML = "ANNUAL";	
						
					var _td16 = document.createElement("TD");
						_tr1.appendChild(_td16);  
						_td16.style.padding="4px";
						_td16.style.textAlign="center"; 
						_td16.style.border="solid thin #E0E0F0";
						_td16.innerHTML = "% ACHIEVED";	
						
					var _td17 = document.createElement("TD");
						_tr1.appendChild(_td17);  
						_td17.style.padding="4px";
						_td17.style.border="solid thin #E0E0F0";
						_td17.style.textAlign="center"; 
						_td17.innerHTML = "MONTHLY ASKING";
							
					var _td18 = document.createElement("TD");
						_tr1.appendChild(_td18);  
						_td18.style.padding="4px";
						_td18.style.border="solid thin #E0E0F0";
						_td18.style.textAlign="center"; 
						_td18.innerHTML = "YEARLY ASKING";						
								
						
				var _tr2 = document.createElement("TR");
					_tbl.appendChild(_tr2);
					var _td20_MINE = document.createElement("TD");
						_tr2.appendChild(_td20_MINE); 
						_td20_MINE.style.padding="4px";
						_td20_MINE.style.border="solid thin #E0E0F0";
						_td20_MINE.style.textAlign="center"; 
						_td20_MINE.innerHTML = "MINE";
					
					var _td20 = document.createElement("TD");
						_tr2.appendChild(_td20); 
						_td20.style.padding="4px";
						_td20.style.border="solid thin #E0E0F0";
						_td20.style.textAlign="center"; 
						_td20.innerHTML = "FOR MONTH";
					
					var _td21 = document.createElement("TD");
						_tr2.appendChild(_td21); 
						_td21.style.padding="4px";
						_td21.style.border="solid thin #E0E0F0";
						_td21.style.textAlign="center"; 
						_td21.innerHTML = "TPD";	
						
				var _td22 = document.createElement("TD");
						_tr2.appendChild(_td22); 
						_td22.style.padding="4px";
						_td22.style.textAlign="center"; 
						_td22.style.border="solid thin #E0E0F0";
						_td22.innerHTML = "THIS YR";			
							
				var _td23 = document.createElement("TD");
						_tr2.appendChild(_td23); 
						_td23.style.padding="4px";
						_td23.style.textAlign="center";
						_td23.style.border="solid thin #E0E0F0"; 
						_td23.innerHTML = "LAST YR";			
				
				var _td24 = document.createElement("TD");
						_tr2.appendChild(_td24); 
						_td24.style.padding="4px";
						_td24.style.textAlign="center"; 
						_td24.style.border="solid thin #E0E0F0";
						_td24.innerHTML = "THIS YR";			
							
				var _td25 = document.createElement("TD");
						_tr2.appendChild(_td25); 
						_td25.style.padding="4px";
						_td25.style.textAlign="center"; 
						_td25.style.border="solid thin #E0E0F0";
						_td25.innerHTML = "TPD";			
				
				
				var _td26 = document.createElement("TD");
						_tr2.appendChild(_td26); 
						_td26.style.padding="4px";
						_td26.style.textAlign="center"; 
						_td26.style.border="solid thin #E0E0F0";
						_td26.innerHTML = "LAST YR";			
							
				var _td27 = document.createElement("TD");
						_tr2.appendChild(_td27); 
						_td27.style.padding="4px";
						_td27.style.border="solid thin #E0E0F0";
						_td27.style.textAlign="center"; 
						_td27.innerHTML = "TPD";			
					
				var _td28 = document.createElement("TD");
						_tr2.appendChild(_td28); 
						_td28.style.padding="4px";
						_td28.style.textAlign="center"; 
						_td28.style.border="solid thin #E0E0F0";
						_td28.innerHTML = "TRGT TILL DATE";			
							
				var _td29 = document.createElement("TD");
						_tr2.appendChild(_td29); 
						_td29.style.padding="4px";
						_td29.style.textAlign="center"; 
						_td29.style.border="solid thin #E0E0F0";
						_td29.innerHTML = "ACTL THIS YEAR";			
				
				
				var _td210 = document.createElement("TD");
						_tr2.appendChild(_td210); 
						_td210.style.padding="4px";
						_td210.style.border="solid thin #E0E0F0";
						_td210.style.textAlign="center"; 
						_td210.innerHTML = "ACTL LAST YR";			
							
				var _td211 = document.createElement("TD");
						_tr2.appendChild(_td211); 
						_td211.style.padding="4px";
						_td211.style.textAlign="center"; 
						_td211.style.border="solid thin #E0E0F0";
						_td211.innerHTML = "% GROWTH OVR LYr";	 
					
				var _td212 = document.createElement("TD");
						_tr2.appendChild(_td212); 
						_td212.style.padding="4px";
						_td212.style.textAlign="center"; 
						_td212.style.border="solid thin #E0E0F0";
						_td212.innerHTML = "WRT APP TGT";			
							
				var _td213 = document.createElement("TD");
						_tr2.appendChild(_td213); 
						_td213.style.padding="4px";
						_td213.style.textAlign="center"; 
						_td213.style.border="solid thin #E0E0F0";
						_td213.innerHTML = "WRT LAST YEAR";			
				
				
				var _td214 = document.createElement("TD");
						_tr2.appendChild(_td214); 
						_td214.style.padding="4px";
						_td214.style.textAlign="center"; 
						_td214.style.border="solid thin #E0E0F0";
						_td214.innerHTML = "AAP TARGET";			
							
				var _td215 = document.createElement("TD");
						_tr2.appendChild(_td215); 
						_td215.style.padding="4px";
						_td215.style.textAlign="center"; 
						_td215.style.border="solid thin #E0E0F0";
						_td215.innerHTML = "WRT AAP TGT";
						
				var _td216 = document.createElement("TD");
						_tr2.appendChild(_td216); 
						_td216.style.padding="4px";
						_td216.style.textAlign="center"; 
						_td216.style.border="solid thin #E0E0F0";
						_td216.innerHTML = "RATE FOR AAP";			
							
				var _td217 = document.createElement("TD");
						_tr2.appendChild(_td217); 
						_td217.style.padding="4px";
						_td217.style.border="solid thin #E0E0F0";
						_td217.style.textAlign="center"; 
						_td217.innerHTML = "RATE FOR AAP";
						
				/*======================================================*/		
				/*      SHOW UNITS WISE DATA                            */
				/*======================================================*/	
				if(typeof HAHA["AREA_NAME"]!="undefined" && typeof DataJsn["TARGETS"]!="undefined"){ 
					var units_	= Object.keys(DataJsn["TARGETS"]);
					var Targets_arr = DataJsn["TARGETS"];
					var AreaTotal = []; 
					 units_.forEach(function(v,i,arr){
						 if(typeof Targets_arr[v]!="undefined" && Object.keys(Targets_arr[v]).length>1){ 
						 
									var _tr2 = document.createElement("TR");
										_tbl.appendChild(_tr2);
										var _td20_MINE = document.createElement("TD");
											_tr2.appendChild(_td20_MINE); 
											_td20_MINE.style.padding="4px";
											_td20_MINE.style.border="solid thin #E0E0F0";
											_td20_MINE.style.textAlign="left"; 
											_td20_MINE.innerHTML = "<strong>"+Targets_arr[v]["NAME"]+"</strong> ("+v+")";
										AreaTotal[0] = HAHA["AREA_NAME"];
										
										var u_targ = (typeof Targets_arr[v][_dates[1]]!="undefined" && typeof Targets_arr[v][_dates[1]][_dates[2]]!="undefined" && typeof Targets_arr[v][_dates[1]][_dates[2]][FLG]!="undefined")?Targets_arr[v][_dates[1]][_dates[2]][FLG]:null;
										var B4 = (u_targ!=null && typeof u_targ["MT"]!="undefined")?u_targ["MT"]:0; 
										
										var _td20 = document.createElement("TD");
											_tr2.appendChild(_td20); 
											_td20.style.padding="4px";
											_td20.style.border="solid thin #E0E0F0";
											_td20.style.textAlign="center"; 
											_td20.innerHTML = B4;
											AreaTotal[1] = (typeof AreaTotal[1]!="undefined" && AreaTotal[1]>0)?(parseFloat(AreaTotal[1]) + parseFloat(B4)):parseFloat(B4);
										
										var _td21 = document.createElement("TD");
											_tr2.appendChild(_td21); 
											_td21.style.padding="4px";
											_td21.style.border="solid thin #E0E0F0";
											_td21.style.textAlign="center"; 
											var TPD = (u_targ!=null && typeof u_targ["MT"]!="undefined" && typeof u_targ["WD"]!="undefined" && u_targ["WD"]>0)?parseFloat(u_targ["MT"] / u_targ["WD"]).toFixed(2):0;
											_td21.innerHTML = TPD;	
											AreaTotal[2] = (typeof AreaTotal[2]!="undefined" && AreaTotal[2]>0)?(parseFloat(AreaTotal[2]) + parseFloat(TPD)):parseFloat(TPD);
											
									var u_prod = (typeof _areaData[v]!="undefined" && typeof _areaData[v][FLG_2]!="undefined")?_areaData[v][FLG_2]:null;		
									var _td22 = document.createElement("TD");
											_tr2.appendChild(_td22); 
											_td22.style.padding="4px";
											_td22.style.textAlign="center"; 
											_td22.style.border="solid thin #E0E0F0";
											var OND_ = (u_prod!=null && typeof u_prod["OD"]!="undefined")?parseFloat(u_prod["OD"]).toFixed(2):0;			
											_td22.innerHTML = OND_;
											AreaTotal[3] = (typeof AreaTotal[3]!="undefined" && AreaTotal[3]>0)?(parseFloat(AreaTotal[3]) + parseFloat(OND_)):parseFloat(OND_);
												
									var _td23 = document.createElement("TD");
											_tr2.appendChild(_td23); 
											_td23.style.padding="4px";
											_td23.style.textAlign="center";
											_td23.style.border="solid thin #E0E0F0"; 
											var LOND_ = (u_prod!=null && typeof u_prod["LOD"]!="undefined")?parseFloat(u_prod["LOD"]).toFixed(2):0; 
											_td23.innerHTML = LOND_;
											AreaTotal[4] = (typeof AreaTotal[4]!="undefined" && AreaTotal[4]>0)?(parseFloat(AreaTotal[4]) + parseFloat(LOND_)):parseFloat(LOND_);
									var F4 = (u_prod!=null && typeof u_prod["PM"]!="undefined")?parseFloat(u_prod["PM"]).toFixed(2):0;
									var _td24 = document.createElement("TD");
											_tr2.appendChild(_td24); 
											_td24.style.padding="4px";
											_td24.style.textAlign="center"; 
											_td24.style.border="solid thin #E0E0F0";
											_td24.innerHTML = F4;
											AreaTotal[5] = (typeof AreaTotal[5]!="undefined" && AreaTotal[5]>0)?(parseFloat(AreaTotal[5]) + parseFloat(F4)):parseFloat(F4);
												
									var _td25 = document.createElement("TD");
											_tr2.appendChild(_td25); 
											_td25.style.padding="4px";
											_td25.style.textAlign="center"; 
											_td25.style.border="solid thin #E0E0F0";
											var MTPD_ = (u_prod!=null && typeof u_prod["PM"]!="undefined")?parseFloat(u_prod["PM"] / parseInt(_dates[0])).toFixed(2):0;
											_td25.innerHTML = MTPD_;
											AreaTotal[6] = (typeof AreaTotal[6]!="undefined" && AreaTotal[6]>0)?(parseFloat(AreaTotal[6]) + parseFloat(MTPD_)):parseFloat(MTPD_); 			
									
									
									var _td26 = document.createElement("TD");
											_tr2.appendChild(_td26); 
											_td26.style.padding="4px";
											_td26.style.textAlign="center"; 
											_td26.style.border="solid thin #E0E0F0";
											var LF4 = (u_prod!=null && typeof u_prod["LPM"]!="undefined")?parseFloat(u_prod["LPM"]).toFixed(2):0;	
											_td26.innerHTML = LF4;
											AreaTotal[7] = (typeof AreaTotal[7]!="undefined" && AreaTotal[7]>0)?(parseFloat(AreaTotal[7]) + parseFloat(LF4)):parseFloat(LF4);
												
									var _td27 = document.createElement("TD");
											_tr2.appendChild(_td27); 
											_td27.style.padding="4px";
											_td27.style.border="solid thin #E0E0F0";
											_td27.style.textAlign="center"; 
											var LMTPD_ = (u_prod!=null && typeof u_prod["LPM"]!="undefined")?parseFloat(u_prod["LPM"] / parseInt(_dates[0])).toFixed(2):0;	
											_td27.innerHTML = LMTPD_;
											
											AreaTotal[8] = (typeof AreaTotal[8]!="undefined" && AreaTotal[8]>0)?(parseFloat(AreaTotal[8]) + parseFloat(LMTPD_)):parseFloat(LMTPD_);
													
									var J4 = calTarget_tillMonth(Targets_arr,v,_dates, FLG);	
									var _td28 = document.createElement("TD");
											_tr2.appendChild(_td28); 
											_td28.style.padding="4px";
											_td28.style.textAlign="center"; 
											_td28.style.border="solid thin #E0E0F0";
											_td28.innerHTML = J4;
											AreaTotal[9] = (typeof AreaTotal[9]!="undefined" && AreaTotal[9]>0)?(parseFloat(AreaTotal[9]) + parseFloat(J4)):parseFloat(J4);			
									
									var K4 = (u_prod!=null && typeof u_prod["PY"]!="undefined")?parseFloat(u_prod["PY"]).toFixed(2):0;			
									var _td29 = document.createElement("TD");
											_tr2.appendChild(_td29); 
											_td29.style.padding="4px";
											_td29.style.textAlign="center"; 
											_td29.style.border="solid thin #E0E0F0";
											_td29.innerHTML = K4;
											AreaTotal[10] = (typeof AreaTotal[10]!="undefined" && AreaTotal[10]>0)?(parseFloat(AreaTotal[10]) + parseFloat(K4)):parseFloat(K4);	
									
									var L4 = (u_prod!=null && typeof u_prod["LPY"]!="undefined")?parseFloat(u_prod["LPY"]).toFixed(2):0;		
									var _td210 = document.createElement("TD");
											_tr2.appendChild(_td210); 
											_td210.style.padding="4px";
											_td210.style.border="solid thin #E0E0F0";
											_td210.style.textAlign="center"; 
											_td210.innerHTML = L4;
											AreaTotal[11] = (typeof AreaTotal[11]!="undefined" && AreaTotal[11]>0)?(parseFloat(AreaTotal[11]) + parseFloat(L4)):parseFloat(L4);
									
									var _td211 = document.createElement("TD");
											_tr2.appendChild(_td211); 
											_td211.style.padding="4px";
											_td211.style.textAlign="center"; 
											_td211.style.border="solid thin #E0E0F0";
											var M4 = ((L4>0)?(((parseFloat(K4) - parseFloat(L4)) / parseFloat(K4))*100).toFixed(2):0) + " %";	 
											_td211.innerHTML = M4;
											AreaTotal[12] = (typeof AreaTotal[12]!="undefined" && AreaTotal[12]>0)?(parseFloat(AreaTotal[12]) + parseFloat(M4)):parseFloat(M4);
										
									var _td212 = document.createElement("TD");
											_tr2.appendChild(_td212); 
											_td212.style.padding="4px";
											_td212.style.textAlign="center"; 
											_td212.style.border="solid thin #E0E0F0";
											var N4 = (parseFloat(K4) - parseFloat(J4)).toFixed(2);
											_td212.innerHTML = N4;
											AreaTotal[13] = (typeof AreaTotal[13]!="undefined" && AreaTotal[13]>0)?(parseFloat(AreaTotal[13]) + parseFloat(N4)):parseFloat(N4);			
												
									var _td213 = document.createElement("TD");
											_tr2.appendChild(_td213); 
											_td213.style.padding="4px";
											_td213.style.textAlign="center"; 
											_td213.style.border="solid thin #E0E0F0";
											var O4 = (parseFloat(K4) - parseFloat(L4)).toFixed(2);
											_td213.innerHTML = O4;	
											AreaTotal[14] = (typeof AreaTotal[14]!="undefined" && AreaTotal[14]>0)?(parseFloat(AreaTotal[14]) + parseFloat(O4)):parseFloat(O4);		
									
									var P4 = (u_targ!=null && typeof u_targ["YT"]!="undefined")?u_targ["YT"]:0;			
									var _td214 = document.createElement("TD");
											_tr2.appendChild(_td214); 
											_td214.style.padding="4px";
											_td214.style.textAlign="center"; 
											_td214.style.border="solid thin #E0E0F0";
											_td214.innerHTML = P4;
											AreaTotal[15] = (typeof AreaTotal[15]!="undefined" && AreaTotal[15]>0)?(parseFloat(AreaTotal[15]) + parseFloat(P4)):parseFloat(P4);
												
									var _td215 = document.createElement("TD");
											_tr2.appendChild(_td215); 
											_td215.style.padding="4px";
											_td215.style.textAlign="center"; 
											_td215.style.border="solid thin #E0E0F0";
											var Q4 = ((J4>0)?((parseFloat(K4)/parseFloat(J4))*100).toFixed(2) :0) + " %";
											_td215.innerHTML = Q4;
											AreaTotal[16] = (typeof AreaTotal[16]!="undefined" && AreaTotal[16]>0)?(parseFloat(AreaTotal[16]) + parseFloat(Q4)):parseFloat(Q4);
											
									var Left_WD_InMonth = (typeof DataJsn["ONDATE"]["LMD"]!="undefined")?parseInt(DataJsn["ONDATE"]["LMD"]):0;		
									var _td216 = document.createElement("TD");
											_tr2.appendChild(_td216); 
											_td216.style.padding="4px";
											_td216.style.textAlign="center"; 
											_td216.style.border="solid thin #E0E0F0";
											var R4 = (Left_WD_InMonth>0)?parseFloat((parseFloat(B4) - parseFloat(F4)) / Left_WD_InMonth).toFixed(2):0;	
											_td216.innerHTML = R4;
											AreaTotal[17] = (typeof AreaTotal[17]!="undefined" && AreaTotal[17]>0)?(parseFloat(AreaTotal[17]) + parseFloat(R4)):parseFloat(R4);
													
									var Left_WD_InYear = (typeof DataJsn["ONDATE"]["LYD"]!="undefined")?parseInt(DataJsn["ONDATE"]["LYD"]):0;		
									var _td217 = document.createElement("TD");
											_tr2.appendChild(_td217); 
											_td217.style.padding="4px";
											_td217.style.border="solid thin #E0E0F0";
											_td217.style.textAlign="center"; 
											var S4 = (Left_WD_InYear>0)?parseFloat((parseFloat(P4) - parseFloat(K4)) / Left_WD_InYear).toFixed(2):0;	
											_td217.innerHTML = S4; 
											AreaTotal[18] = (typeof AreaTotal[18]!="undefined" && AreaTotal[18]>0)?(parseFloat(AreaTotal[18]) + parseFloat(S4)):parseFloat(S4);
													
						 }
					 });
					 /*Area Total-row adding ....*/
					 var _tr2 = document.createElement("TR");
						 _tbl.appendChild(_tr2);
					 AreaTotal.forEach(function(v,i,arr){
						  var _td20_MINE = document.createElement("TD");
							  _tr2.appendChild(_td20_MINE); 
							  _td20_MINE.style.padding="6px";
							  _td20_MINE.style.border="solid thin #E0E0F0";
							  _td20_MINE.style.textAlign="center"; 
							  _td20_MINE.style.fontWeight = 900;
							  _td20_MINE.innerHTML = (i>0)?parseFloat(v).toFixed(2):v;
					 });
				}/*...if(typeof HAHA["AREA_NAME"]!*/
			
			/************* END - OBR - REMOVAL - ANALYSIS *************************************/		
			
				 
		} /*....if(typeof DataJsn !="undefined" */
		else{
			_rdv.innerHTML="Error: No-Data returned by the server, in DesignAnalysisTableAnd_show function in REPORT.JS";
		}
		/*Add empty row in bottom*/
		_rdv.innerHTML+="<p style='padding:8px; border:none;'>&nbsp;<br/>&nbsp;</p>";	
	}else{
		alert('Result-div is not found in DesignAnalysisTableAnd_show function in REPORT.JS');	
	}
	
}

var _LOADED_DATA = null;
function LOAD_DATA_FOR_REPORT(btn, rsdv, HAHA){	 
	/*Show data-in divs*/
	if(typeof btn!="undefined" && document.getElementById(rsdv)){
		rid_btn = (btn && typeof btn.dataset.rid!="undefined")?document.getElementById(btn.dataset.rid):null;
		//Show_CHARTS_DATA({"ONDT":"OD", "IS_AREA":1,"AREA_NAME":"RAIGARH","UNIT_CODE":"4903"});
		var dv = document.getElementById(rsdv);
		if(dv){dv.style.display=''; dv.innerHTML="<h3 style='padding:5px;color:#003003;'>Please Wait data is Loading ....<img src='3kb.gif' draggable='false' alt='Loading img' /> </h3>";}
		var REPORT_OF = {"IS_AREA":(HAHA["IS_AREA"])?HAHA["IS_AREA"]:0,"AREA_NAME":(HAHA["AREA_NAME"])?HAHA["AREA_NAME"]:"RAIGARH","UNIT_CODE":(HAHA["UNIT_CODE"])?HAHA["UNIT_CODE"]:"4903"}; /*UNIT_CODE is required when any units data */
		var ONDT = (typeof HAHA!="undefined" && HAHA["ONDT"]!="")?HAHA["ONDT"]:"OD";
		var frmD = new FormData();
			frmD.append("Load",JSON.stringify({"PROD":1,"OB":1,"DESP":1,"RAIN":0,"SM":1,
							"LPROD":1,"LOB":1,"LDESP":1,"LRAIN":0,"LSM":1}));
			frmD.append("Period",JSON.stringify({"FROM_DT":"","TO_DT":""}));
			var areaObj = (rid_btn)?JSON.parse(rid_btn.value):[{"AREA":[{"RAIGARH": ["4903","4905","4907","4908","4909","4910","4912","4913","4917","4950","4970"]}]}]; 
			
			var grdObj = [{"GRADE":["G_1","G_2","G_3","G_4","G_5","G_6","G_7","G_8","G_9","G_10","G_11","G_12","G_13","G_14","G_15","G_16","G_17","NSG"]}];
			var DepoutObj = [{"DPTOUT":["DEPARTMENT","OUTSOURCE"]}];
			var TransObj  = [{"TM":["ROAD","RCR"]}];
			var _DATE  = new Date();
			var ONDATE = (typeof HAHA!="undefined" && HAHA["ONDATE"]!="")?HAHA["ONDATE"]:_DATE.toJSON().slice(0, 10); 
			frmD.append('RPT',"CHART_DATA");
			  frmD.append('area',JSON.stringify(areaObj));
			  frmD.append('grade',JSON.stringify(grdObj));
			  frmD.append('deptout',JSON.stringify(DepoutObj));
			  frmD.append('odate',ONDATE);
			  frmD.append('tmode',JSON.stringify(TransObj));
			var arv = {"URL":"loadPDOB_data_for_today.php?reports=asondate-production&RPT=CHART_DATA","FORM_DATA":frmD,"IS_PROMISE":false,"CLBK_FN":"", "RDV_ID":rsdv};
			
			/************************LOAD DATA FOR GRAPH RENDERING*******/
			if(typeof Promise!="undefined"){
				 var tmp_p=new Promise(function (resolve, reject) {
					 		 arv["IS_PROMISE"]=true; 
							var y=RP_LOAD_DATA_USING_PM(arv);
								if(typeof y=="undefined" || y==null){ 
									if(dv){dv.style.display=''; dv.innerHTML="Error: Prod., Obr, Despatch data is not loaded, Charts cant be shown"+y;}else{ 
									alert("Error: Prod., Obr, Despatch data is not loaded, Charts cant be shown"+y);}
									return false;
								}
								if(typeof y=="object" && 
									(typeof y.constructor=="function" && typeof y.constructor.name!="undefined" && 
											y.constructor.name.toLowerCase()=="promise")){/*if returnd objct is also a promise*/
											y.then(function(yv){ 
												if(typeof yv!="undefined" && typeof yv[0]!="undefined" && yv[0]!=null)
												{resolve([yv]);}
												else{
													 if(dv){dv.style.display=''; dv.innerHTML="Error: Prod., Obr, Despatch data is not loaded, Charts cant be shown"+yv;}else{alert("Error: CHART-Data is not loaded, in internal y-Promise then"+yv);}  
													 return false;
												}});
									}else{
											if(typeof y!="undefined" && typeof y[0]!="undefined" && y[0]!=null)
											{ resolve([y]);}
											else{if(dv){dv.style.display=''; dv.innerHTML="Error: Prod., Obr, Despatch data is not loaded, Charts cant be shown"+y;}else{alert("Error: Prod., Obr, Despatch data is not loaded, Charts cant be shown, in outer Promise."+y);}  
													 return false;
											}
									}
							});/*generate a promise*/ 
											 
							tmp_p.then(function(_tmp){/*resolve the promise*/
								var tmp=null,_this=null, that=null;
								if(typeof _tmp=="object"){ renderData(dv,_tmp,REPORT_OF, ONDT);}
								else{if(dv){dv.style.display=''; dv.innerHTML="Error: Prod., Obr, Despatch data is not loaded, Charts cant be shown ,  in Y promose then"+_tmp;}else{alert("Error: in Y promose then" + _tmp);}  return false;}
							});/*than promise*/
				
			}/*if(typeof Promise!="undefined"){...*/
			else{ /*if promise not defined than use asynchronous call*/
				
					var y=RP_LOAD_DATA_USING_PM(arv); 
					if(typeof y!="undefined" && typeof y=="object") {renderData(dv,y,REPORT_OF, ONDT); }
					else{ if(dv){dv.style.display=''; dv.innerHTML="Error: Prod., Obr, Despatch data is not loaded, Charts cant be shown ,  in else of promise Asyn call."+y;}else{alert("Error:in else of promise Asyn call.."+y);} return false; }
			  
			 }/*else*/
			/***********************************************************/
			function renderData(dv,data, rpt_of, odt){ 
				_LOADED_DATA = data; /*this is global variable*/
				var ONDT = (typeof odt!="undefined" || odt!="" )?odt:"OD"; 
				var DataJsn = JSON.parse(data);
			
				 
				
				var AREA_NAME = (typeof rpt_of!="undefined" && Object.keys(rpt_of).length>0)?rpt_of["AREA_NAME"]:"";
				var UNIT_CODE = (typeof rpt_of!="undefined" && Object.keys(rpt_of).length>0)?rpt_of["UNIT_CODE"]:"";
				var TMP_OBJ ={}; 
				var UNIT_CODES = [];
				var REQ_FLD = ["PRODUCTION","DESPATCH","SM","RAIN","OBR","MINTR"];
				/*REPORT_OF = {"IS_AREA":1,"AREA_NAME":"RAIGARH","UNIT_CODE":""};*/
				if(typeof rpt_of!="undefined" && Object.keys(rpt_of).length>0 && rpt_of["IS_AREA"]==1){
				/*---draw chart of AREA-data---,it means all units are required*/	
					TMP_OBJ = (typeof DataJsn[AREA_NAME]!="undefined")?DataJsn[AREA_NAME]:null;
					if(typeof TMP_OBJ=="undefined" || TMP_OBJ==null){
					alert("AREA:"+AREA_NAME+" is not valid key in Loaded JSON dataset.");
						return 0;
					}
				} 
				/*PREPARING CHART DATA OBJECT*/
				if(typeof TMP_OBJ=="undefined" || TMP_OBJ==null){alert("DATA NOT LOADED FOR CHART."); return false;}
				
				var keys_ = Object.keys(TMP_OBJ);	
						keys_.forEach(function(v,i,arr){
							if(!isNaN(v)){
								UNIT_CODES.push(v);
							} 
						});/*foreach*/
				  
		 				DesignAnalysisTableAnd_show(DataJsn, keys_, rsdv, HAHA);
				
				 //console.log('under-development in render data function bottom', DataJsn, keys_); 
				
			}/*function renderData(...*/
		
	}/*if(document.getElementById('rows_result')){....*/
  }/*function-charts-data*/
</script>