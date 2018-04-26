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
	<?php include_once 'include/menu-menu.php'; ?>		

<!--content-->
  <?php include_once 'include/content-menu.php'; ?>

	   <section class="head index-part-1">      
          <div class="wow">
          <div class="container">
            <div class="row">
               <div class="font-1 helmet text-center">
              
               <form method="get">
                  <input type="text" name="uvjet" 
                  placeholder="<?php echo $lang['term'];?>"
                  value="<?php echo isset($_GET["uvjet"]) ? $_GET["uvjet"] : "" ?>" />
                </form>
                <ul>
                 <a href="?lang=english">English</a>
                 <a href="?lang=croatian">Croatian</a>
                </ul>
             
                <?php
          
                $uvjet = "%" . (isset($_GET["uvjet"]) ? $_GET["uvjet"] : "") . "%";
    
                print_r($_SESSION);

                if(isset($_SESSION['croatian'])){
                $izraz = $veza->prepare("            
                  select 
                    count(DISTINCT a.sifra)
                  from jelo a 
          					inner join tag b on a.tag=b.sifra
          					inner join kategorija c on a.kategorija=c.sifra
                    inner join jelo_sastojak d on a.sifra=d.jelo
                    inner join sastojak e on d.sastojak=e.sifra  
                  where concat(a.nazivJelo,b.nazivTag,c.nazivKategorija,e.nazivSastojak) like :uvjet"); 
                }else{
                $izraz = $veza->prepare("            
                  select 
                    count(DISTINCT a.sifra)
                  from jelo a 
                    inner join tag b on a.tag=b.sifra
                    inner join kategorija c on a.kategorija=c.sifra
                    inner join jelo_sastojak d on a.sifra=d.jelo
                    inner join sastojak_en e on d.sastojak=e.sifra  
                  where concat(a.nazivJelo,b.nazivTag,c.nazivKategorija,e.nazivSastojak_en) like :uvjet"); 
                }
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
                        <th><?php echo $lang['meal'];?></th>
                        <th><?php echo $lang['tag'];?></th>
                        <th><?php echo $lang['category'];?></th>
                        <th><?php echo $lang['ingredient'];?></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                <?php
                
                if(isset($_SESSION['croatian'])){      
                $izraz = $veza->prepare("
                  select 
                    a.sifra,
                    a.nazivJelo,
                    a.opis,
                    a.cijena,
                    b.nazivTag,
                    c.nazivKategorija,
                    GROUP_CONCAT(DISTINCT e.nazivSastojak SEPARATOR ', ') as nazivSastojak
	                
                  from jelo a 
          				  inner join tag b on a.tag=b.sifra
          				  inner join kategorija c on a.kategorija=c.sifra
                    inner join jelo_sastojak d on a.sifra=d.jelo
                    inner join sastojak e on d.sastojak=e.sifra
                  where concat(a.nazivJelo,b.nazivTag,c.nazivKategorija,e.nazivSastojak) like :uvjet
                  group by a.sifra, a.nazivJelo order by 1 limit :stranica, :brojRezultataPoStranici
                  ");
              }else{
                $izraz = $veza->prepare("
                  select 
                    a.sifra,
                    a.nazivJelo,
                    a.opis,
                    a.cijena,
                    b.nazivTag,
                    c.nazivKategorija,
                    GROUP_CONCAT(DISTINCT e.nazivSastojak_en SEPARATOR ', ') as nazivSastojak
                  
                  from jelo a 
                    inner join tag b on a.tag=b.sifra
                    inner join kategorija c on a.kategorija=c.sifra
                    inner join jelo_sastojak d on a.sifra=d.jelo
                    inner join sastojak_en e on d.sastojak=e.sifra
                  where concat(a.nazivJelo,b.nazivTag,c.nazivKategorija,e.nazivSastojak_en) like :uvjet
                  group by a.sifra, a.nazivJelo order by 1 limit :stranica, :brojRezultataPoStranici
                  ");

              }
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
                        <td><?php echo $red->nazivSastojak; ?></td>

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