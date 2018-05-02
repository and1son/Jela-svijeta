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
						<li><a href="era.php">ERA</a></li>

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
			<h4 class="animated wow fadeInTop" data-wow-duration="1000ms" data-wow-delay="500ms"><?php echo $lang['hello1'];?></h4>
			<a class="scroll down" href="#content-down"><img src="images/down.png" alt=""></a>
		</div>
</div>