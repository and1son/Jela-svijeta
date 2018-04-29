<?php
include_once 'konfiguracija.php';
?>
<ul class="pagination text-center">
  <li class="pagination-previous"><a href="?per_page=<?php echo $per_page;?>&page=<?php echo $page - 1; ?>&uvjet=<?php echo isset($_GET["uvjet"]) ? $_GET["uvjet"] : "" ?>"><?php echo $lang['previous'];?></a></li>

  <li class="pagination-next"><a href="?per_page=<?php echo $per_page;?>&page=<?php echo $page + 1; ?>&uvjet=<?php echo isset($_GET["uvjet"]) ? $_GET["uvjet"] : "" ?>"><?php echo $lang['next'];?></a></li><br>
     <li><?php echo $page ?> / <?php echo $ukupnoStranica; ?></li>
</ul>