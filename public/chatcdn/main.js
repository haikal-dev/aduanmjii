const popup 			= document.querySelector('.chat-popup');
const chatBtn 			= document.querySelector('.chat-btn');
const submitBtn 		= document.querySelector('.submit');
const chatArea 			= document.querySelector('.chat-area');
const inputElm 			= document.querySelector('#messageText');
const emojiBtn 			= document.querySelector('#emoji-btn');
const picker 			= new EmojiButton();

// api customer service
var sessionId = "";
var validateJSON = (data) => {
	try {
		JSON.parse(data);
		return true;
	}
	catch(e) {
		return false;
	}
};
var post = (data) => {
	var xhr = new XMLHttpRequest();
	xhr.open("POST", "https://v2.haikalazizan.com/chat/api/chatv1", true);
	xhr.setRequestHeader("Content-Type", "application/json");
	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4 && xhr.status === 200) {
			data.success(xhr.responseText);
		}
	};
	xhr.send(JSON.stringify(data.data));
};

// Emoji selection  
window.addEventListener('DOMContentLoaded', () => {

    picker.on('emoji', emoji => {
      document.querySelector('#messageText').value += emoji;
    });
  
    emojiBtn.addEventListener('click', () => {
      picker.togglePicker(emojiBtn);
    });
  });        

//   chat button toggler 
chatBtn.addEventListener('click', ()=>{
	
	if(document.querySelector('#sessionId').value == ""){
		post({
			data: {
				request: 'initChat'
			},
			success: function(data){
				if(validateJSON(data)){
					data = JSON.parse(data);
					document.querySelector('#sessionId').value = data.sessionId;
				}
			}
		});
	}
	popup.classList.toggle('show');
})

// send msg
submitBtn.addEventListener('click', ()=>{
    let userInput = inputElm.value;

	post({
		data: {
			request: 'sendMessage',
			sessionId: document.querySelector('#sessionId').value,
			message: userInput
		},
		success: function(data){
			console.log(data);
			if(validateJSON(data)){
				data = JSON.parse(data);
				if(data.message == 'ok'){
					let temp = `<div class="out-msg">
								<span class="my-msg">${userInput}</span>
								<img src="/chatcdn/img/me1.png" class="avatar">
								</div>`;
					chatArea.insertAdjacentHTML("beforeend", temp);
					inputElm.value = '';
				}
			}
		}
	});
})

// refresh data
setInterval(function(){
	
	if(document.querySelector('#sessionId').value != ""){
		post({
			data: {
				request: 'retrieve',
				sessionId: document.querySelector('#sessionId').value
			},
			success: function(data){
				if(validateJSON(data)){
					data = JSON.parse(data);
					var html = "";
					if(data.message == 'ok'){
						for(var i in data.history){
							var h = data.history[i];
							if(h['type'] == 'c'){
								html += `<div class="out-msg">
								<span class="my-msg">`+h['msg']+`</span>
								<img src="/chatcdn/img/me1.png" class="avatar">
								</div>`; 
							}
							else if(h['type'] == 's'){
								html += `<div class="income-msg">
											 <img src="/chatcdn/img/person1.jpg" class="avatar" alt="">
											 <span class="msg">`+h['msg']+`</span>
										 </div>`;
							}
						}
						document.querySelector('.chat-area').innerHTML = html;
					}
				}
			}
		});
		
	}
	
}, 3000)