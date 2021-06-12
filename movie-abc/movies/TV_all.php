<?php
include '../classes/connect.php';

if(isset($_GET['genre'])){
    $mov_genre = $_GET['genre']  ;
    $to_page = "&genre=$mov_genre";
}

if(isset($_GET['lang'])){
    $mov_lang = $_GET['lang']  ;
    $to_page = "&lang=$mov_lang";
}

if(isset($_GET['search'])){
    $mov_search = $_GET['search'];
    $to_page = "&search=$mov_search";
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
		<!--[if lt IE 9]>
		  <script src="../https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="../https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
                <script>
                
                function changeGenre(){
                    var genre = $('#genre').val();

                     window.location.href = "index.php?genre="+genre ;

                }
                
                function seeMovies(auto_mov_id){
                    window.location.href = "TV_intro.php?mov_id="+auto_mov_id;
                }
                
                function searchMovies(){
                    var search_movie = $('#search_movie').val();
                    if(search_movie == ''){
                        return false;
                    }
//                    alert(search_movie);
                    window.location.href = "movie_all.php?search="+search_movie;
                }
                
                
                </script>
                                        <?php
                                        $count_all_movies  = " SELECT COUNT(*) AS mov_amt FROM mov_details WHERE kind = 'TV' ";
                                        $rs_all_movies= $conn->query($count_all_movies);
                                        $row_all_movies = $rs_all_movies->fetch_assoc();
                                        
                                        $mov_amt  = (int)$row_all_movies['mov_amt'];
                                        $perpage = 30 ; 
                                        $get_pages = floor($mov_amt/$perpage);
                                        
                                        if(isset($_GET['page'])){
                                            $page = $_GET['page'];
                                        }else{
                                            $page = 0;
                                        }
                                        ?>
		<!-- Page loader -->
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
                                                                                                                                                        $sql_genre = " SELECT * FROM mov_category where kind = 'TV' ";
                                                                                                                         
                                                                                                                                                        $rs_genre = $conn->query($sql_genre);
                                                                                                                                                        while($row_genre = $rs_genre->fetch_assoc()){
                                                                                                                                                        ?>
                                                                                                                                                        <li><a href="movie_all.php?genre=<?php echo  $row_genre['name'] ?>"><?php echo $row_genre['name']  ?></a></li>
                                                                                                                                                        <?php } ?>
									</ul>
								</li>
								<li><a href="#">TV Languages <i class="icofont icofont-simple-down"></i></a>
									<ul>
                                                                                                                                                        <li><a href="TV_all.php?lang=TH">Thai audio</a></li>
                                                                                                                                                        <li><a href="TV_all.php?lang=EN">English audio</a></li>
									</ul>
								</li>
                                                                                        </ul>
					    </div>
					</div>
				</div>
			</div>
		</header>
		<section  class="portfolio-area pt-60">
			<div style="margin-top: 4rem" class="container">
 
				<hr/>
                                <div class="row" >
					<div class="col-lg-9">
						<div class="row">
                                    <?php
                                        $where = '';
                                        if(isset($mov_genre)){
                                            $where = " AND type like '%$mov_genre%' ";
                                        }
                                        if(isset($mov_lang)){
                                            $where = " AND language = '$mov_lang' ";
                                        }
                                        if(isset($mov_search)){
                                            $where = "AND name like '%$mov_search%' ";
                                        }
                                        if($page!=0){
                                            $page_sql = $page+1;
                                        }else{
                                            $page_sql = 0;
                                        }
                                    $sql_this_yr = "SELECT * FROM mov_details WHERE 1=1 $where AND kind  = 'TV' limit $page_sql,$perpage ";
//                                    echo $sql_this_yr;
                                    $rsa_this_yr= $conn->query($sql_this_yr);
                                    while($rowa_this_yr = $rsa_this_yr->fetch_assoc()){ ?>        
							<div class="col-md-2">
								<div class="single-portfolio" style="height: 15rem ;width: 8rem" >
									<div class="single-portfolio-img">
										<img  style="width: 5 rem;height: 12rem ; align-content: center"  onclick="seeMovies('<?php echo $rowa_this_yr['auto_id'] ?>')"  src="<?php echo $rowa_this_yr['pic_link'] ?>" alt="" />
									</div>
									<div class="portfolio-content">
										<p style="text-align: center;text-decoration: blink"><?php echo $rowa_this_yr['name'] ?><p>
									</div>
								</div>
							</div>
                                    <?php } ?>
						</div>

					</div>
                                    
					<div class="col-lg-3 text-center text-lg-left">
                                                                                                <div class="portfolio-sidebar">
                                                                                                    <div style="height: 15 ; width: 15 rem" >
                                                                                                        <img src="../assets/img/sidebar/sidebar1.png" alt="sidebar" />
                                                                                                    </div>
                                                                                                    
							<img src="../assets/img/sidebar/sidebar2.png" alt="sidebar" />
							<img src="../assets/img/sidebar/sidebar3.png" alt="sidebar" />
							<img src="../assets/img/sidebar/sidebar4.png" alt="sidebar" />
						</div>
					</div>

				</div>
                                                                                                <div class="row">
                                                                                                    
                                        <?php 
 
                                        
                                        if(isset($to_page)){
                                            $to_page= $to_page;
                                        }else{
                                            $to_page = '';
                                        }
                                        
                                        $page_for_previous = (int)$to_page ; 
                                        $previous  = $page_for_previous-1;
                                        ?>
                                            <a <?php if($previous<1){ echo 'hidden' ;} ?> href="movie_all.php?page=<?php echo $previous.$to_page ; ?>" ><-previous</a>&nbsp;&nbsp;
                                            <?php
                                        for($o=0 ; $o <= $get_pages ; $o++ ){ ?>
                    <a <?php if($o<1){ echo 'hidden' ;} ?> style="test-align:center" href="movie_all.php?page=<?php echo $o.$to_page ; ?>" ><?php echo $o.',' ?></a>                   
                                        <?php }  ?>
                    &nbsp;&nbsp;<a <?php if($get_pages<1){ echo 'hidden' ;} ?> href="movie_all.php?page=<?php $next = $page+1; echo $next.$to_page ; ?>" >next-></a>
       </div>
			</div>

		</section><!-- portfolio section end -->
 
		<!-- footer section start -->
		<footer class="footer">
			<div class="container">
				<div class="row">
                    <div class="col-lg-3 col-sm-6">
						<div class="widget">
							<img src="../assets/img/logo.png" alt="about" />
							<p>7th Harley Place, London W1G 8LZ United Kingdom</p>
							<h6><span>Call us: </span>(+880) 111 222 3456</h6>
						</div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
						<div class="widget">
							<h4>Legal</h4>
							<ul>
								<li><a href="../#">Terms of Use</a></li>
								<li><a href="../#">Privacy Policy</a></li>
								<li><a href="../#">Security</a></li>
							</ul>
						</div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
						<div class="widget">
							<h4>Account</h4>
							<ul>
								<li><a href="../#">My Account</a></li>
								<li><a href="../#">Watchlist</a></li>
								<li><a href="../#">Collections</a></li>
								<li><a href="../#">User Guide</a></li>
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
								<p><a target="_blank" href="../https://www.templateshub.net">Templates Hub</a></p>
							</div>
						</div>
						<div class="col-lg-6 text-center text-lg-right">
							<div class="copyright-content">
								<a href="../#" class="scrollToTop">
									Back to top<i class="icofont icofont-arrow-up"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer><!-- footer section end -->
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

</html>