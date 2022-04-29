<?php

  //log file
  $fp = fopen('log.txt', 'a');
  fwrite($fp, 'Mail Sent Successfully!'.PHP_EOL);
  fclose($fp);
  
?>