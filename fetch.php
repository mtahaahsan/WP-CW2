<script src="popularityFetch.js"></script>

<?php
$str = $_GET['search'];
$data_json = '';
if(isset($_GET['search']))
    $str = urlencode(trim(strip_tags($_GET['search'])));
if($str!='') {
    $url = "http://www.omdbapi.com/?s=$str&apikey=7de88889";
    $data_json = file_get_contents($url);
    echo "<table>";
    if($data_json) {
        $data_array = json_decode($data_json, true);
        for ($x = 0; $x < sizeof($data_array['Search']); $x++) {
            $title = htmlentities($data_array['Search'][$x]['Title']);
            $type = htmlentities($data_array['Search'][$x]['Type']);
            $year = htmlentities($data_array['Search'][$x]['Year']);
            $poster = "<img src=" . ($data_array['Search'][$x]['Poster']);
            $button = '<button onclick="popularityFetch">Popularity</button>';
            $output .= '
                        <tr>
                            <td id="title">'.$title.'</td>
                            <td>'.$type.'</td> 
                            <td>'.$year.'</td>
                            <td>'.$poster.'</td>
                            <td>'.$button.'</td>
                        </tr>';
        }
        echo $output."</table>";
    }
} else echo "no title";

echo '<button onclick="popularityFetch()">Submit</button>';
?>

