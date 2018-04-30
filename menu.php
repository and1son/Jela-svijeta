<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php include_once 'konfiguracija.php';
$per_page = isset($_GET["per_page"]) ? $_GET["per_page"] : 4;
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$diff_time = isset($_GET["diff_time"]) ? $_GET["diff_time"] : 1525080845;

?>
<!DOCTYPE html>
<html>
<head>
  <?php include_once 'include/head.php'; ?>
  <style>
  body > section > div > div > div > div > div > table > thead > tr > th:nth-child(1),
  body > section > div > div > div > div > div > table > thead > tr > th:nth-child(2),
  body > section > div > div > div > div > div > table > thead > tr > th:nth-child(3),
  body > section > div > div > div > div > div > table > thead > tr > th:nth-child(4),
  body > section > div > div > div > div > div > table > thead > tr > th:nth-child(5)
  {
    text-align: center;
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
            <input type="text" name="with" 
            placeholder="<?php echo $lang['term'];?>"
            value="<?php echo isset($_GET["with"]) ? $_GET["with"] : "" ?>" />
          </form>
          <ul>
           <a href="?lang=en">English</a>
           <a href="?lang=hr">Croatian</a>
         </ul>

         <?php

         $with = "%" . (isset($_GET["with"]) ? $_GET["with"] : "") . "%";

         if (isset($_GET["per_page"])) {
            $per_page=$_GET["per_page"];
            settype($per_page, "integer");
          }

         if (isset($_GET["diff_time"])) {
            $diff_time=$_GET["diff_time"];
        
          }
               
        // $diff_time = strtotime("now");

         //print_r($_GET);
         //print_r($_SESSION);
         //print_r($diff_time);


         switch($_SESSION['lang']){
          case "hr":
          $izraz = $veza->prepare("            
            select 
            count(DISTINCT a.sifra)
            from jelo a 
            inner join tag b on a.tag=b.sifra
            inner join kategorija c on a.kategorija=c.sifra
            inner join jelo_sastojak d on a.sifra=d.jelo
            inner join sastojak e on d.sastojak=e.sifra  
            where concat(a.nazivJelo,b.nazivTag,c.nazivKategorija,e.nazivSastojak) like :with"); 
          $izraz->execute(array("with"=>$with));
          $ukupnoRedova = $izraz->fetchColumn();
          $ukupnoStranica = ceil($ukupnoRedova/$per_page);
         
          break;

          case "en":
          $izraz1 = $veza->prepare("            
            select 
            count(DISTINCT a.sifra)
            from jelo a 
            inner join tag b on a.tag=b.sifra
            inner join kategorija c on a.kategorija=c.sifra
            inner join jelo_sastojak d on a.sifra=d.jelo
            inner join sastojak e on d.sastojak=e.sifra  
            where concat(a.nazivJelo_en,b.nazivTag_en,c.nazivKategorija_en,e.nazivSastojak_en) like :with"); 
         

          $izraz1->execute(array("with"=>$with));
          $ukupnoRedova = $izraz1->fetchColumn();
          $ukupnoStranica = ceil($ukupnoRedova/$per_page);
          break;

        }

        if($page<1){
          $page=1;
        }
        if($ukupnoStranica>0 && $page>$ukupnoStranica){
          $page=$ukupnoStranica;
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
                <th><?php echo 'timestamp'?></th>

              </tr>
            </thead>
            <tbody>

              <?php


              switch($_SESSION['lang']){
                case "hr":
                $izraz = $veza->prepare("
                  select 
                  a.sifra,
                  a.nazivJelo,
                  a.opis,
                  a.cijena,
                  a.vrijeme_kreiranja,

                  b.nazivTag,
                  c.nazivKategorija,
                  GROUP_CONCAT(DISTINCT e.nazivSastojak SEPARATOR ', ') as nazivSastojak
                  
                  from jelo a 
                  inner join tag b on a.tag=b.sifra
                  inner join kategorija c on a.kategorija=c.sifra
                  inner join jelo_sastojak d on a.sifra=d.jelo
                  inner join sastojak e on d.sastojak=e.sifra
                  where concat(a.nazivJelo,b.nazivTag,c.nazivKategorija,e.nazivSastojak) like :with
                  group by a.sifra, a.nazivJelo order by 1 limit :page, :per_page
                  ");
                

                $izraz->bindValue("page", $page * $per_page -  $per_page, PDO::PARAM_INT);
                $izraz->bindValue("per_page", $per_page, PDO::PARAM_INT);
                $izraz->bindParam("with", $with);
                $izraz->execute();
                $rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
                break;


                case "en":
                $izraz1 = $veza->prepare("
                  select 
                  a.sifra,
                  a.nazivJelo_en as nazivJelo,
                  a.opis,
                  a.cijena,
                  a.vrijeme_kreiranja,
                  b.nazivTag_en as nazivTag,
                  c.nazivKategorija_en as nazivKategorija,
                  GROUP_CONCAT(DISTINCT e.nazivSastojak_en SEPARATOR ', ') as nazivSastojak
                  
                  from jelo a 
                  inner join tag b on a.tag=b.sifra
                  inner join kategorija c on a.kategorija=c.sifra
                  inner join jelo_sastojak d on a.sifra=d.jelo
                  inner join sastojak e on d.sastojak=e.sifra
                  where concat(a.nazivJelo_en,a.vrijeme_kreiranja,b.nazivTag_en,c.nazivKategorija_en,e.nazivSastojak_en) like :with
                  AND a.vrijeme_kreiranja >'" . $diff_time . "' 
                  group by a.sifra, a.nazivJelo_en order by 1 limit :page, :per_page
                  ");
              

                $izraz1->bindValue("page", $page * $per_page -  $per_page , PDO::PARAM_INT);
                $izraz1->bindValue("per_page", $per_page, PDO::PARAM_INT);
                $izraz1->bindParam("with", $with);
                $izraz1->execute();
                $rezultati = $izraz1->fetchAll(PDO::FETCH_OBJ);
                break;
              }
     

              ?>
              <?php
              foreach ($rezultati as $red):
               ?>
               <tr>

                <td><?php echo $red->nazivJelo; ?></td>
                <td><?php echo $red->nazivTag; ?></td>
                <td><?php echo $red->nazivKategorija; ?></td>
                <td><?php echo $red->nazivSastojak; ?></td>
                <td><?php echo $red->vrijeme_kreiranja; ?></td>


              </tr>

            <?php endforeach; ?>
          </tbody>
        </table>

        <?php            
        if($ukupnoRedova>$per_page){
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