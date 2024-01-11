const form = document.querySelector(".typing-area"),
sendBtn = form.querySelector("button"),
inputBox = form.querySelector(".input-field"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) =>{
    e.preventDefault();
}

sendBtn.onclick = ()=>{
    //starting AJAX
    let xhr = new XMLHttpRequest();//creating xml object
    xhr.open("POST", "php/chat.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputBox.value = "";
            }
        }
    }
    let formData = new FormData(form);//creating form data obj
    xhr.send(formData);//sending form data
}
setInterval(()=>{
    //starting AJAX
let xhr = new XMLHttpRequest();//creating xml object
xhr.open("POST", "php/get-chat.php", true);
xhr.onload = () =>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response
            chatBox.innerHTML = data; 
            
        }
    }
}
let formData = new FormData(form);//creating form data obj
    xhr.send(formData);//sending form data
}, 300);
