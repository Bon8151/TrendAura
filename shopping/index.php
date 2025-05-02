<?php session_start();
    error_reporting(0);
    include 'includes/config.php';
    if (isset($_GET['action']) && $_GET['action'] == "add") {
        $id = intval($_GET['id']);
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $sql_p   = "SELECT * FROM products WHERE id={$id}";
            $query_p = mysqli_query($con, $sql_p);
            if (mysqli_num_rows($query_p) != 0) {
                $row_p                          = mysqli_fetch_array($query_p);
                $_SESSION['cart'][$row_p['id']] = ["quantity" => 1, "price" => $row_p['productPrice']];

            } else {
                $message = "Product ID is invalid";
            }
        }
        echo "<script>alert('Product has been added to the cart')</script>";
        echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
    }

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Shopping Portal Home Page</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/red.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">
		<style>
        .card-3d {
            border: none;
            border-radius: 15px;
            padding-top: 70px; /* Space for image */
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            background: white;
            position: relative;
            overflow: visible;
        }

        .card-3d:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.2);
        }

        .card-3d img {
            width: 120px;
            height: 120px;
            border-radius: 15px;
            position: absolute;
            top: -60px;
            left: 50%;
            transform: translateX(-50%);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            text-align: center;
        }
    </style>


</head>
    <body class="cnt-home">



		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include 'includes/top-header.php'; ?>
<?php include 'includes/main-header.php'; ?>
<?php include 'includes/menu-bar.php'; ?>
<?php include 'includes/genderselection.php'; ?>
</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
		<div class="furniture-container homepage-container">
		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
				<!-- ================================== TOP NAVIGATION ================================== -->
	<?php include 'includes/side-menu.php'; ?>
<!-- ================================== TOP NAVIGATION : END ================================== -->
			</div><!-- /.sidemenu-holder -->

			<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
				<!-- ========================================== SECTION – HERO ========================================= -->

<div id="hero" class="homepage-slider3">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
		<div class="full-width-slider">
			<div class="item" style="background-image: url(assets/images/sliders/new1.png);">
				<!-- /.container-fluid -->
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->

		<div class="full-width-slider">
			<div class="item" style="background-image: url(assets/images/sliders/s1.jpg);">
				<!-- /.container-fluid -->
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->

		<div class="full-width-slider">
			<div class="item" style="background-image: url(assets/images/sliders/s2.png);">
				<!-- /.container-fluid -->
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->

	    <div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(assets/images/sliders/new2.png);">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->

		<div class="full-width-slider">
			<div class="item" style="background-image: url(assets/images/sliders/s3.jpg);">
				<!-- /.container-fluid -->
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->

		<div class="full-width-slider">
			<div class="item" style="background-image: url(assets/images/sliders/s4.jpg);">
				<!-- /.container-fluid -->
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->

		<div class="full-width-slider">
			<div class="item" style="background-image: url(assets/images/sliders/s6.jpg);">
				<!-- /.container-fluid -->
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->

	</div><!-- /.owl-carousel -->
</div>

<!-- ========================================= SECTION – HERO : END ========================================= -->
				<!-- ============================================== INFO BOXES ============================================== -->
<div class="info-boxes wow fadeInUp">
	<div class="info-boxes-inner">
		<div class="row">
			<div class="col-md-6 col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						<div class="col-xs-2">
						     <i class="icon fa fa-dollar"></i>
						</div>
						<div class="col-xs-10">
							<h4 class="info-box-heading green">money back</h4>
						</div>
					</div>
					<h6 class="text">30 Day Money Back Guarantee.</h6>
				</div>
			</div><!-- .col -->

			<div class="hidden-md col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						<div class="col-xs-2">
							<i class="icon fa fa-truck"></i>
						</div>
						<div class="col-xs-10">
							<h4 class="info-box-heading orange">free shipping</h4>
						</div>
					</div>
					<h6 class="text">free ship-on oder over Rs. 600.00</h6>
				</div>
			</div><!-- .col -->

			<div class="col-md-6 col-sm-4 col-lg-4">
				<div class="info-box">
					<div class="row">
						<div class="col-xs-2">
							<i class="icon fa fa-gift"></i>
						</div>
						<div class="col-xs-10">
							<h4 class="info-box-heading red">Special Sale</h4>
						</div>
					</div>
					<h6 class="text">All items-sale up to 20% off </h6>
				</div>
			</div><!-- .col -->
		</div><!-- /.row -->
	</div><!-- /.info-boxes-inner -->

</div><!-- /.info-boxes -->
<!-- ============================================== INFO BOXES : END ============================================== -->
			</div><!-- /.homebanner-holder -->

		</div><!-- /.row -->

		<!-- ============================================== SCROLL TABS ============================================== -->

		<div class="container">
        <div class="row">
            <div class="col-md-4" style="margin-top: 90px;">
                <div class="card card-3d">
                    <img src="./Clothes/mt1.jpg" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Product Name : Men`s T-shirt</h5>
                        <p class="card-text">This men's T-shirt offers soft, breathable fabric, a modern fit, and versatile style—perfect for casual outings and everyday comfort.</p>
                    </div>
                </div>
            </div>

			<div class="col-md-4" style="margin-top: 90px;">
                <div class="card card-3d">
                    <img src="./Clothes/lt1.jpg" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Product Name : Ladies T-shirt</h5>
                        <p class="card-text">This women's T-shirt features soft, breathable fabric, a flattering fit, and versatile style—ideal for casual wear and all-day comfort.</p>
                    </div>
                </div>
            </div>

			<div class="col-md-4" style="margin-top: 90px;">
                <div class="card card-3d">
                    <img src="./Clothes/cs1.jpg" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Product Name : Children SweetShirt</h5>
                        <p class="card-text">This children's sweatshirt delivers soft comfort, durable fabric, and a fun design—perfect for cozy warmth and everyday wear.</p>
                    </div>
                </div>
            </div>
			

			
			
        </div>
    </div>


         <!-- ============================================== TABS ============================================== -->


<hr />

</div>
</div>
<?php include 'includes/brands-slider.php'; ?>
<?php include 'includes/footer.php'; ?>

	<script src="assets/js/jquery-1.11.1.min.js"></script>

	<script src="assets/js/bootstrap.min.js"></script>

	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>

	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->

	<script src="switchstylesheet/switchstylesheet.js"></script>

	<script>
		$(document).ready(function(){
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->



</body>
</html>