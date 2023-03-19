const form = document.querySelector(".typing form"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button");

sendBtn.onclick =()=>{
    // start ajax
  let xhr = new XMLHttpRequest(); // creating XML object
  xhr.open("POST", "php/chat.php", true);
  xhr.onload = () => {
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        if(data == "success"){
          location.href = "users.php";
        }
        else{
          errorText.textContent = data;
          errorText.style.display = "block";
        }
      }
    }
  };
  // we have to send the form through ajax to php
  // FromData ??
  let formData = new FormData(form);  // creating new formData oject

  xhr.send(formData); //sending the form data to php
}

