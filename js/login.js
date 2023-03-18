const form =document.querySelector(".login form");
loginBtn = form.querySelector(".button input");

form.onsubmit=(e)=>{
    e.preventDefault();//preventing form from submitting
}

loginBtn.onclick = ()  =>{
    //start AJAX
    let xhr = new XMLHttpRequest(); //crate XML object
    xhr.open("POST","php/login.php");
    xhr.onload = () =>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
            }
        }
    }
    xhr.send();
}