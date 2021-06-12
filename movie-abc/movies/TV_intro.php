<?php
include '../classes/connect.php';
if($_GET['mov_id'] != ''){
    $mov_auto_id = $_GET['mov_id'];
}else{
    $mov_auto_id = '';
}

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
	</head>
<body>
    <script>

    function changeGenre(){
        var genre = $('#genre').val();
         window.location.href = "../index.php?genre="+genre ;
    }

    </script>
	    <div id="preloader"></div>
		<!-- header section start -->
                <header class="header">
			<div class="container">
				<div class="header-area">
					<div class="logo">
						<a href="../index.php"><img src="../assets/img/logo.png" alt="logo" /></a>
					</div>
					<div class="header-right">
                                                                                <form>
                                                                                    <input name="search_movie" id="search_movie" type="text" <?php  if(isset($_GET['search'])){ echo " value='{$_GET['search']}' "; }  ?> />
                                                                                    <input type="button" onclick="searchMovies()" class="icofont icofont-search" value="Search" > 
                                                                                </form>
						<ul>
							<li><a href="../ads/ads_regis.php">Promote your products</a></li>
							<li><a href="../ads/ads_regis.php">Donate</a></li>
					 
						</ul>
					</div>
					<div class="menu-area">
						<div class="responsive-menu"></div>
					    <div class="mainmenu">
                                                                                        <ul id="primary-menu">
                                                                                            <li><a class="active" href="../index.php">Home</a></li>
                                                                                            <li><a href="TV_all.php">TV shows</a></li>
                                                                                            <li><a href="movie_all.php">All Movies</a></li>
                                                                                                                                <li><a href="#" id="genre">Genre<i class="icofont icofont-simple-down"></i></a>
									<ul>
                                                                                                                                                       <?php
                                                                                                                                                        $sql_genre = " SELECT * FROM mov_category  WHERE kind = 'MOV' ";
                                                                                                                                                        $rs_genre = $conn->query($sql_genre);
                                                                                                                                                        while($row_genre = $rs_genre->fetch_assoc()){
                                                                                                                                                        ?>
                                                                                                                                                        <li><a href="movie_all.php?genre=<?php echo  $row_genre['name'] ?>"><?php echo $row_genre['name']  ?></a></li>
                                                                                                                                                        <?php } ?>
									</ul>
								</li>
								<li><a href="#">Movie Languages <i class="icofont icofont-simple-down"></i></a>
									<ul>
                                                                                                                                                        <li><a href="movie_all.php?lang=TH">Thai audio</a></li>
                                                                                                                                                        <li><a href="movie_all.php?lang=EN">English audio</a></li>
									</ul>
								</li>
                                                                                        </ul>
					    </div>
					</div>
				</div>
			</div>
		</header>
                <div class="" style="" >
                <div style="margin-top:0rem" >
		<!-- portfolio section start -->
		<section class="portfolio-area pt-60 row ">
			<div class="container col-8">
 		<?php
						$show_movie = " select * from mov_details where auto_id = '$mov_auto_id' ";
						$rs_mov = $conn->query($show_movie);
                                                                                                $row_mov = $rs_mov->fetch_assoc();
                                ?>
				<div class="row flexbox-center">
					<div class="col-lg-6 text-center text-lg-left">
					    <div class="section-title">
							<h1><?php echo $row_mov['name'] ; ?></h1>
						</div>
					</div>
				</div>
			 
                                <div class="row" style="margin-top: 3rem">
                                    <div class="col-lg-12">
                                        <?php
                                            echo $row_mov['movie_link'];
                                        ?>
                                    </div>
		 </div>
                            

                            
                            
                                <div class="row" style="border-radius: 0rem;margin-top: 3rem" >
                                    <div class="card-body" style="background-color: none">
                                        <table class="">
                                            <tbody>
                                              <tr>
                                                <th scope="row">Name </th>
                                                <td><?php echo ':'.'  '.$row_mov['name']; ?></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">Details</th>
                                                <td><?php echo  ':'.'  '.$row_mov['details']; ?></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">Genre</th>
                                                <td>: <?php  $typess = explode('#', $row_mov['type']);
                                                
                                                for($i = 0 ; $i < count($typess) ; $i++){ 
                                                    ?>
                                               
                                                    <a href="movie_all.php?genre=<?php echo $typess[$i] ;?>"><?php echo $typess[$i] ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    
                                                <?php  } ?></td>
                                              </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
		</div>
                    <div class="col-3 text-center text-lg-left">
					    <div class="portfolio-sidebar">
							<img src="../assets/img/sidebar/sidebar1.png" alt="sidebar" />
							<img src="../assets/img/sidebar/sidebar2.png" alt="sidebar" />
							<img src="../assets/img/sidebar/sidebar3.png" alt="sidebar" />
							<img src="../assets/img/sidebar/sidebar4.png" alt="sidebar" />
						</div>
					</div>
                    
                    
		</section>
                				 
                </div>
                    </div>
                
                <!-- portfolio section end -->
		<!-- video section start -->
		<section class="video ptb-90">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
					    <div class="section-title pb-20">
							<h1><i class="icofont icofont-film"></i>Because you watch <?php echo $row_mov['name'] ;  ?></h1>
						</div>
					</div>
				</div>
				<hr />
				<div class="row">
 
                    <div class="col-md-12">
						<div class="row">
                                                                                                    <div class="col-md-12 col-sm-6">
                                                                                                <?php
						
						$show_simi_movie = " select * from mov_details  order by movie_year desc limit 8 ";
						$rs_mov_simi = $conn->query($show_simi_movie);
                                                                                               while($row_mov_simi = $rs_mov_simi->fetch_assoc()){

                        
						?>
							
								<div class="video-area">
                                                                                                                                                <img src="<?php echo $row_mov_simi['pic_link'] ?>" style="width: 3 rem; height : 5rem"  />
                                                                                                                                                <a href="movie_page.php?mov_id=<?php echo $row_mov_simi['auto_id'] ?>" >
										<p><?php echo $row_mov_simi['name'] ?></p>
									</a>
								</div>
							
                                                    
                                                                                               <?php } ?>
                                                                                                    </div>
                                                                                                </div>
                    </div>
				</div>
			</div>
		</section><!-- video section end -->
		<!-- news section start -->
<?php include '../footer.php'; ?>		


	</body>

</html>
<?php
///////////////////////////////////////////CHECK IP
if(!empty($_SERVER['HTTP_CLIENT_IP'])){
    $IP = $_SERVER['HTTP_CLIENT_IP'];
}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
    $IP = $_SERVER['REMOTE_ADDR'];
}
///////////////////////////////////////////DATA COLLECTION

$add = " insert into access_data (movie_code,access,ip,movie_auto_id,ts) values ('{$row_mov['code']}','1','$IP','$mov_auto_id',now()) " ;
echo $add;
$rs_add_data = $conn->query($add);

?>