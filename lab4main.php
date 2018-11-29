<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<html>
<head>
    <h1>MOVIES</h1>
<?php
echo '<input type = "text" name="search-text" id="search-text" placeholder="Search">';
echo '<button onclick="display()">Submit</button>';

?>



<script src="display.js"></script>
<script src="popularityFetch.js"></script>
</head>
<div id="mydiv">

</div>


</html>