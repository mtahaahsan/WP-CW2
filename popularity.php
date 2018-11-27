<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/26/2018
 * Time: 4:48 PM
 */

//$search = $_GET["pop"];
$search = "Transformers";
$data_json = '';
if(isset($_GET['search']))
    $str = urlencode(trim(strip_tags($_GET['search'])));
if($search!='') {
    $url = "https://api.themoviedb.org/3/search/movie?api_key=41afd173c4bfc46c75da25a3f7f0a25a&language=en-US&query=$search&page=1&include_adult=false";
    $data_json = file_get_contents($url);
    echo "<table>";
    if ($data_json) {
        $data_array = json_decode($data_json, true);
        for ($x = 0; $x < sizeof($data_array['results']); $x++) {
            $title = htmlentities($data_array['results'][$x]['original_title']);
            $vote = htmlentities($data_array['results'][$x]['vote_average']);
            $popl = htmlentities($data_array['results'][$x]['popularity']);
            $output .= '
                        <tr>
                            <td>' . $title . '</td>
                            <td>' . $vote . '</td>
                            <td>' . $popl . '</td> 
                        </tr>';
        }
        echo $output."</table>";

    }else echo "no title";
}
?>