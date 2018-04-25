<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
	require_once 'init.php';
	
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once 'include/head.php'; ?>
</head>
<body>
 <div class="header">
	<div class="container">
		<div class="logo animated wow pulse" data-wow-duration="1000ms" data-wow-delay="500ms">
			<h1><a href="index.php"><span>C</span><img src="images/oo.png" alt=""><img src="images/oo.png" alt="">kery</a></h1>
		</div>
		<div class="nav-icon">		
			<a href="#" class="navicon"></a>
				<div class="toggle">
					<ul class="toggle-menu">
						<li><a class="active" href="index.php"><?php echo $lang['home'];?></a></li>
						<li><a href="menu.php"><?php echo $lang['menu'];?> </a></li>
						<li><a href="contact.php"><?php echo $lang['contact'];?></a></li>
					</ul>
				</div>
			<script>
			$('.navicon').on('click', function (e) {
			  e.preventDefault();
			  $(this).toggleClass('navicon--active');
			  $('.toggle').toggleClass('toggle--active');
			});
			</script>
		</div>
	<div class="clearfix"></div>
	</div>
	<!-- start search-->	
		<div class="banner">
			<p class="animated wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">Sed ut perspiciatis unde omnis iste natus.</p>
			<label></label>
			<h4 class="animated wow fadeInTop" data-wow-duration="1000ms" data-wow-delay="500ms">Hello And Welcome To Jela Svijeta</h4>
			<a class="scroll down" href="#content-down"><img src="images/down.png" alt=""></a>
		</div>
</div>
<!--content-->
<div class="content" id="content-down">
	<div class="content-top-top">
		<div class="container">
			<div class="content-top">
				<div class="col-md-4 content-left animated wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
					<h3>About</h3>
					<label><i class="glyphicon glyphicon-menu-up"></i></label>
					<span>There are many variations</span>
				</div>
				<div class="col-md-8 content-right animated wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="500ms">
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour , or randomised words which don't look even slightly believable.There are many variations by injected humour. There are many variations of passages of Lorem Ipsum available.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form by injected humour , or randomised words</p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="content-mid">
					
				<div class="col-md-4 food-grid animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
					<div class=" hover-fold">
					  <h4>FOOD</h4>
					  <div class="top">
						<div class="front face"></div>
						<div class="back face">
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>
						</div>
					  </div>
					  <div class="bottom"></div>
					</div>
				</div>
				<div class="col-md-4 food-grid animated wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
					<div class=" hover-fold">
					  <h4>FOOD</h4>
					  <div class="top">
						<div class="front face front1"></div>
						<div class="back face">
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>
						</div>
					  </div>
					  <div class="bottom bottom1"></div>
					</div>
				</div>
				<div class="col-md-4 food-grid animated wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="500ms">
					<div class=" hover-fold">
					  <h4>FOOD</h4>
					  <div class="top">
						<div class="front face front2"></div>
						<div class="back face">
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>
						</div>
					  </div>
					  <div class="bottom bottom2"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<!--footer-->
	<?php include_once 'include/footer.php'; ?>
	<!--//footer-->
</body>
</html>