<script type="text/javascript">
 var characters=0; var prev_=2;  var countEnterKeys=0;var val=0;
 function checkPostMsgLength(e,txtrid,POSTErr){var value_=document.getElementById(txtrid).value;value_=removeWT(value_);
 /*remove multiple white spaces and new lines */
 document.getElementById(txtrid).value=value_; characters=(value_.length %111);
 characters++;if(characters>=111 && value_.length<60000) { document.getElementById(txtrid).rows=(prev_+2); characters=0;prev_=prev_+2;} else if(value_.length>=60000){alert('message size exceeds maximum size 60000'); document.getElementById(txtrid).value=value_.substr(0,(60000-1)); return 0;}
  var characterCode; e = (e || window.event);

  characterCode = e.keyCode || e.which;
  if (characterCode == 13 )
  {if(characters>=10){countEnterKeys++;
	if(countEnterKeys>2){ document.getElementById(POSTErr).style.display=''; document.getElementById(POSTErr).innerHTML="Warning Log : more then 2 new lines not allowed , (continuously)"; countEnterKeys=0;setCloseTime(POSTErr,5);}
  if(characters<15)  characters=characters+100; else if(characters<25)  characters=characters+90;else if(characters<45)  characters=characters+80;else if(characters<65)  characters=characters+70;else if(characters<85) characters=characters+30;
  characters=characters+10;
	}
	else{ countEnterKeys++;if(countEnterKeys>2){document.getElementById(POSTErr).style.display=''; document.getElementById(POSTErr).innerHTML="Warning Log : more then 2 new lines not allowed , (continuously)"; countEnterKeys=0;setCloseTime(POSTErr,5);}} }
  else countEnterKeys=0;
 return 1;
}
 function add_event(imgOBJ,fileOBJ){var file = document.getElementById(fileOBJ);file.click();}  var fileToLoad;function loadImageFileAsURL(id_where_prev,fileOBJ)
 {
	 var flag_for_safari=0;
	 var nVer = navigator.appVersion;
	 var nAgt = navigator.userAgent;
	 var browserName  = navigator.appName;
	 var fullVersion  = ''+parseFloat(navigator.appVersion);
	 var majorVersion = parseInt(navigator.appVersion,10);
	 var nameOffset,verOffset,ix;
	 if ((verOffset=nAgt.indexOf("Safari"))!=-1){browserName = "Safari";flag_for_safari=1;}
	 var filesSelected = document.getElementById(fileOBJ).files;
	 if (filesSelected.length > 0)
	  {fileToLoad = filesSelected[0];
		  if (fileToLoad.type.match("image.*"))
		   { if(fileToLoad.size<(2072000*2))
			    {

					   var fileReader = new FileReader();
					   fileReader.onload = function(fileLoadedEvent)
					    {

							document.getElementById(id_where_prev).style.display='';
						    if(document.getElementById('uploaded_img_tr') && document.getElementById('uploaded_img_tr').style.display=='none')
							  {document.getElementById('uploaded_img_tr').style.display='';}
							document.getElementById(id_where_prev).src = fileLoadedEvent.target.result;
							CommentImageUrl=fileLoadedEvent.target.result;
							document.getElementById('sms_imges_show').style.display='';
							if(fileToLoad.size<=7490)
							 {
								 document.getElementById(id_where_prev).style.width='';
								 document.getElementById(id_where_prev).style.height='';
								 document.getElementById(id_where_prev).style.maxWidth='180px';
								 document.getElementById(id_where_prev).style.maxHeight='120px';
							 }
						 };
						 fileReader.readAsDataURL(fileToLoad);

					   document.getElementById("save_img").style.display='';
					}
			      else{ alert("Sorry....!! its Size is  Vary Large.\n\nUploade <= 2MB");
				        document.getElementById(fileOBJ).value="";
					  }
			}
		  else{alert("Unacceptable Formate..!! Retry.");
		       document.getElementById(fileOBJ).value="";
			  }
	}
 document.getElementById('safari1').value='';
 if(flag_for_safari!=0)
  {
	  document.getElementById('safari1').value='^7safari*1';
   }
}
function getXMLHTTP(){var xmlhttp=false;try{ xmlhttp=new XMLHttpRequest();} catch(e){try{xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");} catch(e){ try{ xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");} catch(e1){ xmlhttp=false;}} } return xmlhttp;} function save_img1(idvalue,file_uploaded,user_img_div_id){if(idvalue==1 || idvalue=='1' &&  (fileToLoad.length>0 && fileToLoad.type.match("image.*"))){if(fileToLoad.size<2048000){document.getElementById('form1').style.visibility='visible';document.getElementById('file_i').style.visibility='hidden';return true;} else{alert('File Not Supportable...\n please try again');}} return false;}

function previewImage(id_where_prev,fileOBJ)
 { alert('in preview');
	 var flag_for_safari=0;
	 var nVer = navigator.appVersion;
	 var nAgt = navigator.userAgent;
	 var browserName  = navigator.appName;
	 var fullVersion  = ''+parseFloat(navigator.appVersion);
	 var majorVersion = parseInt(navigator.appVersion,10);
	 var nameOffset,verOffset,ix;
	 if ((verOffset=nAgt.indexOf("Safari"))!=-1){browserName = "Safari";flag_for_safari=1;}

	 var filesSelected = document.getElementById(fileOBJ).files;
	 if (filesSelected.length > 0)
	  {
		 for(var j=0;j<filesSelected.length;j++){
		  fileToLoad = filesSelected[j];
		  if (fileToLoad.type.match("image.*"))
		   { if(fileToLoad.size<(2072000*2))
			    {

					   var fileReader = new FileReader();
					   fileReader.onload = function(fileLoadedEvent)
					    {
							var i__=document.createElement('img');
							i__.id=id_where_prev+val;
							i__.style.maxWidth='50px';
							i__.style.maxHeigth='50px';
							i__.style.padding='9px';
							filesSelected.parentNode.appendChild(i__);
							i__.src='GIF/6.gif';
						    if(document.getElementById('uploaded_img_tr') && document.getElementById('uploaded_img_tr').style.display=='none')
							  {document.getElementById('uploaded_img_tr').style.display='';}

							i__.src=fileLoadedEvent.target.result;
							val++;

							if(document.getElementById('sms_imges_show'))document.getElementById('sms_imges_show').style.display='';
							if(fileToLoad.size<=7490 &&  document.getElementById(id_where_prev))
							 {
								 document.getElementById(id_where_prev).style.width='';
								 document.getElementById(id_where_prev).style.height='';
								 document.getElementById(id_where_prev).style.maxWidth='180px';
								 document.getElementById(id_where_prev).style.maxHeight='120px';
							 }
						 };
						 fileReader.readAsDataURL(fileToLoad);

					   if(document.getElementById("save_img"))document.getElementById("save_img").style.display='';
					}
			      else{ alert("Sorry....!! its Size is  Vary Large.\n\nUploade <= 2MB");
				         document.getElementById(fileOBJ).value="";
					  }
			}
		  else{alert("Unacceptable Formate..!! Retry.");
		     document.getElementById(fileOBJ).value="";
			  }
		 }
	}

 document.getElementById('safari1').value='';
 if(flag_for_safari!=0)
  {
	  document.getElementById('safari1').value='^7safari*1';
   }
}


 function previewImage_onSelect(id_where_prev,fileOBJ) {
	 if(!fileOBJ){return false;}
	 var flag_for_safari=0;
	 var nVer = navigator.appVersion;
	 var nAgt = navigator.userAgent;
	 var browserName  = navigator.appName;
	 var fullVersion  = ''+parseFloat(navigator.appVersion);
	 var majorVersion = parseInt(navigator.appVersion,10);
	 var nameOffset,verOffset,ix;
	 if ((verOffset=nAgt.indexOf("Safari"))!=-1){browserName = "Safari";flag_for_safari=1;}

	 var filesSelected = fileOBJ.files;
	 var id_where_prevDiv = document.getElementById(id_where_prev);
	 if(id_where_prevDiv){
		id_where_prevDiv.style.display='';
		id_where_prevDiv.style.backgroundColor='rgba(127,127,128,1)';
	 }
	 if (filesSelected.length > 0)
	  {
		 for(var j=0;j<filesSelected.length;j++){
		  fileToLoad = filesSelected[j];
		  if (fileToLoad.type.match("image.*"))
		   { if(fileToLoad.size<(2072000*2))
			    {

					   var fileReader = new FileReader();
					   fileReader.onload = function(fileLoadedEvent)
					    {
							var i__=document.createElement('img');
							i__.id=id_where_prev+val;
							i__.style.maxWidth='70px';
							i__.style.maxHeigth='65px';
							i__.style.padding='9px';
							id_where_prevDiv.appendChild(i__);
							i__.src='GIF/6.gif';
							i__.src=fileLoadedEvent.target.result;
							val++;

						 };
						 fileReader.readAsDataURL(fileToLoad);

					}
			      else{ alert("Sorry....!! its Size is  Vary Large.\n\nUploade <= 2MB");
				         fileOBJ.value="";
					  }
			}
		  else{alert("Unacceptable Formate..!! Retry.");
		     document.getElementById(fileOBJ).value="";
			  }
		 }
	}

 if(document.getElementById('safari1')){document.getElementById('safari1').value='';}
 if(flag_for_safari!=0)
  {
	  if(document.getElementById('safari1')){document.getElementById('safari1').value='^7safari*1';}
   }
}



</script>