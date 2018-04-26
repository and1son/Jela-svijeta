<?php
include_once 'konfiguracija.php';
require_once 'init.php';
?>
<ul class="pagination text-center">
  <li class="pagination-previous"><a href="?stranica=<?php echo $stranica - 1; ?>&uvjet=<?php echo isset($_GET["uvjet"]) ? $_GET["uvjet"] : "" ?>"><?php echo $lang['previous'];?></a></li>

  <li class="pagination-next"><a href="?stranica=<?php echo $stranica + 1; ?>&uvjet=<?php echo isset($_GET["uvjet"]) ? $_GET["uvjet"] : "" ?>"><?php echo $lang['next'];?></a></li><br>
     <li><?php echo $stranica ?> / <?php echo $ukupnoStranica; ?></li>
</ul>