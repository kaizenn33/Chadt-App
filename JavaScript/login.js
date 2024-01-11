const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");


form.onsubmit = (e) =>{
    e.preventDefault();
}

continueBtn.onclick = () =>{
    //starting AJAX
    let xhr = new XMLHttpRequest();//creating xml object
    xhr.open("POST", "php/login.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response         
                if(data == "success"){
                    location.href = "users.php"
                }else{
                    errorText.style.display = "block";
                    errorText.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(form);//creating form data obj
    xhr.send(formData);//sending form data
}