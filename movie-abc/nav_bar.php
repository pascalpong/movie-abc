<?php

include 'classes/connect.php';

?>
<script>

function changeGenre(){
    var genre = $('#genre').val();
    
     window.location.href = "index.php?genre="+genre ;
    
}

</script>
	    <div id="preloader"></div>
		<!-- header section start -->
                <header class="card" style="background-color: black">
			<div class="container">
				<div class="header-area">
					<div class="logo">
						<a href="index.php"><img src="assets/img/logo.png" alt="logo" /></a>
					</div>
					<div class="header-right">
						<form action="#">
                                                    <select id="genre" onchange="changeGenre()" >
                                                                                                            <option value="all">Select Genre</option>
                                                            <?php
                                                            $sql_genre = " SELECT * FROM mov_category ";
                                                            $rs_genre = $conn->query($sql_genre);
                                                            while($row_genre = $rs_genre->fetch_assoc()){
                                                            ?>
								<option value="<?php echo $row_genre['code']  ?>"><?php echo $row_genre['name']  ?></option>
                                                            <?php } ?>
							</select>
 
							<button><i class="icofont icofont-search"></i></button>
						</form>
						<ul>
							<li><a href="ads/ads_regis.php">Promote your products</a></li>
							<li><a href="ads/ads_regis.php">Donate</a></li>
							<li><a  class="login-popup" href="#">Login</a></li>
						</ul>
					</div>
					<div class="menu-area">
						<div class="responsive-menu"></div>
					    <div class="mainmenu">
 
					    </div>
					</div>
				</div>
			</div>
		</header>