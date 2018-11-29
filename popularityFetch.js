function popularityFetch(title, id){
    var myAJAX = new XMLHttpRequest();
    myAJAX.open("GET", "popularity.php?pop=" + title, true)
    myAJAX.send();
    myAJAX.onreadystatechange = function () {
        if (myAJAX.readyState == 4 && myAJAX.status == 200) {
            // alert(myAJAX.responseText);
            document.getElementById(id).parentElement.innerHTML = myAJAX.responseText;

        }
    }
}
