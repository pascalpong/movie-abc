<?php
session_start();
error_reporting(0);
if($_SESSION['username'] == ''){
    header("location:../index.php");
}
if($_GET['log']=='out'){
    session_destroy();
    header("location:../index.php");
}

include '../classes/connect.php';


?>

<!DOCTYPE HTML>
<html lang="zxx">
	
<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Movie-ABC : Free Movies Online</title>
		<!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="../assets/img/favcion.png" />
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" media="all" />
		<!-- Slick nav CSS -->
		<link rel="stylesheet" type="text/css" href="../assets/css/slicknav.min.css" media="all" />
		<!-- Iconfont CSS -->
		<link rel="stylesheet" type="text/css" href="../assets/css/icofont.css" media="all" />
		<!-- Owl carousel CSS -->
		<link rel="stylesheet" type="text/css" href="../assets/css/owl.carousel.css">
		<!-- Popup CSS -->
		<link rel="stylesheet" type="text/css" href="../assets/css/magnific-popup.css">
		<!-- Main style CSS -->
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all" />
		<!-- Responsive CSS -->
		<link rel="stylesheet" type="text/css" href="../assets/css/responsive.css" media="all" />
		<!--[if lt IE 9]>
		  <script src="../https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="../https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
            
            <script>
            
            function checkThings(){
                
                var mv_link = $("#movie_link").val();
                var pic_link = $("#movie_pic").val();
                var mv_details = $("#movie_details").val();
                var mv_name = $("#movie_name").val();
                var mv_genre = $("#movie_genre").val();
                var mv_year = $("#movie_year").val();
                var audio = $("#audio").val();
                var kind =$("#kind").val();
                var episode =$("#episode").val();
                var season =$("#season").val();
                
//                alert(mv_link);
                
             $.post("api/insert_movie.php", { mv_link : mv_link , pic_link:pic_link , mv_details :mv_details ,mv_name:mv_name,mv_genre:mv_genre ,mv_year:mv_year , audio:audio, kind:kind , season:season , episode:episode }
                   , function (data) {

                        alert(data);
                                                                });
                                                                }

            
            </script>
            
            
            <form method="post">
                
 
                <div class="container">
                   <div class="card">
                       <p>You are : <?php echo $_SESSION['username'] ?></p>
                       <a style="text-align: right;color: grey" href="insert_movies_info.php?log=out" >logout</a>
                     <div class="card-body col-12">
                        <p>Name</p>
                              <input type="text" name="movie_name" id="movie_name" value="" />
                    </div>
                     <div class="card-body col-12">
                        <p>Movie link</p>
                              <input type="text" name="movie_link" id="movie_link" value="" />
                    </div>
                    <div class="card-body col-12">
                        <p>Pic</p>
                              <input type="text" name="movie_pic" id="movie_pic" value="" />
                    </div>
                    <div class="card-body col-12">
                        <p>Details</p>
                              <input type="text" name="movie_details" id="movie_details" value="" />
                    </div>
                     <div class="card-body col-12">
                        <p>Movie year</p>
                              <input type="text" name="movie_year" id="movie_year" value="" />
                    </div>
                     <div class="card-body col-12">
                        <p>Genre</p>
                        <input type="text" name="movie_genre" id="movie_genre" value="" placeholder="pls put # in between genres"/>
                    </div>
                    <div class="card-body col-12">
                        <p>Audio</p>
                        <select name="audio" id="audio">
                            <option value="TH" >Thai</option>
                            <option value="EN" >International</option>
                        </select>
                    </div>
                       <div class="card-body col-12">
                        <p>Kind</p>
                        <select onchange="selectSeason()" name="kind" id="kind">
                            <option value="TV" >TV show</option>
                            <option value="MOV" >Movie</option>
                        </select>
                        <input name="season" id="season"  type="number" placeholder="season" >
                        <input name="episode" id="episode"  type="number" placeholder="episode" >

                    </div>
                    <div class="card-body col-12">
                        <input type="submit" name="insert" onclick="checkThings()" value="insert" />
                    </div>
               </div> 
                    
                </div>
		<!-- jquery main JS -->
		<script src="../assets/js/jquery.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="../assets/js/bootstrap.min.js"></script>
		<!-- Slick nav JS -->
		<script src="../assets/js/jquery.slicknav.min.js"></script>
		<!-- owl carousel JS -->
		<script src="../assets/js/owl.carousel.min.js"></script>
		<!-- Popup JS -->
		<script src="../assets/js/jquery.magnific-popup.min.js"></script>
		<!-- Isotope JS -->
		<script src="../assets/js/isotope.pkgd.min.js"></script>
		<!-- main JS -->
		<script src="../assets/js/main.js"></script>
	</body>
           </form>
</html>