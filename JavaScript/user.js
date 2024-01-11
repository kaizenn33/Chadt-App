let searchBar = document.querySelector(".users .search #search"),
    searchBtn = document.querySelector(".users .search button"),
    userList = document.querySelector(".users .users-list");
    
    searchBtn.onclick = () =>{
        
        searchBar.classList.toggle("active");
        searchBtn.classList.toggle("active");
        searchBar.focus();
        
    }
    searchBar.onkeyup = ()=> {
        let Searchterm = searchBar.value;
        if(Searchterm != ""){
            searchBar.classList.add("active");
        }else{
            searchBar.classList.remove("active");
        }
        //starting AJAX
    let xhr = new XMLHttpRequest();//creating xml object
    xhr.open("POST", "php/search.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response
                userList.innerHTML = data;        
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("SearchTerm=" + encodeURIComponent(Searchterm));
    }
    setInterval(()=>{
        //starting AJAX
    let xhr = new XMLHttpRequest();//creating xml object
    xhr.open("GET", "php/user.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response
                if(!searchBar.classList.contains("active")){
                    userList.innerHTML = data; 
                }        
            }
        }
    }
    xhr.send();
    }, 300);
