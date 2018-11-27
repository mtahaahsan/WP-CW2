function Delete(str,) {
    var xmlhttp;

    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.open("GET", ".php?id=" + str, true);
    xmlhttp.send();

    xmlhttp.onreadystatechange = function () {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {

        }


    }

    function Welcome(str) {
        var myAJAX = new XMLHttpRequest();
        myAJAX.open("GET","getdata.php?id=" + str, true)
        myAJAX.send()   //Sends to getdata.php
        myAJAX.onreadystatechange = function () {
            // alert(myAJAX.readyState);
            if(myAJAX.readyState == 4 && myAJAX.status == 200){
                document.getElementById("txtHint").innerHTML = myAJAX.responseText;     //Sets the return for the div
            }
        }
    }



}