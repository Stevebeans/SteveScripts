<?php 

class SteveScripts_Update_Checker {
  private $current_version;
  private $update_uri;
  private $plugin_slug;
  private $plugin_file;

  public function __construct($current_version, $update_uri, $plugin_slug, $plugin_file) {
      $this->current_version = $current_version;
      $this->update_uri = $update_uri;
      $this->plugin_slug = $plugin_slug;
      $this->plugin_file = $plugin_file;

      add_filter('pre_set_site_transient_update_plugins', [$this, 'check_update']);
  }

  public function check_update($transient) {
      if (empty($transient->checked)) {
          return $transient;
      }

      // Check the external API for the latest version
      $response = wp_remote_get($this->update_uri);

      if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
          return $transient;
      }

      $data = json_decode(wp_remote_retrieve_body($response));

      if (version_compare($this->current_version, $data->tag_name, '<')) {
          $plugin_data = new stdClass();
          $plugin_data->slug = $this->plugin_slug;
          $plugin_data->new_version = $data->tag_name;
          $plugin_data->url = $data->html_url;
          $plugin_data->package = $data->zipball_url;

          $transient->response[$this->plugin_file] = $plugin_data;
      }

      return $transient;
  }
}
