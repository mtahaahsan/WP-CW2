<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/26/2018
 * Time: 4:48 PM
 */

$popsearch = $_GET["pop"];
$data_json = '';
if(isset($_GET['pop']))
    $popsearch = urlencode(trim(strip_tags($_GET['pop'])));
if($popsearch!='') {
    $url = "https://api.themoviedb.org/3/find/$popsearch?api_key=41afd173c4bfc46c75da25a3f7f0a25a&language=en-US&external_source=imdb_id";
    $data_json = file_get_contents($url);
            $data_array = json_decode($data_json, true);
            $popl = htmlentities($data_array['movie_results'][0]['vote_average']);
            echo $popl;

    }
?>