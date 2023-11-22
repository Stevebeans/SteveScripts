<?php 

function sb_log($log_msg)
{
  $log_filename = SS_PATH . './logs/';


  if (!file_exists($log_filename)) {
    // create directory/folder uploads.
    mkdir($log_filename, 0777, true);
  }
  $log_file_data = $log_filename . "/log_" . date("M-Y") . ".log";

  file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}