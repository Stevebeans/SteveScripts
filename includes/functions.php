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

// Create a shortcode for the custom field 

function stevescripts_display_file_url_shortcode($atts) {
  $atts = shortcode_atts(array(
      'post_id' => get_the_ID(),
  ), $atts);

  // Get the field value - assuming 'white_paper' is the field name
  $fileField = get_field('white_paper', $atts['post_id']);

  // Check if the field is set and has a URL
  if ($fileField && isset($fileField['url'])) {
      $url = $fileField['url'];
      // Create a link to the file
      return '<a href="' . esc_url($url) . '" download="Download File">Download File</a>';
  }

  return ''; // Return empty string if no file is found
}

add_shortcode('ss_wp_file', 'stevescripts_display_file_url_shortcode');
