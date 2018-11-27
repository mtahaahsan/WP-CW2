function display() {
    var myAJAX = new XMLHttpRequest();
    var str = document.getElementById("search-text").value;
    myAJAX.open("GET", "fetch.php?search=" + str, true)
    myAJAX.send();
    myAJAX.onreadystatechange = function () {
        if (myAJAX.readyState == 4 && myAJAX.status == 200) {
            document.getElementById('mydiv').innerHTML = myAJAX.responseText;

        }
    }
}
