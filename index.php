<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php include_once 'konfiguracija.php'; 

if (isset($_GET['lang']) === true && in_array($_GET['lang'],$allowed_lang) === true) {
	$_SESSION['lang'] = $_GET['lang'];
}else{
	$_SESSION['lang'] = 'hr';
}
?>

<!DOCTYPE html>
<html>
<head>
	<?php include_once 'include/head.php'; ?>
</head>
<body>
	<?php include_once 'include/header.php'; ?>
 
<!--content-->
	<?php include_once 'include/content.php'; ?>

<!--footer-->
	<?php include_once 'include/footer.php'; ?>
	<!--//footer-->
</body>
</html>