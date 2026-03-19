// JavaScript Document
/*coded by R.P.Meena*/
/*******************Slider start****************************/
var ImageData=[];
function shuffle(a) {
    for (var i = a.length; i; i--) {
        var j = Math.floor(Math.random() * i);
        [a[i - 1], a[j]] = [a[j], a[i - 1]];
    }
}

for(var i=0;i<54;i++){
	//if(LocalHostTest=='' || LocalHostTest=='0' || LocalHostTest==0){
	ImageData[i]={ src: (typeof istoday!="undefined" && istoday==1)?"../../slideshow/images/"+(i+1)+".jpg":((typeof isQR!="undefined" && isQR==1)?"../slideshow/images/"+(i+1)+".jpg":"slideshow/images/"+(i+1)+".jpg") };
	//}else{
	//ImageData[i]={ src: "images/"+(i+1)+".jpg" };	
	//}
}
shuffle(ImageData);
 
$("#bodypg,body").vegas({
	delay:13000,
	timer:false,
    slides:ImageData,
    animation: 'random',
	 transition: [ 'blur'],
	 //overlay:true
    /*transition: [ 'fade', 'zoomOut', 'swirlLeft' , 'zoomIn' , 'swirlLeft2' , 'zoomIn2' , 'slideLeft', 'slideRight', 'slideLeft2', 'swirlRight2', 'blur', 'burn2', 'blur2', 'swirlRight']*/
}); 

var ele=$("#bodypg,body");
   function handleRdv(rid, rtxt, flg){
	   if(document.getElementById(rid)){
		   var rdv=document.getElementById(rid);
		   if(rdv){
				rdv.style.display='';
				rdv.style.borderRadius='2px';
				rdv.innerHTML=rtxt;
				rdv.style.color='rgba(0,0,0,1)';
				if(flg=="s"){rdv.style.backgroundColor='rgba(0,255,0,.5)';}  
				else if(flg=="e"){rdv.style.backgroundColor='rgba(255,0,0,.5)';}   
				var xtmr=setTimeout(function(){ rdv.style.display='none'; clearTimeout(xtmr);},4000);
		   }
	   }else{
		alert("Result div is not found!");   
	   }
   }
   function vPlay(rdv){ 
	   if(ele){
		   if(typeof ele.vegas!="undefined"){
			 ele.vegas('play'); handleRdv(rdv, "Background-animation Started!", 's');
		   }else{
				handleRdv(rdv, "Vegas Object not found!", 'e'); return false;
		   }
	   }else{
			handleRdv(rdv, "document not found for this operation.",'e');  return false; 
	   }
   }
   function vPause(rdv){
	   if(ele){
		   if(typeof ele.vegas!="undefined"){
			 ele.vegas('pause');  handleRdv(rdv,"Background-animation Paused!",'s');
		   }else{
				handleRdv(rdv, "Vegas Object not found!", 'e'); return false;
		   }
	   }else{
			handleRdv(rdv,"document not found for this operation.",'e');  return false; 
	   }
   }
   function vDelay(rdv,tm){
	   if(ele){
		   if(typeof ele.vegas!="undefined"){
			 ele[0]._vegas.settings.delay=tm;
			 handleRdv(rdv, "Background-animation Delay Changed to"+tm, 's');
			 ele.vegas('pause');
			 ele.vegas('play');
		   }else{
				handleRdv(rdv,"Vegas Object not found!", 'e');    return false;
		   }
	   }else{
			handleRdv(rdv, "document not found for this operation.", 'e');  return false; 
	   }
   }
$(document).ready(function() {   
   var _set=document.getElementById('_setgs');
   if(_set){
		_set.addEventListener("mouseover", function(){
			this.style.border="solid thin silver";
		});
		_set.addEventListener("mouseout", function(){
			this.style.border="none";
		});
		_set.addEventListener("blur", function(){
			this.style.border="none";
		});
		_set.addEventListener("click", function(){
			if(document.getElementById("settings_")){
				var X_x=document.getElementById("settings_").style;
				if(X_x.display=="none"){X_x.display="";}
				else{X_x.display="none"; }
			}else{
			 var _ndv=document.createElement("DIV");
			 _ndv.id="settings_";
			 if(this.parentNode){
				 this.parentNode.appendChild(_ndv);
			 	 _ndv.style.border="solid thin silver";
				 _ndv.style.position='absolute';
				 _ndv.style.backgroundColor="rgba(242,242,242,.8)";
				 _ndv.style.borderRadius='5px';
				 _ndv.style.bottom='7%';
				 _ndv.style.left="10px";
				 _ndv.style.width="100%";
				 _ndv.style.maxWidth="400px";				 			 
				 _ndv.style.padding='5px';
				 _ndv.style.margin='5px';
				 _ndv.innerHTML="<div style='padding:4px; border-bottom:solid thin gray; font-weight:900; color:#000000; ' >Background-Settings <span style=\"color:red; padding:3px; border:none:100px; position:absolute; right:6px; cursor:pointer; top:6px; display:inline;\" title=\"Close\" onclick=\"if(document.getElementById('settings_')){document.getElementById('settings_').style.display='none';} \">X</span></div>";
				 _ndv.innerHTML+="<div style=\"padding:5px;\">";
				 	_ndv.innerHTML+="<span id='_start_x' style='padding:5px; margin:3px; border:solid thin silver; cursor:pointer; font-weight:900; color:#000000;border-radius:2px;'>Start</span> &nbsp; <span id='_stop_x' style='padding:5px; margin:3px; border:solid thin silver; cursor:pointer; font-weight:900; color:#000000; border-radius:2px; '>Pause</span> &nbsp; <span style='padding:6px; margin:3px; border:solid thin silver; cursor:pointer; font-weight:900; color:#000000; border-radius:2px; '>Delay <input type='number' id='_delay_x' value='15000' style=\"width:99%; max-width:120px; border:none;\" /> msec.</span>";
				 _ndv.innerHTML+="</div><div id='_rslt' style=\"padding:5px;display:none; border-top:solid thin silver;\"></div>";
				 
				 if(document.getElementById('_start_x')){
					document.getElementById('_start_x').addEventListener("click", function(){
						 vPlay('_rslt'); 
					}); 
				 }
				 if(document.getElementById('_stop_x')){
					document.getElementById('_stop_x').addEventListener("click", function(){
						 vPause('_rslt') ;
					}); 
				 }
				 if(document.getElementById('_delay_x')){
					document.getElementById('_delay_x').addEventListener("blur", function(){
						vDelay('_rslt',this.value);
					}); 
				 }
				 
			  }
			}/*else ... */
		});
   }
});
/*#####################################END##################################*/