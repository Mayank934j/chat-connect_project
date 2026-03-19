/* JavaScript Library | mddl.js v.1.0 | (C) 2019-20  **/
/* This library has been written by R.P.Meena, AM(Systems/SECL, Raigarh). ***/
/* open-source licensing, Before using in commercial products, You have to inform us. ***/
/* How to use this library see example at botttom of this file.  **/


var __myApp__;
(function(m){
	m.selectedx={};
	m.lpadding={};
	var ic=function(){
     var initCheckBox = function(d,o){
      this.ckData=d;
	  this.opt=o;
	  if(typeof this.id!="undefined" && this.id!=null){m.lpadding[this.id]=10;}
	  this.dataLength=0;
	  this.selectedItems={};
	  this._css=function(){var stid="CK_STYLE";var stl=document.getElementById(stid);
			 if(!stl || typeof stl=="undefined" || stl==null){ var st=document.createElement("STYLE"); st.type = 'text/css';st.id=stid;var pn=document.head || document.getElementsByTagName('head') || document.body; if(pn){pn.insertBefore(st,pn.childNodes[0]);} st.innerHTML=".CKDV {display: block;position: relative;padding-left: 35px;margin-bottom: 12px;cursor: pointer;float:left;color:#003063;font-size: 17px;margin:5px;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;} .CKDV input {position: absolute;opacity: 0;cursor: pointer;height: 0;width: 0;} .checkmark {position: absolute;top: 0;left: 0;height: 25px;width: 25px;background-color: #ccc;} .CKDV:hover input ~ .checkmark {background-color: #bcc;} .CKDV input:checked ~ .checkmark {background-color: #2196F3;} .checkmark:after {content: \"\";position: absolute;display: none;} .CKDV input:checked ~ .checkmark:after {display: block;} .CKDV .checkmark:after {left: 9px;top: 5px;width: 5px;height: 10px;border: solid white;border-width: 0 3px 3px 0;-webkit-transform: rotate(45deg);-ms-transform: rotate(45deg);transform: rotate(45deg);} .slctCSSCK{padding:10px; font-weight:900; color:rgba(52,60,65,1);background:rgba(255,255,255,1); border:solid thin rgba(52,60,65,1); text-transform:capitalize; width:100%; max-width:150px; border-radius:3px;} .slctCSSCK:hover {opacity:.6;}  "; }
	 };
	  this._uGUI=function(){
		   var x=this.selectedItems[this.id]; 
		   for(var i in x){var d=document.getElementById(this.id+"_"+i);if(d){d.checked=x[i];}}
		   if(typeof this.EXPND!="undefined" && this.EXPND==false){
			  this._returnSelected(this);if(this.pdv){this.pdv.removeChild(this.wrapperDv);}this.EXPND=!(this.EXPND);if(typeof this.opt["Expend_defualt"]!="undefined"){this.opt["Expend_defualt"]=this.EXPND;}
			 }
	  };
	  this._usall=function(){ /*this function is slct/unslct all*/
		    var x=this.selectedItems[this.id]; 
		    var ft=false;if(typeof x!="undefined" && x!=null && typeof x["SALL"]!="undefined" && x["SALL"]!=null  && x["SALL"]==true){ft=true;}
		    if(this.selectedItems[this.id]){this.selectedItems[this.id]["SALL"]=ft;}else{this.selectedItems[this.id]={};this.selectedItems[this.id]["SALL"]=false;}
			for(var j in this.ckData){this.selectedItems[this.id][j]=ft;}
		    this._uGUI();  
	  };
	  this._sT=function(ckid,ckv){ /*this fuction select/un-select single*/
		    if(!this.selectedItems || typeof this.selectedItems=="undefined"){
				if(!this.selectedItems || typeof this.selectedItems=="undefined"){this.selectedItems={};}
				else if(!this.selectedItems[ckid] || typeof this.selectedItems[ckid]=="undefined"){this.selectedItems[ckid]={};}
			}
			if(ckv=="SALL"){
				var x=this.selectedItems[this.id];
				if(x && x["SALL"]!="undefined" && x["SALL"]==false){x["SALL"]=true;}
				else if(x && x["SALL"]!="undefined" && x["SALL"]==true){x["SALL"]=false;}
				else{this.selectedItems[this.id]={}; this.selectedItems[this.id]["SALL"]=false; }
				this._usall();}
			else{
				var sbv=this.selectedItems[ckid][ckv];
			    if(typeof sbv=="undefined" || sbv==null){ this.selectedItems[ckid][ckv]=true; }
				else{  if(sbv==false){this.selectedItems[ckid][ckv]=true;}else{this.selectedItems[ckid][ckv]=false;}}
				this.selectedItems[ckid]["SALL"]=false;		
			    var svx=this._gS();
			    if(svx && svx.selectedvalue.length>=this.dataLength.length){this.selectedItems[ckid]["SALL"]=true; this._usall();}else{this._uGUI();}
			 }	
			  
	 };
	  this._gS= function(){/*this will rerurn all selected items*/
		          var d=this.selectedItems[this.id];
				  //console.log("_GS: ", d, m.selectedx)
		          var value=0;
				  var svalues=[];
		          for(var i in d){if(d[i]==true){if(i!=""){if(svalues[0]==""){svalues[0]=i;}else{svalues.push(i);}value+=1;}}}
				  return {'selectedvalue':svalues};
  	  };
	  this._returnSelected=function(t){ 
	     var set_hdn_values=function(_hid,_bid,_v){
			 var _h=document.getElementById(_hid);
			 if(_h){_h.value=_v;}
			 else{
			    var c = document.createElement("input");
				    c.setAttribute("type","hidden");
					c.id=_hid;
					c.name=_hid; 
					c.value=_v; 
				var _b=document.getElementById(_bid);	
				if(_b.parentElement){_b.parentElement.appendChild(c);}
				else{_b.appendChild(c);}
			 }
			 
		 };
		 var s_=(this._gS()).selectedvalue || []; 
		 var sv=[]; 
		 for(var i in s_){if(s_[i]!="SALL"){if(sv[0]==""){sv[0]=s_[i];}else{sv.push(s_[i]);}} }
		 if(t && typeof t.Rid!="undefined"){
			 set_hdn_values(t.Rid,this.btnid,sv.join(","));
			 if(document.getElementById(this.btnid+"_spn")){
				 document.getElementById(this.btnid+"_spn").style.display='';   
			   if(sv.length>0){	 
				var tw="";isr_='is'; if(sv.length>0 && sv.length<=2){for(var i in sv){if(tw==""){tw=this.ckData[sv[i]];}else{tw+=", "+this.ckData[sv[i]];isr_='are';} }}
				document.getElementById(this.btnid+"_spn").innerHTML=(sv.length>=1)?("<span style='font-size:7px;'>"+((this.dataLength.length<=sv.length)?"ALL options" : ((sv.length<=2)?("<strong> "+tw+"</strong> "+isr_+" "):sv.length+" options "))+" Selected "+"</span>"):"";
			   }/*if(sv.length....*/
			   else{
				document.getElementById(this.btnid+"_spn").innerHTML='&nbsp;';
				document.getElementById(this.btnid+"_spn").style.display='';   
			   }
			 }/*if(document....*/
			 if(typeof this.opt["p_btn"]!="undefined" && this.opt["p_btn"]!=null){
				var ft=false;
				var _that=(this.opt["p_btn"]["l_this"] || null );
				if(sv.length>0){ft=true;}
				var ckid=(this.opt["p_btn"]["p_id"] || "" );
				var ckv= (this.opt["p_btn"]["p_vl"] || "" );
				var sbv=_that.selectedItems[ckid][ckv];
				
				if(typeof _that.selectedItems[ckid]=="undefined" || _that.selectedItems[ckid]==null)
				{_that.selectedItems[ckid]={};}
				else if(typeof ckv!="undefined" && ckv!="") {_that.selectedItems[ckid][ckv]=ft;}
			   _that._uGUI();
			 }
		 	if(typeof __myApp__.selectedx!="undefined"){
			 	if(typeof __myApp__.selectedx[this.Rid]=="undefined" || !__myApp__.selectedx[this.Rid]){ 
			           __myApp__.selectedx[this.Rid]={};}
					   __myApp__.selectedx[this.Rid]=sv;
			 
		 	}   
		 }else{alert("You have selected: "+sv.join(","));}
		 
		var slctvx=function(_a_,_b_,ra,_v_,i){ 
			i=i || 0;
			  if(typeof _a_.selectedx[_b_]!="undefined" &&  _a_.selectedx[_b_]!=null && _a_.selectedx[_b_].length>0){
				  if(!ra[i]){  var ff1={};ff1[_v_]=[]; 
				     ra.push(ff1);
				  }
				   var z=_a_.selectedx[_b_]; 
				   
				   z.forEach(function(d,di){
					   if(_a_.selectedx[_b_+"_"+d]){
						   //ra.push(ff1);
						   var f1={};f1[d]=[];
						  var tm=ra[i];
						  tm[_v_].push(f1);f1=null;
						  slctvx(_a_,_b_+"_"+d,tm[_v_],d,di);
				       }else{
						   var tm=ra[i];
						   tm[_v_].push(d);
					   }
					 }
					);	    
				}
			  return ra;
		};/*slctvx function....*/
		
		if(typeof t.opt!="undefined" && typeof t.opt.p_btn=="undefined"){
			/*call a recursive function to find all depth child result nodes*/
			      var _f=t.btnid.substring(t.btnid.lastIndexOf("_")+1);
				  var _rd=slctvx(__myApp__,t.Rid, [],_f);
				  if(typeof _rd=="undefined" || _rd.length<=0){_rd="";}else{_rd=JSON.stringify(_rd);}
				  set_hdn_values(t.Rid,t.btnid,_rd);
		}
		
	  };
	  this._f=function(dv){/*create_footer_note*/
		            dv=dv || body 
	 				var dsby=document.createElement("div"); dsby.style.position='absolute';
					dsby.style.bottom='0px';dsby.style.left='0px'; 
					dsby.style.display='inline-block';dsby.style.width='99.9%';dsby.style.backgroundColor="rgba("+Math.floor(Math.random()*37%235)+", "+Math.floor(Math.random()*73%205)+", "+Math.floor(Math.random()*23%255)+",.1)";
					dsby.style.fontSize='7px';dsby.align='right';dsby.style.color='#bbb';dsby.style.padding='3px';
					dsby.style.borderTop='solid thin #eee';
					var tx=String.fromCharCode(82)+"."+String.fromCharCode(80)+"."+String.fromCharCode(77)+String.fromCharCode(101)+String.fromCharCode(101)+String.fromCharCode(110)+String.fromCharCode(97)+", System Officer Raigarh. ";
						dsby.innerHTML="GUI Designed By "+tx;

					dv.appendChild(dsby);
      };
	  this._c=function(condv){ /*create_checkBox_input*/
		          if(condv){
					  var vt=document.createElement("p");
					  if(vt){
						vt.id=this.id+"_info";
						vt.style.display='none';
						vt.style.padding='8px';
						vt.style.color='#003003';
						vt.style.fontSize='11px';  
						vt.style.fontWeight='900';
						vt.style.textAlign='center';
						vt.style.backgroundColor='rgba(242,235,235,1)';
						vt.innerHTML="&nbsp;Wait data loading -.-.-<img src='3kb.gif' draggable='false' />";
						condv.appendChild(vt);
					  }
					  
					  var i1=0;var dt=this.ckData;
					  var _sid=this.id;
					  var that=this;
					  
						  for(var i in dt){
						  if(i1==0){
							  var cdv=document.createElement("label");
						      cdv.id=this.id+"_"+"_SALL";
							  cdv.className ="CKDV";
							  cdv.style.cssFloat='none';
							  cdv.style.display=((this.opt["SELECT_ALL"] || false)==true)?"":"none";
							  if(typeof that.opt["call_back_CKBx"]=="function"){cdv.style.display='none';}
							  cdv.innerHTML="Select All";
							  condv.appendChild(cdv);
							  var c = document.createElement("input");
				    			  c.setAttribute("type","checkbox");
								  c.id=this.id+"_"+"SALL";
					              c.name=this.id+"_"+"SALL"; 
								  cdv.appendChild(c);
								  var cspn=document.createElement("span");
								      cspn.className="checkmark";
									  cdv.appendChild(cspn);
							
							 c.addEventListener("click", function(event){ 
							   var x=this.id.split(_sid+"_") ; x=(x[1])?x[1]:x[0];
							   that._sT(_sid,x); 
							  });
						   }/*if(i1==...*/
						   i1++;
						   var cdv=document.createElement("label");
						      cdv.id=this.id+"_"+"_label";
							  cdv.className ="CKDV";
							  cdv.innerHTML=dt[i];
							  condv.appendChild(cdv);
							  var c = document.createElement("input");
				    			  c.setAttribute("type","checkbox");
								  c.id=this.id+"_"+i;
					              c.name=this.id+"_"+i; 
								  cdv.appendChild(c);
								  var cspn=document.createElement("span");
								      cspn.className="checkmark";
									  cdv.appendChild(cspn);
						 if(typeof this.opt["call_back_CKBx"]!="undefined" && this.opt["call_back_CKBx"]!=""){
							 var spn=document.createElement("span");
							    spn.id=c.id+"_spn";
								cdv.appendChild(spn);
								spn.style.paddingLeft='7px';
								spn.style.color='rgba(90,100,70,1)'; 
						 }
						
						 c.addEventListener("click", function(event){ 
						          this.ShowInfo=function(_id,txt,_sh,iel){
									    if(document.getElementById(_id)){
											var _fld_dv=document.getElementById(_id)
											var tx_="";
											if(typeof txt!="undefined" && txt==""){tx_="&nbsp;Wait data loading ";}else{tx_="&nbsp;"+txt;}
											if(iel=='info'){_fld_dv.style.color='#003003';}else if(iel=='error'){_fld_dv.style.color='#FF0000';}
											else if(iel=='loading'){_fld_dv.style.color='#ABABAB'; tx_+=" -.-.-<img src='3kb.gif' draggable='false' />";}
											if(tx_==""){tx_="&nbsp;Wait data loading -.-.-<img src='3kb.gif' draggable='false' />";}
										    _fld_dv.innerHTML=tx_;
											_fld_dv.style.display=(_sh==false?"none":""); 
									    }
									  }/*show-info-display*/
						          this.onclk=function(tmp,_this,that,__myApp__){/*called on internal dropdwn click*/
								  //console.log("ONclick: ",that, __myApp__);
								    if(typeof tmp=="object" && (tmp!=null && typeof tmp[0]!="undefined" && tmp[0]!=null && Object.keys(tmp[0]).length>0)){
										       _this.ShowInfo(that.id+"_info",'',false,'loading');
										        newDataset=tmp[0];
										        DROP_DWN_HDR_TXT=tmp[1]["Drop_dwn_hTxt"];
										        newCallBack=tmp[1]["call_back_CKBx"];
										        LftMargn=(tmp[1]["left_padding"]!="")?tmp[1]["left_padding"]:(Math.random(1,10)+3);
										        if(typeof __myApp__.sdata=="undefined"){__myApp__.sdata={};}
										        if(typeof __myApp__.sDDTXT=="undefined"){__myApp__.sDDTXT={};}
										        if(typeof __myApp__.lpadding=="undefined"){__myApp__.lpadding={};}
												
										        __myApp__.lpadding[_this.id]=LftMargn;
										        __myApp__.sdata[_this.id]=newDataset;
										        __myApp__.sDDTXT[_this.id]=tmp[1];
										     }else{_this.ShowInfo(that.id+"_info","No data found for next drop-down, call your Techie! ",true,"error");
											   if(_this){_this.checked =false;}
												 return false;  
										     }
											 if(typeof newDataset!="undefined" && newDataset!=null){
												var x=_this.id.split(_sid+"_") ; x=(x[1])?x[1]:x[0];
										        var optx1={
													"SELECT_ALL":true, /*If true than enable select all button else hide.*/
													"Expend_defualt":true, /*This is expend dropdown by defualt, if TRUE */
													"ALL":true, /*if TRUE, all will be selected by default. */
    												"btn_id":_this.id, /*Select-Button-id, can be empty*/
													"btn_dvid":_this.parentNode.id,/*Button-DIv-id where Select button will be shown*/
												    "pid":(that.opt["pid"]?that.opt["pid"]:"DESPATCH_RW"), /*Parent Div-id, where drop-down will be shown. Defualt 'BODY' */
													"btn_value":(that.opt["btn_value"]?that.opt["btn_value"]:"MENU ITEMS"), /*BUTTON VALUE to be displayed.*/
													"btn_class":"slctCSSCK", /*CSS CLASS Name*/
													"Drop_dwn_hTxt":DROP_DWN_HDR_TXT+"", /*THIS TEXT WILL BE SHOWN IN POP-UP DIV HEADER*/
													"call_back_CKBx":newCallBack, /*Callback function: call when checkbox click DATASET MULT-LEVEL*/
													"pop_dv_left_margin":Math.round(LftMargn), /*this will add a margin from left*/
													"p_btn":{'p_id':_sid,'p_vl':x,'l_this':that}
											    };  
											    var ox=null;
											        ox=new __myApp__.initCheckBox(newDataset,optx1); 
											    var x=_this.id.split(_sid+"_") ; x=(x[1])?x[1]:x[0];
											       that._sT(_sid,x);	 
									          }else{if(_this){_this.checked =false;}
											  _this.ShowInfo(that.id+"_info","No data found for next drop-down, refresh and retry or call your Techie! ",true,"error"); return false;}
								  };/*onclk function*/
								  
							      if(typeof that.opt["call_back_CKBx"]=="function"){
									 var _this=this; 
									 var x=this.id.split(_sid+"_") ; x=(x[1])?x[1]:x[0];
									 _this.ShowInfo(that.id+"_info",x+" Data Loading",true,"loading");
							         var newDataset={}, DROP_DWN_HDR_TXT="SELECT OPTION",newCallBack="",LftMargn='10';
									 if(typeof __myApp__.sdata!="undefined" && typeof __myApp__.sdata[this.id]!="undefined"){ /*data available in cache*/
										 newDataset=__myApp__.sdata[this.id];
										 DROP_DWN_HDR_TXT=(__myApp__.sDDTXT[this.id])["Drop_dwn_hTxt"];
										 newCallBack=(__myApp__.sDDTXT[this.id])["call_back_CKBx"];
										 LftMargn=__myApp__.lpadding[this.id];
										 var tmp=[];
										 tmp[0]=newDataset;
										 tmp[1]={"Drop_dwn_hTxt":DROP_DWN_HDR_TXT,"call_back_CKBx":newCallBack,"left_padding":LftMargn};
										 this.onclk(tmp,_this,that,__myApp__);
									 }else{/*if first time call, fetch-data-from-server or external resources*/
										   var _this=this;
										   if(typeof Promise!="undefined"){
										        var tmp_p=new Promise(function (resolve, reject) {
											        var y=that.opt["call_back_CKBx"]({'para':[x],'isPromiseAvailable':true}); 
													if(typeof y=="undefined" || y==null){
													   	if(_this){_this.checked =false;} 
													   _this.ShowInfo(that.id+"_info","Data-set undefined for next drop-down, call your technical team.",true,"error");
													    return false;
													}
											        if(typeof y=="object" && 
											               (typeof y.constructor=="function" && typeof y.constructor.name!="undefined" && 
												            y.constructor.name.toLowerCase()=="promise")){/*if returnd objct is also a promise*/
												            y.then(function(yv){
																   if(typeof yv!="undefined" && typeof yv[0]!="undefined" && yv[0]!=null){resolve([yv,_this,that]);}
													    			else{
																			if(_this){_this.checked =false;} _this.ShowInfo(that.id+"_info",false);
																			_this.ShowInfo(that.id+"_info","Data-set undefined for next drop-down, call your technical team.",true,"error");
															                 return false;
																	}
																   
															});
											        }else{
														if(typeof y!="undefined" && typeof y[0]!="undefined" && y[0]!=null){ resolve([y,_this,that]);}
													    else{if(_this){_this.checked =false;} _this.ShowInfo(that.id+"_info",false);
															  _this.ShowInfo(that.id+"_info","Data-set undefined for next drop-down, call your technical team.",true,"error");
														      return false;
														}
													}
											     });/*generate a promise*/ 
											 
										            tmp_p.then(function(_tmp){/*resolve the promise*/
													 
											        	 var tmp=null,_this=null, that=null;
											         	 if(typeof _tmp=="object"){tmp=_tmp[0],_this=_tmp[1], that=_tmp[2];}
										           		 _this.onclk(tmp,_this,that,__myApp__);
										            });/*than promise*/
										   }/*if  if(typeof Promise...*/
										   else{ /*if promise not defined than use asynchronous call*/
											   	var y=that.opt["call_back_CKBx"]({'para':[x],'isPromiseAvailable':false});
											   	if(typeof y!="undefined" && typeof y=="object"){
												 	_this.onclk(y,_this,that,__myApp__);   
											   	}else{
													if(_this){_this.checked =false;}
												 	_this.ShowInfo(that.id+"_info","Internal-Error: Dataset for next drop-down is not valid, kindly check function which is returning data of call to the technical team!",true,"error");  
													return 0;
											   	}
										   }
									 }/*else*/
								 }/*if(typeof that.opt["call_back....*/
								 else{ var x=this.id.split(_sid+"_") ; x=(x[1])?x[1]:x[0]; that._sT(_sid,x);}
							 });
					  }/*for*/
					  /*update last selected items.*/
					  var lo=[];
					  if(typeof __myApp__.selectedx!="undefined" && __myApp__.selectedx!=null && (typeof __myApp__.selectedx[this.Rid]!="undefined" && Object.keys(__myApp__.selectedx[this.Rid]).length>0)){
						 var vx=(__myApp__.selectedx[this.Rid])?__myApp__.selectedx[this.Rid]:[];
						 if(this.selectedItems[this.id]){this.selectedItems[this.id]["SALL"]=false;}else{
							this.selectedItems[this.id]={};this.selectedItems[this.id]["SALL"]=false;}
						 if(typeof this.Isint!="undefined"){this.Isint=true;}
						 if(this.dataLength.length<=vx.length){this.selectedItems[this.id]["SALL"]=true;}
						 for(var f in vx){if(vx[f]!=""){
							 if(typeof __myApp__.selectedx["R_"+this.id+"_"+vx[f]]!="undefined" && __myApp__.selectedx["R_"+this.id+"_"+vx[f]]!=null){      var t=__myApp__.selectedx["R_"+this.id+"_"+vx[f]];
								var sl=(t.length)?t.length:0;
								var d1=document.getElementById(this.id+"_"+vx[f]+"_spn");
								if(d1 && sl>0){
									var bData=(typeof __myApp__.sdata!="undefined")?__myApp__.sdata[this.id+"_"+vx[f]]:{};
									var bDatal=Object.keys(bData).length;
									var tzx="";if(sl>0 && (bDatal==sl)){tzx="All Options";}else if(sl>0 && sl<=2){for(var rx in t){if(tzx==""){tzx=(bData[rx]!=null && typeof bData[rx]!="undefined")?bData[rx]:"";}else{tzx+=", "+(bData[rx]!=null && typeof bData[rx]!="undefined")?bData[rx]:"";}}}else{tzx=sl+" Options";}
									if(sl>0 && tzx!=""){d1.innerHTML="<span style='font-size:7px;'> "+tzx+" Selected </span>";}
								}/*if(d1...*/
							 }/* if(typeof __myApp__.*/
							 this.selectedItems[this.id][vx[f]]=true;}}/*for loop....*/
					  }/*if( typeof __myApp__ ...*/
					}else{ alert('Select Wrapper_DIV is not available or referenced resource not available.');}
					
	};
	  this._cwDv=function(p,htxt){ /*create wrapper div*/
	                this.pdv=p;
		            var dv=document.createElement("DIV");
	     			dv.id="m_"+parseInt(Math.random(10,1000)*1000)+"ms-wraper";
					this.wrpdv=dv.id;
		 			dv.style.border='solid thin #003003';
		 			//dv.style.padding='8px';
		 			dv.style.borderRadius='0px';
		 			//var p=((this.parentElement).parentElement);
		 			//p1=(p)?p.getBoundingClientRect():{x:'100',y:'5'};
					var _top=40;
					var _lft=5; 
					if(this.opt["pop_dv_left_margin"]){
					   var _top=44;
					   var _lft=(this.opt["pop_dv_left_margin"]>0)?(this.opt["pop_dv_left_margin"]%13):9; 
					}
					p.appendChild(dv);
		 			var _ds=dv.style;
					_ds.position='absolute';
		 			_ds.top=_top+"px";
		 			_ds.left=_lft+"px";
		 			_ds.width='99%';
		 			_ds.background='rgba(255,255,255,1)';
		 			_ds.zIndex=10000;  
		 			var dh=document.createElement("div");
		 			dh.id='dv-hdr';
		 			var _dhs=dh.style;
					_dhs.height='40px';
		 			_dhs.padding='8px';
		 			dv.appendChild(dh);
		 			dh.innerHTML=htxt || "&equiv;&nbsp;SELECT OPTION" ;
		 			_dhs.borderBottom='solid thin #003003';
		 			_dhs.background="rgba("+Math.floor(Math.random()*37%235)+", "+Math.floor(Math.random()*73%205)+", "+Math.floor(Math.random()*23%255)+",.5)";
					_dhs.color='#003209';
					_dhs.fontWeight='900';
		 			var spn=document.createElement('span');
		 			var _ss=spn.style;
					_ss.position='absolute';
		 			_ss.top='5px';
		 			_ss.right='10px';
		 			_ss.padding='5px';
		 			_ss.border='solid thin rgba(255,0,0,.2)';
		 			_ss.borderRadius='100px';
		 			_ss.color='#002309';
		 			_ss.fontWeight=900;
		 			spn.title='Close';
		 			_ss.cursor='pointer';
		 			spn.innerHTML="&nbsp;X&nbsp;";
		 			dh.appendChild(spn);
					this.wrapperDv=dv;
					var _tx=this;
		 			   spn.addEventListener("click", function(event){
						   event.preventDefault();
						    _tx._returnSelected(_tx);/*after-close-return-selected-values*/
						   if(dv && p){ dv.style.display='none'; var _xbtn=document.getElementById(_tx.btnid); 
						      _xbtn.disabled=false;  p.removeChild(dv); }
		 			   });
		               spn.addEventListener("mouseover", function(event){
						   event.preventDefault();
			               this.style.border='solid thin rgba(255,0,0,1)'; 
						   this.style.backgroundColor='rgba(255,0,0,1)';
						   this.style.color='#ffffff';
						   
		               });
		 			   spn.addEventListener("mouseout", function(event){
						   event.preventDefault();
						   this.style.border='solid thin rgba(255,0,0,.2)'; 
						   this.style.backgroundColor='rgba(237, 245, 247,1)';
						   this.style.color='#002309';
		 			   });
		 			var cntdv=document.createElement('div');
		 			cntdv.id='contentDv_';
		 			var _cds=cntdv.style;
					_cds.padding='8px';
					_cds.minHeight='300px';
		 			_cds.height='99%';
		 			_cds.maxHeight='400px';
		 			_cds.overflow='auto';
					_cds.marginBottom='20px';
					dv.appendChild(cntdv);
				 this._f(dv);	
		         this._c(cntdv);
	  };/*Wrapper function*/
	  this._cdCKBx=function(opt){
		 opt=opt || this.opt || {};
		 if(opt && opt["btn_dvid"] && document.getElementById(opt["btn_dvid"])){
			var LabelText=opt["btn_label_text"]?opt["btn_label_text"].trim():"";
			var bid=opt["btn_id"] || "btn_"+Math.random(1,1000);
			    this.opt["btn_id"]=bid
		     	var IsBtn=document.getElementById(bid); 
			        if(!IsBtn || typeof IsBtn=="undefined" || IsBtn==null){
		                var _cbtn=document.createElement("button");
		                    _cbtn.id=bid;
							
							var bv=(opt["btn_value"] || "SELECT OPTIONS");
							_cbtn.setAttribute("data-btxt", bv);
							_cbtn.setAttribute("data-rid", this.Rid);
							_cbtn.title=bv;
							if(bv.length>=10){bv=bv.substring(0,9);
							 _cbtn.style.textOverflow ="ellipsis";
							 _cbtn.style.wordSpacing ="nowrap";
							 _cbtn.style.overflow ="hidden";
							}
							_cbtn.style.cursor='pointer';
		                     _cbtn.innerHTML=bv ;
		                     _cbtn.className= opt["btn_class"] || "slctCSSCK";
		                     _cbtn.style.height='44px';
							 document.getElementById(opt["btn_dvid"]).innerHTML="<span style='opacity:.8; color:rgba(204,204,204,1);'>"+LabelText+"</span><br/>";
							 document.getElementById(opt["btn_dvid"]).appendChild(_cbtn);
							var caret=document.createElement("span");
							    caret.className='caret';
								caret.style.marginLeft='25px';
								 
								_cbtn.appendChild(caret);
							var spn=document.createElement("p");
							    spn.id=this.btnid+"_spn";
								spn.innerHTML="&nbsp;";
								spn.style.fontSize='7px';
								document.getElementById(opt["btn_dvid"]).appendChild(spn);
								spn.style.paddingLeft='5px';
								spn.style.color='rgba(100,100,100,1)';
							var _data=this.ckData; var _opt=this.opt;
							
		                        _cbtn.addEventListener("click", function(){_cbtn.disabled =true;  
								      var xc_=new __myApp__.initCheckBox(_data,_opt); 
									    	
								});
		            }/*if !isBtn*/     
		 
		    var _parent=document.body;
		    var htxt=opt["Drop_dwn_hTxt"] || "SELECT OPTION";
		        if(opt && opt["pid"]!=null && opt["pid"]!=""){_parent=document.getElementById(opt["pid"]);}
		        this._cwDv(_parent,htxt.toUpperCase());/*Wrapper*/
			 }/*if(opt && opt["btn_dvid"]...*/
			 else{
			       alert("Error: Button_Div_id = '"+opt["btn_dvid"]+"' is missing or Div not exit with this div_id, You have to tell where to append select button. "); return false;
		    }/*if(opt*/
	  };/*_cdCKBx=function..*/
	  this.Init_checkbox=function(){/*initialize Check Box/drop-down*/
	         this.Isint=false;
			 this.EXPND=this.opt["Expend_defualt"] || false;
			 this.btnid=(this.opt["btn_id"] || ("btn_id_"+Math.random(1,1000)));
			 this.Rid="R_"+this.btnid;                    /*final-result-will-be-stored-here*/
			 this.id=this.btnid;
			 this.dataLength=Object.keys(this.ckData);
			 this._css();
			 this._cdCKBx(this.opt);
			 
			 if(!this.selectedItems[this.id] || this.selectedItems[this.id]==null){this.selectedItems[this.id]={};
			 this.selectedItems[this.id]["SALL"]=false;}
			 if(this.opt && this.opt["ALL"]==true && (typeof this.Isint=="undefined" || this.Isint==false)){ this.selectedItems[this.id]["SALL"]=true;}
			  
			 if(typeof this.Isint!="undefined" && this.Isint==false){
				this.Isint=true;
			    this._usall();
			  }else{ this.Isint=true;
				this._uGUI();  
			  }
			 
	 };
	  this.Init_checkbox();
     };/*checkbox-constructor:initCheckBox*/
	 
    return initCheckBox;
  }();/*ic close*/
  m.initCheckBox=ic;
  m.initDropDown=ic;
  m.getSelectValues=(function(){
	                       var r=function(_fld){
		                          if(typeof _fld!="undefined" && _fld!=null){
									 if(typeof _fld == "string" && _fld!=""){
								 			var _rf=document.getElementById("R_"+_fld) || document.getElementById(_fld);
											var btxt = document.getElementById(_fld).getAttribute("data-btxt") || _fld;
								 			if(_rf){return _rf.value;}else{alert("this button-id ("+btxt+") is not valid/Exists!"); return null;}
									 }else if(typeof _fld == "object" && _fld.length>0){
										 	var t=[]; 
										 	for(d in _fld){d=_fld[d];
													var _rf=document.getElementById("R_"+d) || document.getElementById(d);
													var btxt = document.getElementById(d).getAttribute("data-btxt") || d;
								 					if(_rf){t.push(_rf.value);}else{alert("this button-id ("+btxt+") is not valid/Exists!"); return null;}
										 	}
											 
										return t;
									 }else{alert("Provide Correct field Id!");return null;}
								  }else{alert("No field-id exists : "+_fld);  return null;}
	                       }; 
						   return r;
					 })();
  m.checkFieldValueExists=(function(){
	                       var r2=function(_fld){
							     function _callbk(ds){
									 for(d in ds){ 
									     d=ds[d];
								   			var t_=document.getElementById(d);
										 	if(t_){
												var btxt = document.getElementById(d).getAttribute("data-btxt") || d;
												t_=document.getElementById("R_"+d); 
											  		if(!t_ || t_.value==""){alert("Your field-id:   '"+btxt+"'   has EMPTY / NULL value.");
													setTimeout(function(){document.getElementById(d).click();},200);return false;}	 
										 	}else{alert("No field exists with field-id: "+btxt);return false;}	 
									 }/*for...*/
									 return true;
							     }/*.. function _callbk(d)*/
		                         if(typeof _fld!="undefined" && _fld!=null){
									 if(typeof _fld == "string" && _fld!=""){
										 return _fv=_callbk([_fld]);
									 }else if(typeof _fld == "object" && _fld.length>0){
										 return _fv=_callbk(_fld);			
									 }else{
										alert("Either your field-id is not exists or you have not provided correct field-id data Array.\n your field-id : "+_fld); return false; }
								 }else{alert("Provide valid fields id set. you provided EMPTY field-id set. "); return false;}
	                       }; 
						   return r2;
					 })();					 
					 
})(__myApp__ || (__myApp__={}));


/*How to use ....*/

//var datax={
          //"g1":'Grade1',
		  //"g41":"Grade41",
		  //"g14":"Grade14",
		  //"g10":"Grade10",
		  //"g9":"Grade9",
		  //"gb":"Grade gb",
		  //"g5":"Grade5",
		  //"gg1":"Grade gg1",
		  //"g8":"Grade 8"
		//};

//var optx={
	//"SELECT_ALL":false,                    /*If true than enable select all button else hide.*/                          
	//"Expend_defualt":false,               /*This is expend dropdown by defualt, if TRUE */
	//"ALL":true,                          /*if TRUE, all will be selected by default. */
    //"btn_id":"GRADE",          /*Select-Button-id, can be empty*/
	//"btn_dvid":"select_bttn_div",        /*Button-DIv-id where Select button will be shown*/
	//"pid":"DESPATCH_RW",                 /*Parent Div-id, where drop-down will be shown. Defualt 'BODY' */
	//"btn_label_text":"Grade",     /*button label text, which to be displayed above button*/
	//"btn_value":"SELECT GRADES",            /*BUTTON VALUE to be displayed.*/
	//"btn_class":"slctCSSCK",             /*CSS CLASS Name*/
	//"Drop_dwn_hTxt":"SELECT GRADES",      /*THIS TEXT WILL BE SHOWN IN POP-UP DIV HEADER*/
	//"call_back_CKBx":""                    /*DROP_DOWN_INIT_BTN: THIS IS USED TO GENERATE NEXT DATASET FOR MULT-LEVEL*/
	//};

//var o1=new __myApp__.initCheckBox(datax,optx);  Init drop_down

