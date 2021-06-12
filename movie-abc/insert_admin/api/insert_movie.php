<?php
include '../../classes/connect.php';


$movie_name = $_POST['mv_name'];
$movie_link = '<iframe width="1920" height="1080" src="'.$_POST['mv_link'].'" frameborder="0" allowfullscreen></iframe>';
$movie_details = $_POST['mv_details'];
$movie_pic = $_POST['pic_link'];
$movie_genre = $_POST['mv_genre'];
$movie_year = $_POST['mv_year'];
$audio = $_POST['audio'];
$kind = $_POST['kind'];

if($kind=='MOV'){
    $season = '1';
    $episode = '1';
}else{
    $season = $_POST['season'];
    $episode = $_POST['episode'];
}

$sql = " SELECT name FROM mov_details WHERE name = '$movie_name'";
$rsa = $conn->query($sql);
$rowa = $rsa->fetch_assoc();

if($rowa['name'] == $movie_name){
    echo $movie_name.'exists in the DB already';
}else{

    $count = "SELECT IFNULL(COUNT(TYPE),0) AS total FROM mov_details WHERE TYPE = '$movie_genre'";
    $rs_count = $conn->query($count);
    $row_count = $rs_count->fetch_assoc();
    $the_code = $row_count['total']+1;
    $code = $audio.'-'.$the_code.'-'.date("Y-m-d");


        $insert_mov_details = "INSERT INTO mov_details (CODE,NAME,details,movie_link,pic_link,insert_date,type,movie_year,language,kind,season,episode) VALUES('$code','$movie_name','$movie_details','$movie_link','$movie_pic',NOW(),'$movie_genre','$movie_year','$audio','$kind','$season','$episode')";
        $result_mov_details = $conn->query($insert_mov_details);
        
echo 'Movie inserted';
}
