<?php
/**
 * Created by PhpStorm.
 * User: mtahaahsan
 * Date: 11/13/2018
 * Time: 9:34 AM
 */

include ("connect.php");
    $stmt = $conn->prepare("SELECT userid,name,username FROM users");     //Statement for the sql, but no parameter
    $stmt->execute();
    echo("<table>
    <tr >
        <th>USERID</th>
        <th>Name</th>
        <th>Username</th>
        <th>Action</th>
    </tr>");
    $i = 0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $id = htmlentities($row['userid']);
        $name = htmlentities($row['name']);
        $username = htmlentities($row['username']);
        echo("
    <tr>
        <th>$id</th>
        <td >$name</td>
        <td >$username</td>
        <td id='txtHint'>.<button type='button' onclick='Delete($id,\"$name\")'>DELETE</button>.</td>
    </tr>");
    }

    echo("</table>");
    $conn = null;
    ?>

<script>
    function Delete(id,name) {
        var myAJAX = new XMLHttpRequest();
        myAJAX.open("GET","delete.php?id="+id+"&name="+name, true)
        myAJAX.send()   //Sends to delete.php
        myAJAX.onreadystatechange = function () {
             // alert(myAJAX.readyState);
            if(myAJAX.readyState == 4 && myAJAX.status == 200){
                //alert(myAJAX.responseText);
                     //Sets the return for the div
                var myJ = JSON.parse(myAJAX.responseText);

                document.getElementById('txtHint').innerHTML = myJ.name;
            }
        }
    }
</script>