window.onload = function() {
    
    var darkMode = document.querySelector("#darkMode")
    darkMode.onclick = function(){
        if(GetItem("darkMode") == "nulll"){
            SaveItem("darkMode",true)
        }
        if(GetItem("darkMode") == "false"){
            console.log("true")
            SaveItem("darkMode","true")
        }else{
            console.log("false")
            SaveItem("darkMode","false")
        }
        ColocateDarkMode()
    }
    ColocateDarkMode();
    InitSearch()
};



let storage = window.localStorage;

function GetItem(id){
    let value = storage.getItem(id)
    if(value == null){
        SaveItem(id,"nulll")
        return GetItem(id)
    }else{
        return value
    } 
}

function SaveItem(id, value){
    storage.setItem(id,value)
}

function ColocateDarkMode(){
    var body = document.querySelector("body")
    var sidebar = document.querySelector("#sidebar")
    if(GetItem("darkMode") == "true"){
        document.getElementById("darkMode").checked  = true;
        body.classList.add("dark")
        if(sidebar != null){
            sidebar.classList.add("dark")
        }
        ForeachAllHAdd()
        document.querySelectorAll("strong").forEach(function(element){
            element.classList.add("dark")
        })
        if(document.querySelector("#header > ul > li:nth-child(5) > div > label") != null){
            document.querySelector("#header > ul > li:nth-child(5) > div > label").classList.add("dark")
        }else{
            document.querySelector("#header > ul > li:nth-child(6) > div > label").classList.add("dark")
        }
        document.querySelectorAll("a").forEach(function(element){
            element.classList.add("dark")
        })
        document.querySelector(".modal-content").classList.add("dark")
        document.querySelectorAll("input").forEach(function(element){
            element.classList.add("dark")
        })
    }else{
        document.getElementById("darkMode").checked  = false;
        body.classList.remove("dark")
        if(sidebar != null){
            sidebar.classList.remove("dark")
        }
        ForeachAllHRemove()
        document.querySelectorAll("strong").forEach(function(element){
            element.classList.remove("dark")
            console.log(element)
        })
        if(document.querySelector("#header > ul > li:nth-child(5) > div > label") != null){
            document.querySelector("#header > ul > li:nth-child(5) > div > label").classList.remove("dark")
        }else{
            document.querySelector("#header > ul > li:nth-child(6) > div > label").classList.remove("dark")
        }
        document.querySelectorAll("a").forEach(function(element){
            element.classList.remove("dark")
        })
        document.querySelector(".modal-content").classList.remove("dark")
        document.querySelectorAll("input").forEach(function(element){
            element.classList.remove("dark")
        })
    }
    console.log(document.querySelector("#header > ul > li:nth-child(5) > div > label"))
}

function ForeachAllHAdd(){
    for (let index = 1; index <= 6; index++){
        document.querySelectorAll("h"+index).forEach(function(element){
            element.classList.add("dark")
            console.log(element)
        })
    }
}

function ForeachAllHRemove(remove = false){
    for (let index = 1; index <= 6; index++){
        document.querySelectorAll("h"+index).forEach(function(element){
            element.classList.remove("dark")
            console.log(element)
        })
    }
}