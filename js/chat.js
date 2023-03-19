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
      }
    }
  };
  // we have to send the form through ajax to php
  // FromData ??
  let formData = new FormData(form);  // creating new formData oject
  xhr.send(formData); //sending the form data to php
}

setInterval(() => {
    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          chatBox.innerHTML = data;
        }
      }
    };

    let formData = new FormData(form);  // creating new formData oject
    xhr.send(formData); //sending the form data to php
  }, 500); //this function will run frequently after 500ms
  

