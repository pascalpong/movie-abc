<?php
session_start();
error_reporting(0);
include '../classes/connect.php';
//echo  $_SESSION['username'];
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = " select username , password from userlist where username = '$username' and password = '$password' ";
//    echo $sql;
    $rsa = $conn->query($sql);
    $rowa = $rsa->fetch_assoc();
    
    if($rowa['username'] != '' && $rowa['password'] != '' ){
        $_SESSION['username'] = $rowa['username'];
        if($_SESSION['username']=='admin'){
            
        }else{
            header("location:insert_movies_info.php");
        }
    }else{?>
<script>
alert('Something went wrong');
</script>
    <?php }
    
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
 
            
            
            </script>
            
            
            <form method="post">
                
 

                <?php if($_SESSION['username']=='admin'){ ?>
                <div class="container">
                    <div>
                        <a href="insert_movies_info.php">Insert a movie</a>
                    </div>
               </div> 
                <?php }else{ ?>
                   <div class="container">
                   <div class="card row">
                     <div class="card-body col-6">
                        <p>Username</p>
                              <input type="text" name="username" id="username" placeholder="username" />
                    </div>
                     <div class="card-body col-6">
                        <p>Password</p>
                              <input type="password" name="password" id="password" placeholder="password" />
                    </div>
                    <div class="card-body col-12">
                        <input type="submit" name="submit" value="Submit" />
                    </div>
               </div> 
                    
                </div>
              <?php  } ?>
                    
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