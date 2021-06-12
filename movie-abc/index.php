<?php
include 'classes/connect.php';

?>
<!DOCTYPE HTML>
<html lang="zxx">
	
<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Movie-ABC : Free Movies Online</title>
		<!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="assets/img/favcion.png" />
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all" />
		<!-- Slick nav CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/slicknav.min.css" media="all" />
		<!-- Iconfont CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/icofont.css" media="all" />
		<!-- Owl carousel CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
		<!-- Popup CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
		<!-- Main style CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />
		<!-- Responsive CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="all" />
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
                <script>
                
                function changeGenre(){
                    var genre = $('#genre').val();

                     window.location.href = "index.php?genre="+genre ;

                }
                
                function seeMovies(auto_mov_id){
                    window.location.href = "movies/movie_page.php?mov_id="+auto_mov_id;
                }
                
                function searchMovies(){
                    var search_movie = $('#search_movie').val();
                    if(search_movie == ''){
                        return false;
                    }
                    if(search_movie=='*-**-*'){
                        window.location.href = "insert_admin/insert_login.php";
                    }else{
                        window.location.href = "movies/movie_all.php?search="+search_movie;
                    }

                }
                
                </script>
		<!-- Page loader -->
	<!--    <div id="preloader"></div>-->
		<!-- header section start -->
		<header class="header">
			<div class="container">
				<div class="header-area">
					<div class="logo">
						<a href="index.php"><img src="assets/img/logo.png" alt="logo" /></a>
					</div>
					<div class="header-right">
                                                                                <form>
                                                                                    <input name="search_movie" id="search_movie" type="text" <?php  if(isset($_GET['search'])){ echo " value='{$_GET['search']}' "; }  ?> />
                                                                                    <input type="button" style="cursor: pointer" onclick="searchMovies()" class="icofont icofont-search" value="Search" > 
                                                                                </form>
						<ul>
							<li><a href="ads/ads_regis.php">Promote your products</a></li>
							<li><a href="ads/ads_regis.php">Donate</a></li>
					 
						</ul>
					</div>
					<div class="menu-area">
						<div class="responsive-menu"></div>
					    <div class="mainmenu">
                                                                                        <ul id="primary-menu">
                                                                                            <li><a class="active" href="index.php">Home</a></li>
                                                                                            <li><a href="movies/TV_all.php">TV shows</a></li>
                                                                                            <li><a href="movies/movie_all.php">All Movies</a></li>
                                                                                                                                <li><a href="#" id="genre">Genre<i class="icofont icofont-simple-down"></i></a>
									<ul>
                                                                                                                                                       <?php
                                                                                                                                                        $sql_genre = " SELECT * FROM mov_category WHERE kind = 'MOV' ";
                                                                                                                                                        $rs_genre = $conn->query($sql_genre);
                                                                                                                                                        while($row_genre = $rs_genre->fetch_assoc()){
                                                                                                                                                        ?>
                                                                                                                                                        <li><a href="movies/movie_all.php?genre=<?php echo  $row_genre['name'] ?>"><?php echo $row_genre['name']  ?></a></li>
                                                                                                                                                        <?php } ?>
									</ul>
								</li>
								<li><a href="#">Movie Languages <i class="icofont icofont-simple-down"></i></a>
									<ul>
                                                                                                                                                        <li><a href="movies/movie_all.php?lang=TH">Thai audio</a></li>
                                                                                                                                                        <li><a href="movies/movie_all.php?lang=EN">English audio</a></li>
									</ul>
								</li>
                                                                                        </ul>
					    </div>
					</div>
				</div>
			</div>
		</header>
		<!-- hero area start -->
		<section class="hero-area" id="home">
			<div class="container">
				<div class="hero-area-slider">
                                                                <?php
                                                                $sql = "SELECT * FROM mov_details order by insert_date desc limit 10 ";
                                                                $rsa = $conn->query($sql);
                                                                while($rowa = $rsa->fetch_assoc()){
                                                                ?>                
				<div class="row hero-area-slide">
						<div class="col-lg-6 col-md-5">
                                                                                                    <div class="hero-area-content">
                                                                                                        <img style="width: 100 px ;height: 400 px" src="<?php echo $rowa['pic_link'] ?>" alt="<?php echo $rowa['name'] ?>" />
                                                                                                    </div>
						</div>
						<div class="col-lg-6 col-md-7">
							<div class="hero-area-content pr-50">
								<h2><?php echo $rowa['name'] ?></h2>
								<p><?php echo $rowa['details'] ?></p>
								
								<div class="slide-trailor">
 
									<p onclick="seeMovies('<?php echo $rowa['auto_id'] ?>')"  class="theme-btn theme-btn2" href="#"><i class="icofont icofont-play"></i>Watch</p>
								</div>
							</div>
						</div>
					</div>
                                    
                                                                        <?php } ?>
					
					
				</div>
				<div class="hero-area-thumb">
					<div class="thumb-prev">
						<div class="row hero-area-slide">
							<div class="col-lg-6">
								<div class="hero-area-content">
									<img src="assets/img/slide3.png" alt="about" />
								</div>
							</div>
							<div class="col-lg-6">
								<div class="hero-area-content pr-50">
									<h2>Last Avatar</h2>
 
									<p>She is a devil princess from the demon world. She grew up sheltered by her parents and doesn't really know how to be evil or any of the common actions,   She is unable to cry due to Keita's accidental first wish, despite needed for him to wish...</p>
 
									<div class="slide-trailor">
										<h3>Watch Trailer</h3>
										<a class="theme-btn theme-btn2" href="#"><i class="icofont icofont-play"></i> Tickets</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="thumb-next">
						<div class="row hero-area-slide">
							<div class="col-lg-6">
								<div class="hero-area-content">
									<img src="assets/img/slide1.png" alt="about" />
								</div>
							</div>
							<div class="col-lg-6">
								<div class="hero-area-content pr-50">
									<h2>The Deer God</h2>
 
									<p>She is a devil princess from the demon world. She grew up sheltered by her parents and doesn't really know how to be evil or any of the common actions,   She is unable to cry due to Keita's accidental first wish, despite needed for him to wish...</p>
 
									<div class="slide-trailor">
										<h3>Watch Trailer</h3>
										<a class="theme-btn theme-btn2" href="#"><i class="icofont icofont-play"></i> Tickets</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- hero area end -->
		<!-- portfolio section start -->
		<section class="portfolio-area pt-60">
			<div class="container">
				<div class="row flexbox-center">
					<div class="col-lg-6 text-center text-lg-left">
					    <div class="section-title">
							<h3><i class="icofont icofont-movie"></i>Latest Movies</h3>
						</div>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-lg-9">
						<div class="row justify-content-center">
                                                    
                                                    
                                                        <?php
                                                        $sql_this_yr = "SELECT * FROM mov_details limit 12 ";
                                                        $rsa_this_yr= $conn->query($sql_this_yr);
                                                        while($rowa_this_yr = $rsa_this_yr->fetch_assoc()){
                                                        ?>        
                                                    <div class="col-md-4 col-sm-6"  style="height: auto ;width: auto">
								<div class="single-portfolio"  >
                                                                    <div class="single-portfolio-img" style="text-align: center">
										<img style="width: 5 rem;height: 15rem ; align-content: center" onclick="seeMovies('<?php echo $rowa_this_yr['auto_id'] ?>')"  src="<?php echo $rowa_this_yr['pic_link'] ?>" alt="" />
									</div>
									<div class="portfolio-content">
                                                                            <p style="text-align: center;text-decoration: blink"><?php echo $rowa_this_yr['name'] ?></p>
									</div>
								</div>
							</div>
							
                                                        <?php } ?>
                                                    
						</div>
					</div>
					<div class="col-lg-3 text-center text-lg-left">
					    <div class="portfolio-sidebar">
							<img src="assets/img/sidebar/sidebar1.png" alt="sidebar" />
							<img src="assets/img/sidebar/sidebar2.png" alt="sidebar" />
							<img src="assets/img/sidebar/sidebar3.png" alt="sidebar" />
							<img src="assets/img/sidebar/sidebar4.png" alt="sidebar" />
						</div>
					</div>
				</div>
			</div>
		</section><!-- portfolio section end -->
 
		<section class="news">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
					    <div class="section-title pb-20">
							<h1><i class="icofont icofont-coffee-cup"></i> Latest News</h1>
						</div>
					</div>
				</div>
				<hr />
			</div>
			<div class="news-slide-area">
				<div class="news-slider">
					<div class="single-news">
						<div class="news-bg-1"></div>
						<div class="news-date">
							<h2><span>NOV</span> 25</h2>
							<h1>2017</h1>
						</div>
						<div class="news-content">
							<h2>The Witch Queen</h2>
							<p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under her hat, and teal eyes.</p>
						</div>
						<a href="#">Read More</a>
					</div>
					<div class="single-news">
						<div class="news-bg-2"></div>
						<div class="news-date">
							<h2><span>NOV</span> 25</h2>
							<h1>2017</h1>
						</div>
						<div class="news-content">
							<h2>The Witch Queen</h2>
							<p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under her hat, and teal eyes.</p>
						</div>
						<a href="#">Read More</a>
					</div>
					<div class="single-news">
						<div class="news-bg-3"></div>
						<div class="news-date">
							<h2><span>NOV</span> 25</h2>
							<h1>2017</h1>
						</div>
						<div class="news-content">
							<h2>The Witch Queen</h2>
							<p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under her hat, and teal eyes.</p>
						</div>
						<a href="#">Read More</a>
					</div>
				</div>
				<div class="news-thumb">
					<div class="news-next">
						<div class="single-news">
							<div class="news-bg-3"></div>
							<div class="news-date">
								<h2><span>NOV</span> 25</h2>
								<h1>2017</h1>
							</div>
							<div class="news-content">
								<h2>The Witch Queen</h2>
								<p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under her hat, and teal eyes.</p>
							</div>
							<a href="#">Read More</a>
						</div>
					</div>
					<div class="news-prev">
						<div class="single-news">
							<div class="news-bg-2"></div>
							<div class="news-date">
								<h2><span>NOV</span> 25</h2>
								<h1>2017</h1>
							</div>
							<div class="news-content">
								<h2>The Witch Queen</h2>
								<p>Witch Queen is a tall woman with a slim build. She has pink hair, which is pulled up under her hat, and teal eyes.</p>
							</div>
							<a href="#">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</section><!-- news section end -->
		<!-- footer section start -->
		<footer class="footer">
			<div class="container">
				<div class="row">
                    <div class="col-lg-3 col-sm-6">
						<div class="widget">
							<img src="assets/img/logo.png" alt="about" />
							<p>7th Harley Place, London W1G 8LZ United Kingdom</p>
							<h6><span>Call us: </span>(+880) 111 222 3456</h6>
						</div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
						<div class="widget">
							<h4>Legal</h4>
							<ul>
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Security</a></li>
							</ul>
						</div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
						<div class="widget">
							<h4>Account</h4>
							<ul>
								<li><a href="#">My Account</a></li>
								<li><a href="#">Watchlist</a></li>
								<li><a href="#">Collections</a></li>
								<li><a href="#">User Guide</a></li>
							</ul>
						</div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
						<div class="widget">
							<h4>Newsletter</h4>
							<p>Subscribe to our newsletter system now to get latest news from us.</p>
							<form action="#">
								<input type="text" placeholder="Enter your email.."/>
								<button>SUBSCRIBE NOW</button>
							</form>
						</div>
                    </div>
				</div>
				<hr />
			</div>
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 text-center text-lg-left">
							<div class="copyright-content">
								<p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
							</div>
						</div>
						<div class="col-lg-6 text-center text-lg-right">
							<div class="copyright-content">
								<a href="#" class="scrollToTop">
									Back to top<i class="icofont icofont-arrow-up"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer><!-- footer section end -->
		<!-- jquery main JS -->
		<script src="assets/js/jquery.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="assets/js/bootstrap.min.js"></script>
		<!-- Slick nav JS -->
		<script src="assets/js/jquery.slicknav.min.js"></script>
		<!-- owl carousel JS -->
		<script src="assets/js/owl.carousel.min.js"></script>
		<!-- Popup JS -->
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<!-- Isotope JS -->
		<script src="assets/js/isotope.pkgd.min.js"></script>
		<!-- main JS -->
		<script src="assets/js/main.js"></script>
	</body>

</html>