<?PHP if(session_id()==''){session_start();} include("../globals_var.php"); ?>
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
.moef{
	background:#FF9900;
	font-weight:900;
}
</style>

<style>
.emoji-container {
    position: relative;
    width: 400px;
    margin: 50px auto;
}


.emoji-picker {
    display: none;
    position: absolute;
    right: 0;
    bottom: 40px;
    width: 300px;
    height: 200px;
    overflow-y: scroll;
    background: white;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.emoji-picker.show {
    display: block;
}

.emoji-picker span {
    display: inline-block;
    font-size: 24px;
    padding: 5px;
    cursor: pointer;
    transition: transform 0.2s;
}

.emoji-picker span:hover {
    transform: scale(1.2);
}
    </style>



<style>
/*context menu*/
#context-menu {
  position: absolute;
  background: white;
  border: 1px solid #ddd;
  border-radius: 4px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.2);
  padding: 8px;
  z-index: 1000;
  display: flex;
  flex-direction: column;
  gap: 5px;
  min-width: 120px;
}
#context-menu button {
  padding: 6px 12px;
  border: none;
  background: #f5f5f5;
  cursor: pointer;
  border-radius: 3px;
  text-align: left;
}

#context-menu button:hover {
  background: #e0e0e0;
}

.hidden {
  display: none !important;
}

.item {
  padding: 15px;
  margin: 10px;
  background: #f8f8f8;
  border: 1px solid #eee;
  cursor: default;
}

.item:hover {
  background: #f0f0f0;
}




.message-input-area {
  position: relative;
  background-color: white;
  border: 1px solid gray;
  border-radius: 4px;
  padding: 5px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 100%;
}

.message-input-area textarea {
  flex: 1;
  height: 60px;
  resize: none;
  font-size: 16px;
  border: none;
  outline: none;
  padding: 10px;
  border-radius: 4px;
  box-sizing: border-box;
}

.icons-right {
  display: flex;
  align-items: center;
  gap: 8px;
  margin-left: 20px;
  margin-right: 5px;
}

#emoji-btn {
  font-size: 28px;
  cursor: pointer;
  margin-left: -4px;
}

#uploadfiles_icon {
  width: 26px;
  height: 26px;
  cursor: pointer;
}

#msgbtn {
  margin-top: 6px;
  float: right;
  height:40px;
  width: 200px;
  background: #2D2D2D;
  color: yellow;
  padding: 6px 14px;
  border: none;
  cursor: pointer;
  display: inline-block;
}
</style>




<?PHP
if(isset($_SESSION["USER_DETAILS"]) && isset($_SESSION["USER_DETAILS"]["id"]) && $_SESSION["USER_DETAILS"]["id"]!=""){}
else{
	echo "<script>alert('Login First.'); document.location.href='index.php';</script>";
}
 include("../app/preview_js.php");
 include("../app/xmlhttpreq.php");?>
<link rel="shortcut icon" href="../app/logo2.ico" type="image/ico" />

</head>

<body id="bodypg" style="font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif; ">
        <?PHP  $basefolder=$BaseUrl="../app/";
	          include_once("../app/header_logo.php");
		?>
	<div class="container-fluid" id="conainer_id" style="padding:10px;padding-top:50px; ">
    	<div class="container" style="background-color:rgba(183,240,247,0.8);">
        		 <div class="row" style="border:solid thin rgba(69,69,69,1);">
                 	<div class="col-lg-12">

                    <!-- users-search-bar -->
                    <style>
                        @media screen and (max-width: 480px) {
                          .chat-search-bar input {
                            font-size: 14px;
                            padding: 6px 10px;
                          }
                        }
                        .chat-search-bar {
                          display: flex;
                          align-items: center;
                          background-color: #c8e5eb;
                          padding: 8px 12px;
                          border-radius: 6px;
                          margin: 10px;
                        }

                        .chat-search-bar input {
                          flex: 1;
                          padding: 8px 12px;
                          font-size: 16px;
                          border: none;
                          border-radius: 20px;
                          outline: none;
                        }
                    </style>


                    <!----Three Dot Menu--->

                        <head>
                          <title>Three Dot Menu</title>
                          <style>
                            .menu-container {
                              position: relative;
                              display: inline-block;
                            }

                            .dots {
                              cursor: pointer;
                              font-size: 24px;
                              padding: 10px;
                            }

                            .dropdown {
                              display: none;
                              position: absolute;
                              right: 0;
                              background-color: white;
                              box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
                              min-width: 160px;
                              z-index: 1;
                              border-radius: 5px;
                            }

                            .dropdown a {
                              color: black;
                              padding: 12px 16px;
                              text-decoration: none;
                              display: block;
                            }

                            .dropdown a:hover {
                              background-color: #f1f1f1;
                            }

                            .profile-section {
                              display: flex;
                              align-items: center;
                              gap: 10px;
                              padding: 10px;
                            }
                            .profile-pic {
                              width: 36px;

                              border-radius: 50%;
                              object-fit: cover;
                            }

                          </style>
                        </head>
                        <body>

                        <div class="menu-container">


                            <div class="chat-search-bar" style="
                                width:1080px;
                                display: flex;
                                align-items: center;
                                background-color: #c8e5eb;
                                padding:5px;
                                border-radius: 6px;
                                  margin-bottom: -50;


                            ">
                                <input type="text" id="chatSearch" placeholder="Search Users To Start Chats..."
                                    style="flex:1;pan style=margin-left: 10px; font-size: 20px; cursor: pointer;">🔍</span>
                            </div>

                          <div class="dots" style=margin-left:1100px; onclick="toggleMenu()">&#8942;</div>
                          <div class="dropdown" id="dropdownMenu">


<!-- Profile Picture Section -->
<div class="profile-section" style="display: flex; align-items: center; gap: 10px;">
  <label for="upload-photo" style="cursor: pointer;">
    <img id="profilePreview" src="../app/user_15.png" alt="Profile" class="profile-pic" />
  </label>
  <input type="file" id="upload-photo" style="display:none" accept="image/*" />

  <!-- ✅ Show username next to profile pic -->
  <div style="font-weight: bold; color: #333; font-size: 16px;">
    <?php
      if (session_status() == PHP_SESSION_NONE) {
    session_start();
} // just in case not already
      echo isset($_SESSION['USER_DETAILS']['name'])
        ? htmlspecialchars($_SESSION['USER_DETAILS']['name'])
        : 'Guest';
    ?>
  </div>
</div>

                            <a href="account.php">Account </a>
                            <div class="dropdown-section">
  <a href="privacy.php" class="dropdown-toggle" onclick="togglePrivacyMenu(event)">Privacy ▾</a>
  <div class="dropdown-submenu" id="privacySubmenu" style="display:none; padding-left: 15px;">
    <a href="#" onclick="if(confirm('Change your USER-Name?')){ window.location.href='change_user_name.php'; } return false;">Change USER-Name</a>
    <a href="#" onclick="if(confirm('Change your Password?')){ window.location.href='change_password.php'; } return false;">Change Password</a>
  </div>
</div>
                            <a href="avatar.php">Avatar</a>
                            <a href="list.php">List</a>
                            <a href="chats.php">Chats</a>
                            <a href="notifications.php">Notifications</a>
                            <a href="Storage&data.php">Storage and Data</a>
                            <a href="app_language.php">App Language</a>
                            <a onClick="var _p = confirm('Do You Want To Logout'); if(_p){document.location.href='logout.php';}">Logout</a>

                          </div>
                        </div>

                        </body>

                    </div>
                 </div>
        		 <div class="row" style="border:solid thin rgba(69,69,69,1);">
                 	<div class="col-xs-9">
                      <div class="row" id="chatbox_row">
                      		<div class="col-xs-12" id="chatbox_col"  style="height:83%; border:none; overflow:auto; ">
                        		
                        	</div>


                                <style>
                <!----profile-section--->
                                .profile-section {
                                  display: flex;
                                  align-items: center;
                                  padding: 10px;
                                  border-bottom: 1px solid #ddd;
                                  margin-bottom: 10px;
                                }

                                .profile-pic {
                                  width: 45px;
                                  height: 45px;
                                  border-radius: 50%;
                                  object-fit: cover;
                                  cursor: pointer;
                                  border: 2px solid #ccc;
                                }
                            </style>
                                <!----upldimg--->

                                 </div><!--ROW-->
                      <div class="row" id="Msgbox_row" style=" border-top:solid thin rgba(171,171,171,1);">
                      		<div class="col-xs-12" id="Msgbox_col" style="height:100px; padding:5px;">
                            	<div id="preview" style=" position:absolute; top:-80px; padding:5px; color:silver; border:solid thin gray; display:none;"></div>


                                <div class="message-input-area">
  <textarea id="cmsg" placeholder="Type your message..."></textarea>
  <div class="icons-right">
    <span id="emoji-btn">😊</span>
    <div class="emoji-picker" id="emoji-picker"></div>
    <img src="../app/icons/fupload.jpg" id="uploadfiles_icon" onclick="document.getElementById('xfiles').click();">
  </div>
</div>

<input type="file" id="xfiles" data-previewdivid='preview' style="display:none;"
  onChange="if(this.files[0]!='undefined'){var _pe = document.getElementById('preview'); if(_pe){_pe.style.display=''; _pe.innerHTML= this.files[0].name +' , Size: '+Math.abs(this.files[0].size / (1025*1024)).toFixed(2) +'MB';} previewImage_onSelect('preview',this);}"
  multiple />

<button id="msgbtn">SEND</button>

                        	</div>
                      </div><!--ROW-->

                    </div><!--col-xs-9-->
                    <div class="col-xs-3" style="border-left:solid thin rgba(47,47,47,1); height:99%; padding-top:20px; overflow:auto;" id="userrs">
                      USERS
                    </div><!--col-lg-9-->
                 </div><!--ROW-->


        </div> <!---container-->
        <!-- Context Menu -->
        <div id="context-menu" class="hidden">
          <button class="edit-btn">Edit</button>
          <button class="delete-btn">Delete</button>
        </div>
    </div><!----CONTAINER-fluid---> 
 <?PHP  $isindex=1; $istoday=0; $isQR=1; include("../app/xfooter.php");  ?><!-----footer----->  
 

  <script>
            document.addEventListener('DOMContentLoaded', function() {
            const emojiBtn = document.getElementById('emoji-btn');
            const emojiPicker = document.getElementById('emoji-picker');
            const textarea = document.getElementById('cmsg');
            if (textarea) {
              textarea.focus();
            }

            // Common emojis - you can expand this list
            const emojis = [
                '😀', '😃', '😄', '😁', '😆', '😅', '😂', '🤣', '😊', '😇',
                '🙂', '🙃', '😉', '😌', '😍', '🥰', '😘', '😗', '😙', '😚',
                '😋', '😛', '😝', '😜', '🤪', '🤨', '🧐', '🤓', '😎', '🤩',
                '🥳', '😏', '😒', '😞', '😔', '😟', '😕', '🙁', '☹️', '😣',
                '😖', '😫', '😩', '🥺', '😢', '😭', '😤', '😠', '😡', '🤬',
                '🤯', '😳', '🥵', '🥶', '😱', '😨', '😰', '😥', '😓', '🤗',
                '🤔', '🤭', '🤫', '🤥', '😶', '😐', '😑', '😬', '🙄', '😯',
                '😦', '😧', '😮', '😲', '🥱', '😴', '🤤', '😪', '😵', '🤐',
                '🥴', '🤢', '🤮', '🤧', '😷', '🤒', '🤕', '🤑', '🤠', '😈',
                '👿', '👹', '👺', '💀', '☠️', '👻', '👽', '👾', '🤖', '💩',
                '😺', '😸', '😹', '😻', '😼', '😽', '🙀', '😿', '😾'
            ];

            // Insert emojis into the picker
            emojis.forEach(emoji => {
                const span = document.createElement('span');
                span.textContent = emoji;
                span.addEventListener('click', () => {
                    insertAtCursor(textarea, emoji);
                });
                emojiPicker.appendChild(span);
            });

            // Toggle emoji picker
            emojiBtn.addEventListener('click', () => {
                emojiPicker.classList.toggle('show');
            });

            // Close emoji picker when clicking outside
            document.addEventListener('click', (e) => {
                if (!emojiPicker.contains(e.target) && e.target !== emojiBtn) {
                    emojiPicker.classList.remove('show');
                }
            });

            // Function to insert text at cursor position
            function insertAtCursor(textarea, text) {
                const startPos = textarea.selectionStart;
                const endPos = textarea.selectionEnd;
                const beforeText = textarea.value.substring(0, startPos);
                const afterText = textarea.value.substring(endPos, textarea.value.length);

                textarea.value = beforeText + text + afterText;
                textarea.selectionStart = startPos + text.length;
                textarea.selectionEnd = startPos + text.length;
                textarea.focus();
            }
        });

    </script>
 <script>
/*for context menu
document.addEventListener('DOMContentLoaded', function() {
  const contentArea = document.getElementById('chatbox_col');
  const contextMenu = document.getElementById('context-menu');
  var currentTarget = null;

  // Show menu on double click
  contentArea.addEventListener('dblclick', function(e) {
    // Prevent showing menu when double-clicking on buttons
    if (e.target.tagName === 'BUTTON') return;
    
    // Find the nearest item element or use the clicked element
    currentTarget = e.target.closest('.item') || e.target;
    
    // Position the menu at cursor position
    positionMenu(e.clientX, e.clientY);
    
    // Show the menu
    contextMenu.classList.remove('hidden');
    
    // Prevent default double-click behavior
    e.preventDefault();
  });

  // Hide menu when clicking elsewhere
  document.addEventListener('click', function(e) {
    if (!contextMenu.contains(e.target)) {
      contextMenu.classList.add('hidden');
    }
  });

  // Position menu function (handles edge cases)
  function positionMenu(x, y) {
    const menuWidth = contextMenu.offsetWidth;
    const menuHeight = contextMenu.offsetHeight;
    const windowWidth = window.innerWidth;
    const windowHeight = window.innerHeight;
    
    // Adjust position if near window edges
    const adjustedX = x + menuWidth > windowWidth ? windowWidth - menuWidth - 5 : x;
    const adjustedY = y + menuHeight > windowHeight ? windowHeight - menuHeight - 5 : y;
    
    contextMenu.style.left = `${adjustedX}px`;
    contextMenu.style.top = `${adjustedY}px`;
  }

  // Edit button functionality
  document.querySelector('.edit-btn').addEventListener('click', function() {
    if (!currentTarget) return;
    
    // Replace with your edit logic
    const newText = prompt('Edit content:', currentTarget.textContent);
    if (newText !== null) {
      currentTarget.textContent = newText;
    }
    contextMenu.classList.add('hidden');
  });

  // Delete button functionality
  document.querySelector('.delete-btn').addEventListener('click', function() {
    if (!currentTarget) return;
    
    if (confirm('Are you sure you want to delete this item?')) {
      currentTarget.remove();
    }
    contextMenu.classList.add('hidden');
  });

  // Close menu when pressing Escape
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      contextMenu.classList.add('hidden');
    }
  });
}); */


</script>
 
 
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
 /*This is user-list-update js.*/
  function HandleMsgop(r, rdivid){ console.log(r, rdivid);
	  var rdiv = document.getElementById(rdivid);
	  if(rdiv){
		var _x = r.split("~`~"); 
		if(typeof _x!="undefined" && _x[0] =="M1"){
			if(typeof _x[1] !="undefined" && _x[1]=="delete"){
				rdiv.parentNode.style.display='none';
			} 
		}else{
			if(typeof _x[1] !="undefined" && _x[1]=="delete"){
				rdiv.parentNode.style.backgroundColor ="rgba(255,255,255,1)";

			}	
			if(typeof _x[1] !="undefined" && _x[1]=="edit"){
				alert('Your message is not updated in database.');
			}
		}
	  }
  }
  function checkEnterKey(e){ 
	 var characterCode; 
	 e = (e || window.event); 
	 characterCode = e.keyCode || e.which;
	 if (characterCode == 13)
	 { return true; }else{return false;}
}	
  var _timer_for_old_msg_read = {'timer':null, 'uid':null, 'name':null};
  function pauseStart_msgfetch(_timer, ps){
	  if(ps=='pause'){
		  if(typeof _timer['timer']!="undefined" && _timer['timer']!=null){
			clearInterval(_timer['timer']); 	
		 }
	  }else{
		  	if(_timer['timer']){clearInterval(_timer['timer']);}
		  _timer_for_old_msg_read['timer'] = setInterval(function(){loadOldChats_fromDB("chats",_timer_for_old_msg_read['uid'], _timer_for_old_msg_read['name']);}, 3000);
	  }
  }
  function EditMessage(msgP){
	  if(msgP){
		  pauseStart_msgfetch(_timer_for_old_msg_read, 'pause');
		  msgP.setAttribute('contenteditable', 'true');
		  msgP.style.backgroundColor='yellow';
		  msgP.focus();
		  msgP.addEventListener("keypress", function(){
			  if(checkEnterKey(event)==true){
			 	this.removeAttribute('contenteditable');
				msgP.style.backgroundColor='rgba(225, 230, 237,0.5)'; 
			    pauseStart_msgfetch(_timer_for_old_msg_read, 'start');
				 var _f =  new FormData();
	   				 _f.set('mid', msgP.id); 
					 _f.set('editedmsg', msgP.innerHTML);
		 			_f.set('op', 'edit');
		 			var targetUri = "EDIT_DELETE_MSG.php"; 
	  	 			sendOnServerData(targetUri,_f,msgP.id,HandleMsgop); 
			  }
		  });
	  } 
  }
  function MsgOnClickFunctionality(msgP){
      msgP.style.backgroundColor="yellow";
	  var _x = prompt("Enter your option\n 1. Delete\n 2. Edit");
	   var _f =  new FormData();
	   _f.set('mid', msgP.id);
	  if(_x=='1'){ /*Delete*/ 
	  	 msgP.parentNode.style.backgroundColor ="rgba(255,0,0,0.5)";
		 _f.set('op', 'delete');
		 var targetUri = "EDIT_DELETE_MSG.php";
	  	 sendOnServerData(targetUri,_f,msgP.id,HandleMsgop); 
	  }else if(_x=='2'){ /*Edit*/ 
		  EditMessage(msgP)
	  }
	  
  }
  
   function showUsers(serverResp, resultDivid){
	 var rdiv = document.getElementById(resultDivid);
	 if(rdiv){
		rdiv.style.display='';
		var _x = serverResp.split("~`~");
		if(typeof  _x!="undefined" && _x.length > 0 && _x[0]=="S1"){ 
			 if(resultDivid=="chats"){
				rdiv.innerHTML += _x[1]  
				rdiv.dataset.loadedchatsupto = _x[2];
				/*delete new added offline msgs*/
				const newElements = rdiv.querySelectorAll('[id^="new_"]'); 
				newElements.forEach(element => { element.style.display='none';}); 
				if(scrollToBottom){scrollToBottom("chatbox_col");}
			 }else{
				rdiv.innerHTML = _x[1]  
			 }
		}else{
			rdiv.innerHTML =_x[1]; 
		}
	 }
 }
 function getUsers(){
	 var _formx = new FormData();
	var targetUri = "returnUsers.php";
	sendOnServerData(targetUri,_formx,'userrs',showUsers);
 }
 var _t1 = setInterval(function(){ getUsers(); }, 150000); getUsers();		
/**CODE FOR MSG BTTON**/
function AddMessageToChatWindow(chatw, txtarea,sender ){
	var fileObj = (typeof txtarea.dataset.fileslistx !="undefined")?document.getElementById(txtarea.dataset.fileslistx):null;

	if(chatw && ((txtarea.value.trim()!="" && txtarea.value.length>0) || (typeof fileObj!="undefined" && fileObj!=null && fileObj.files.length>0) )){
		chats_dv = chatw.querySelector('#chats');
		if(chats_dv){

			var spanid = performance.now();
			var msg = txtarea.value.trim();
			var files_prev_txt = "";
			for(var i=0; i<fileObj.files.length;i++){
				var ifile = fileObj.files[i];
				if(ifile){
					files_prev_txt += ifile.name+" , "
				}
			}
			chats_dv.innerHTML += "<p id='new_"+spanid+"' style='padding:5px; border:solid thin #007008; width:96%; text-align:right;'>"+txtarea.value.trim()+"<br/>attachments: "+files_prev_txt+"</p>";
			if(scrollToBottom){scrollToBottom("chatbox_col");}
			txtarea.value = "";
			var previewdiv = document.getElementById(fileObj.dataset.previewdivid);
			if(previewdiv){previewdiv.style.display='none';}
			if(fileObj.files.length>0){
				saveChatsWithfiles_intoDB(msg, fileObj, chats_dv.dataset.uid, spanid);
			}else{
				saveChats_intoDB(msg, chats_dv.dataset.uid, spanid);
			}
		}
	}
}
 var msgbtn = document.getElementById('msgbtn');
 var chatbox_col  = document.getElementById('chatbox_col');

 if(msgbtn){
	 msgbtn.addEventListener("click", function(){

		if(chatbox_col.dataset.chatwindowid != "undefined" && chatbox_col.dataset.chatwindowid !=null){

			var chatw = document.getElementById(chatbox_col.dataset.chatwindowid);
			if(chatw){
				chatw.style.display='';
				var txtarea = document.getElementById('cmsg');
				txtarea.dataset.fileslistx = 'xfiles';
				var fileObj = (typeof txtarea.dataset.fileslistx !="undefined")?document.getElementById(txtarea.dataset.fileslistx):null;
				if((txtarea && txtarea.value.trim()!="") || (typeof fileObj!="undefined" && fileObj!=null && fileObj.files.length>0) ){
					AddMessageToChatWindow(chatw, txtarea,'me' );
				}
			}
		}else{
			alert('Select a user to chat.');	
		}
	 });
 }
 
 /*Add chat window on selection of user*/
 function handleMsgAck(serverResp, resultDivid){ 
	 var rdiv = document.getElementById(resultDivid);
	 if(rdiv){
		rdiv.style.display='';
		var _x = serverResp.split("~`~");
		if(typeof  _x!="undefined" && _x.length > 0 && _x[0]=="S1"){ 
			 rdiv.style.border='solid thin #0000FF';
			 
		}else{
			rdiv.style.border='solid thin #FF0000';
		}
	 }
 }

 function saveChatsWithfiles_intoDB(msg, fileObj, chat_withuser_id, spanid){console.log("saveChatsWithfiles_intoDB");
	 var _formx = new FormData();
	 _formx.set("oprn","savechat");
	 _formx.set('chatwithuid', chat_withuser_id);
	 _formx.set('umsg',msg);

	 for(var i=0;i<fileObj.files.length;i++){
	 _formx.append('files[]',fileObj.files[i]);}
	var targetUri = "save_get_Chats.php";
    fileObj.value ="";
	sendOnServerData(targetUri,_formx,spanid,handleMsgAck)
 }
 
 
  function saveChats_intoDB(msg, chat_withuser_id, spanid){ console.log("saveChats_intoDB");
	 var _formx = new FormData();
	 _formx.set("oprn","savechat");
	 _formx.set('chatwithuid', chat_withuser_id);
	 _formx.set('umsg',msg);
	var targetUri = "save_get_Chats.php";
	sendOnServerData(targetUri,_formx,spanid,handleMsgAck);
 }
 function loadOldChats_fromDB(chatdivid, chat_withuser_id, chat_withuser_name){
	 var _formx = new FormData();
	 _formx.set('chatwithuid', chat_withuser_id);
	 _formx.set('chatwithname', chat_withuser_name);
	 _formx.set('oprn',"oldchatreturn");
	 _formx.set('stl', document.getElementById(chatdivid).dataset.loadedchatsupto)
	var targetUri = "save_get_Chats.php?"+chat_withuser_name;
	sendOnServerData(targetUri,_formx,'chats',showUsers)
 }
 
 function openChatWindow(td){
	if(td && td.dataset.uid !="undefined"){
		var uid = 	td.dataset.uid;
		var uname = td.innerHTML;
		if(chatbox_col){
			chatbox_col.innerHTML = "<div class='row' id='chat_"+uid+"' style='padding:5px;'>"
										+ "<div class='col-sm-12' style='border-bottom:solid thin #003003; padding:5px; font-size:18px; font-weight:900; color:blue;'>"
											+ uname
										+"</div>"
										+ "<div class='col-sm-12' data-uid='"+uid+"' data-loadedchatsupto='0' id='chats' style='border:none; padding:5px; overflow:auto;'>"
											+ ""
										+"</div>"
									+"</div>";	
									chatbox_col.dataset.chatwindowid="chat_"+uid;
									loadOldChats_fromDB("chats",uid, uname);
									if(typeof _timer_for_old_msg_read['timer']!="undefined" && _timer_for_old_msg_read['timer']!=null){
									 	pauseStart_msgfetch(_timer_for_old_msg_read, 'pause');
									   _timer_for_old_msg_read = {'timer':null, 'uid':null, 'name':null};	
									}
									 _timer_for_old_msg_read['uid'] = uid;
									 _timer_for_old_msg_read['name'] = uname;
									 _timer_for_old_msg_read['timer'] =  "";
									 pauseStart_msgfetch(_timer_for_old_msg_read, 'start');
									 var lastScroll = chatbox_col.scrollTop;
									 chatbox_col.addEventListener('scroll', function(){
										 var c = this.scrollTop; 
										if(c<lastScroll){
												pauseStart_msgfetch(_timer_for_old_msg_read, 'pause');
										}else{
											pauseStart_msgfetch(_timer_for_old_msg_read, 'start');
										}
										lastScroll = this.scrollTop;
										
									});
		}
	}
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
 <!----users-search-bar--->
 <script>
// Wait for DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
  const searchInput = document.getElementById("chatSearch");

  if (!searchInput) {
    console.error("Search input element not found");
    return;
  }

  // Use keyup instead of keypress for better compatibility
  searchInput.addEventListener("keyup", function(event) {
    if (event.key === "Enter") {
      searchAndOpenUser(this.value);
    }
  });

  function searchAndOpenUser(query) {
    query = query.toLowerCase().trim();
    if (!query) return;

    const userList = document.getElementById("userrs");
    if (!userList) {
      console.error("User list container not found");
      return;
    }

    const users = userList.querySelectorAll("[data-uid]");
    let found = false;

    users.forEach(userElement => {
      const userName = userElement.textContent.toLowerCase().trim();
      if (userName.includes(query)) {
        // Check if openChatWindow function exists
        if (typeof openChatWindow === 'function') {
          openChatWindow(userElement);
          found = true;
          // Focus on message input after opening chat
          const msgInput = document.getElementById("cmsg");
          if (msgInput) msgInput.focus();
        } else {
          console.error("openChatWindow function not found");
        }
        return; // Exit loop after first match
      }
    });

    if (!found) {
      alert("User not found in current user list.");
    }
  }
});
<!----profile-section--->

document.getElementById('upload-photo').addEventListener('change', function (e) {
  const file = e.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (event) {
      document.getElementById('profilePreview').src = event.target.result;
    };
    reader.readAsDataURL(file);
  }
});
</script>


<!----key listener: captures Enter from anywhere--->
<script>
document.addEventListener("DOMContentLoaded", function () {
  const msgInput = document.getElementById("cmsg");     // message box
  const fileInput = document.getElementById("xfiles");  // file input
  const sendBtn = document.getElementById("msgbtn");    // SEND button

  function shouldSend() {
    const hasText = msgInput && msgInput.value.trim().length > 0;
    const hasFile = fileInput && fileInput.files.length > 0;
    return hasText || hasFile;
  }

  // ✅ Global key listener: captures Enter from anywhere
  document.addEventListener("keydown", function (e) {
    if (e.key === "Enter" && !e.shiftKey) {
      e.preventDefault();
      if (shouldSend()) {
        sendBtn.click();
      }
    }
  });
});
</script>

<script>
  function toggleMenu() {
    var menu = document.getElementById("dropdownMenu");
    if (menu.style.display === "block") {
      menu.style.display = "none";
    } else {
      menu.style.display = "block";
    }
  }
 </script>
  <script>
function togglePrivacyMenu(event) {
  event.preventDefault();
  const submenu = document.getElementById('privacySubmenu');
  submenu.style.display = submenu.style.display === 'none' ? 'block' : 'none';
}
</script>
<script>
  // Optional: Hide dropdown when clicking outside of it
  window.addEventListener("click", function (e) {
    var dots = document.querySelector(".dots");
    var menu = document.getElementById("dropdownMenu");

    if (!dots.contains(e.target) && !menu.contains(e.target)) {
      menu.style.display = "none";
    }
  });
</script>



</body>
</html>