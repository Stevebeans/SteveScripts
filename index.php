<?php
/**
 * Plugin Name: SteveScripts
 * Plugin URI:  https://payvisv2.onpressidium.com/
 * Description: This is a custom plugin written for Zeth Owen at Greatness Digital
 * Version:     1.1
 * Author:      Steve Beliveau
 * Author URI:  https://payvisv2.onpressidium.com/
 * License:     GPL2
 */

// Prevent direct file access.
if (!defined('ABSPATH')) {
    exit;
}

// Define Plugin version 
if (!defined('SS_VERSION')) {
  function get_stevescripts_version() {
      if (!function_exists('get_plugin_data')) {
          require_once(ABSPATH . 'wp-admin/includes/plugin.php');
      }
      $plugin_data = get_plugin_data(__FILE__);
      return $plugin_data['Version'];
  }
  define('SS_VERSION', get_stevescripts_version());
}





// Define Plugin path

    define('SS_PATH', plugin_dir_path(__FILE__));


// define includes folder 

    define('SS_INCLUDES', SS_PATH . 'includes/');


require_once(SS_INCLUDES . 'directory.php');
// Include the update checker class

// Instantiate the update checker
$update_checker = new SteveScripts_Update_Checker(
    SS_VERSION,
    'https://api.github.com/repos/Stevebeans/SteveScripts/releases/latest',
    'stevescripts',
    plugin_basename(__FILE__)
);
// include the directory of the includes folder
;