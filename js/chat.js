const form = document.querySelector(".typing"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

 form.onsubmit = (e) => {
   e.preventDefault(); // preventing form from submitting
};

sendBtn.onclick = () =>{
    // start ajax
  let xhr = new XMLHttpRequest(); // creating XML object
  xhr.open("POST", "php/insert-chat.php", true);
  xhr.onload = () => {
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        inputField.value ="";//once message inserted into database then leave blank in the input field
        scrollToBottom();
      }
    }
  };
  // we have to send the form through ajax to php
  // FromData ??
  let formData = new FormData(form);  // creating new formData oject
  xhr.send(formData); //sending the form data to php
}

chatBox.onmouseenter =()=>{
  chatBox.classList.add("active");
}
chatBox.onmouseleave =()=>{
  chatBox.classList.remove("active");
}

setInterval(() => {
    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          chatBox.innerHTML = data;
          if(!chatBox.classList.contains("active")){
            scrollToBottom();
          }
        }
      }
    };

    let formData = new FormData(form);  // creating new formData oject
    xhr.send(formData); //sending the form data to php
  }, 500); //this function will run frequently after 500ms
  
  // make the chat box go to the bottom when new chat add 
function scrollToBottom(){
  chatBox.scrollTop = chatBox.scrollHeight;
}
