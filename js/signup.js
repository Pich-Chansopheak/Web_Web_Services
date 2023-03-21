const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e) => {
  e.preventDefault(); // preventing form from submitting
};

continueBtn.onclick = () => {
  // start ajax
  let xhr = new XMLHttpRequest(); // creating XML object
  xhr.open("POST", "php/signup.php", true);
  // function to be called when the request is recieved
  xhr.onload = () => {
    // state of XMLHttpRequest client;  either the data transfer has been completed successfully or failed.
    if(xhr.readyState === XMLHttpRequest.DONE){
      // xhr.status returns the numerical HTTP status code of the XMLHttpRequest's response
      if(xhr.status === 200){ // 200: "OK" (this is the standard response for successful HTTP requests)
        let data = xhr.response;  // returns the response's body content
        if(data == "success"){ // "success" come from ../php/signup.php
          location.href = "users.php";  // redirect to users.php
        }
        else{
          errorText.textContent = data;
          errorText.style.display = "block";
        }
      }
    }
  };
  // we have to send the form through ajax to php
  let formData = new FormData(form);  // creating new formData oject

  xhr.send(formData); //sending the form data to php
};
