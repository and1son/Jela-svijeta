<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php include_once 'konfiguracija.php';
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
	<?php include_once 'include/menu-menu.php'; ?>		

<!--content-->
	<div class="menu">
		<div class="container">
			<div class="menu-top">
				<div class="col-md-4 menu-left animated wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
					<h3>Menu</h3>
					<label><i class="glyphicon glyphicon-menu-up"></i></label>
					<span>There are many variations</span>
				</div>
				<div class="col-md-8 menu-right animated wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="500ms">
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				</div>
				<div class="clearfix"> </div>
			</div>
			
		</div>
	</div>

	   <section class="head index-part-1">      
          <div class="wow">
          <div class="container">
            <div class="row">
               <div class="font-1 helmet text-center">
              
              
               <form method="get">
                  <input type="text" name="uvjet" 
                  placeholder="uvjet pretraživanja"
                  value="<?php echo isset($_GET["uvjet"]) ? $_GET["uvjet"] : "" ?>" />
                </form

             
                <?php
          
                $uvjet = "%" . (isset($_GET["uvjet"]) ? $_GET["uvjet"] : "") . "%";
                
                $izraz = $veza->prepare("            
                  select count(a.sifra)
					from jelo a 
					inner join tag b on a.tag=b.sifra
					inner join kategorija c on a.kategorija=c.sifra 
                  where concat(a.nazivJelo,b.nazivTag,c.nazivKategorija) like :uvjet");
                $izraz->execute(array("uvjet"=>$uvjet));
                $ukupnoRedova = $izraz->fetchColumn();
                $ukupnoStranica = ceil($ukupnoRedova/$brojRezultataPoStranici);
                
                if($stranica<1){
                  $stranica=1;
                }
                if($ukupnoStranica>0 && $stranica>$ukupnoStranica){
                  $stranica=$ukupnoStranica;
                }

                ?>
                
                <div class="table-responsive">          
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Jelo</th>
                        <th>Tag</th>
                        <th>Kategorija</th>
                        <th>Sastojci</th>
                      </tr>
                    </thead>
                    <tbody>


                <?php
                      
                $izraz = $veza->prepare("
                  select 
                  a.sifra,
                  a.nazivJelo,
                  a.opis,
                  a.cijena,
                  b.nazivTag,
                  c.nazivKategorija

	              from jelo a 
				  inner join tag b on a.tag=b.sifra
				  inner join kategorija c on a.kategorija=c.sifra 
       
                  where concat(a.nazivJelo,b.nazivTag,c.nazivKategorija) like :uvjet
                  order by nazivJelo limit :stranica, :brojRezultataPoStranici
                  ");
                $izraz->bindValue("stranica", $stranica* $brojRezultataPoStranici -  $brojRezultataPoStranici , PDO::PARAM_INT);
                $izraz->bindValue("brojRezultataPoStranici", $brojRezultataPoStranici, PDO::PARAM_INT);
                $izraz->bindParam("uvjet", $uvjet);
                $izraz->execute();
                $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);

                ?>
                   <?php
                     foreach ($rezultati as $red):
                   ?>
                      <tr>
               
                        <td><?php echo $red->nazivJelo; ?></td>
                        <td><?php echo $red->nazivTag; ?></td>
                        <td><?php echo $red->nazivKategorija; ?></td>
                      </tr>

                     <?php endforeach; ?>
                    </tbody>
                  </table>

              <?php            
               if($ukupnoRedova>$brojRezultataPoStranici){
                include 'paginacija.php';
              }
              ?>
                  </div>
               </div>
            </div>
          </div>
        </div>
    </section>
<!--footer-->
	<?php include_once 'include/footer.php'; ?>
	

</body>
</html>