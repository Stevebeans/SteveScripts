<?php 

require_once(SS_INCLUDES . 'functions.php');
require_once(SS_INCLUDES . 'version_check.php');


function stevescripts_enqueue_admin_scripts() {
  wp_enqueue_script('stevescripts-acf-autopopulate', SS_INCLUDES . 'js/basic_functions.js', array('jquery'), SS_VERSION, true);
}
add_action('admin_enqueue_scripts', 'stevescripts_enqueue_admin_scripts');
