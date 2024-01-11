const psw = document.querySelector(".form input[type = 'password']"),
toggleButton = document.querySelector(".form .field i");

toggleButton.onclick = ()=>{
    if(psw.type == "password"){
        psw.type = "text"
        toggleButton.classList.add("active");
    }else{
        psw.type = "password"
        toggleButton.classList.remove("active");
    }
}