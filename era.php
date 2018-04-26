<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php include_once 'konfiguracija.php';
require_once 'init.php';
$stranica = isset($_GET["stranica"]) ? $_GET["stranica"] : 1;?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once 'include/head.php'; ?>
	<style>
    table tbody tr td:nth-child(2), 
    table tbody tr td:nth-child(3), 
    table tbody tr td:nth-child(4){
      text-align: left;
    }
  </style>
</head>
<body>
	<?php include_once 'include/menu-era.php'; ?>		

<!--content-->
	   <section class="head index-part-1">      
          <div class="wow">
          <div class="container">
            <div class="row">
               <div class="font-1 helmet text-center">
                
                <img src="verzija3.png" alt="ERA">>

               
               </div>
            </div>
          </div>
        </div>
    </section>

<!--footer-->
	<?php include_once 'include/footer.php'; ?>
	

</body>
</html>