<?php
  $cached = fopen($cachefile, 'w');
  fwrite($cached, sanitize_output(ob_get_contents()));
  fclose($cached);
  ob_end_flush();
?>