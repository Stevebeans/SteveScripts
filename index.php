<?php
/**
 * Plugin Name: SteveScripts
 * Plugin URI:  https://payvisv2.onpressidium.com/
 * Description: This is a custom plugin written for Zeth Owen at Greatness Digital
 * Version:     1.0
 * Author:      Steve Beliveau
 * Author URI:  https://payvisv2.onpressidium.com/
 * License:     GPL2
 */

// Prevent direct file access.
if (!defined('ABSPATH')) {
    exit;
}

// Define Plugin version 
if (!defined('STEVESCRIPTS_VERSION')) {
    define('STEVESCRIPTS_VERSION', '1.0');
}


// Define Plugin path
if (!defined('STEVESCRIPTS_PATH')) {
    define('SS_PATH', plugin_dir_path(__FILE__));
}

// define includes folder 
if (!defined('STEVESCRIPTS_INCLUDES')) {
    define('SS_INCLUDES', SS_PATH . 'includes/');
}

// include the directory of the includes folder

require_once(SS_INCLUDES . 'directory.php');