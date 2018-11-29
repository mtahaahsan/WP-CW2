<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="popularityFetch.js"></script>

<?php
$str = $_GET['search'];
$data_json = '';
if(isset($_GET['search']))
    $str = urlencode(trim(strip_tags($_GET['search'])));
if($str!='') {
    $url = "http://www.omdbapi.com/?s=$str&apikey=7de88889";
    $data_json = file_get_contents($url);
    echo "<table class='table table-hover table-dark'>
            <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Year</th>
            <th>Popularity</th>
            <th>Poster</th>
            </tr>";
    if($data_json) {
        $data_array = json_decode($data_json, true);
        for ($x = 0; $x < sizeof($data_array['Search']); $x++) {
            $title = htmlentities($data_array['Search'][$x]['Title']);
            $type = htmlentities($data_array['Search'][$x]['Type']);
            $year = htmlentities($data_array['Search'][$x]['Year']);
            $poster = "<img src=" . ($data_array['Search'][$x]['Poster']);
            $id = htmlentities($data_array['Search'][$x]['imdbID']);
            $button = "<button type=\"button\" class=\"btn btn-light\" id='text".$x."'  onclick=popularityFetch('".$id."','text".$x."')>Popularity</button>";
            $output .= '
                        <tr>
                            <td id="title">'.$title.'</td>
                            <td>'.$type.'</td> 
                            <td>'.$year.'</td>
                            <td>'.$button.'</td>
                            <td>'.$poster.'</td>
                        </tr>';
        }
        echo $output."</table>";
    }
} else echo "no title";


?>
