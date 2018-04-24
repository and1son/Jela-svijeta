
<ul class="pagination text-center">
  <li class="pagination-previous"><a href="?stranica=<?php echo $stranica - 1; ?>&uvjet=<?php echo isset($_GET["uvjet"]) ? $_GET["uvjet"] : "" ?>">Prethodna</a></li>

  <li class="pagination-next"><a href="?stranica=<?php echo $stranica + 1; ?>&uvjet=<?php echo isset($_GET["uvjet"]) ? $_GET["uvjet"] : "" ?>">Sljedeća</a></li><br>
     <li><?php echo $stranica ?> / <?php echo $ukupnoStranica; ?></li>
</ul>