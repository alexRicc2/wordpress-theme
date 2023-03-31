<?php

/**
 * Register meta boxes
 * 
 * @package Aquila
 * 
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Meta_Boxes
{
  use Singleton;

  //we don't want any other class accessing the construct method
  protected function __construct()
  {
    //load class

    $this->setup_hooks();
  }
  protected function setup_hooks()
  {
    //actions and filter
    /**
     * actions
     */
    add_action('add_meta_boxes', [$this, 'add_custom_meta_box']);
    add_action('save_post', [$this, 'save_post_meta_data']);
  }

  public function add_custom_meta_box()
  {
    $screens = ['post'];
    foreach ($screens as $screen) {
      add_meta_box(
        'hide-page-title',
        __('Hide page title', 'aquila'),
        [$this, 'custom_meta_box_html'],
        $screen,
        'side'
      );
    }
  }
  public function custom_meta_box_html($post)
  {

    $value = get_post_meta($post->ID, '_hide_page_title', true);
    wp_nonce_field(plugin_basename(__FILE__), 'hide_title_meta_box_nonce_name');

?>
    <label for="aquila_field"><?php esc_html_e('hide the page title', 'aquila'); ?></label>
    <select name="aquila_hide_title_field" id="aquila-field" class="postbox">
      <option value=""><?php esc_html_e('select', 'aquila'); ?></option>
      <option value="yes" <?php selected($value, 'yes'); ?>><?php esc_html_e('yes', 'aquila'); ?></option>
      <option value="no" <?php selected($value, 'no'); ?>><?php esc_html_e('no', 'aquila'); ?></option>
    </select>
<?php
  }
  public function save_post_meta_data($post_id)
  {

    if (current_user_can('edit_post', $post_id)) {
      return;
    }
    /**
     * check if the nonce value we receveid is the same we created
     */

    if (!isset($_POST['hide_title_meta_box_nonce_name']) || !wp_verify_nonce('hide_title_meta_box_nonce_name', plugin_basename(__FILE__))) {
      return;
    }

    if (array_key_exists('aquila_hide_title_field', $_POST)) {
      update_post_meta(
        $post_id,
        '_hide_page_title',
        $_POST['aquila_hide_title_field']
      );
    }
  }
}
