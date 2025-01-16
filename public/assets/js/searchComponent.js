window.onload = function() {
    InitSearch()
}

//Search component
function InitSearch(){
    /*document.querySelector("#form-search").onsubmit = function(event) {
        event.preventDefault();
        console.log(pagePrincipal)
        return false;
    }*/
    document.querySelector("#search_button").onclick = function(){
        event.preventDefault();
        console.log(pagePrincipal)
        var search = document.querySelector("#search")
        window.location.href = pagePrincipal+"/search/"+search.value;
    }
}