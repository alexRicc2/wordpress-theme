<?php

/**
 * Bootstraps the theme
 * 
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

//This class we don't want to instanciate more than once, so that's why we created our singleton, so we will use the trait-singleton to use it's method, and it's a trait so we can use in more than one class and we don't want to extend our class
class AQUILA_THEME
{
  use Singleton;


  //we don't want any other class accessing the construct method
  protected function __construct()
  {
    //load class
    Meta_Boxes::get_instance();
    Assets::get_instance();
    Menus::get_instance();
    Sidebars::get_instance();
    $this->setup_hooks();
  }
  protected function setup_hooks()
  {
    /**
     * actions
     */

    add_action('after_setup_theme', [$this, 'setup_theme']);
  }
  public function setup_theme()
  {

    add_theme_support('title-tag');
    add_theme_support('custom-logo', [
      'header-text' => ['site-title', 'site-description'],
      'height' => 100,
      'width'  => 400,
      'flex-height' => true,
      'flex-width' => true,
    ]);
    add_theme_support('custom-background', [
      'default-color' => '#fff',
      'default-image' => '',
    ]);

    add_theme_support('post-thumbnails');
    add_theme_support( 'automatic-feed-links');
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style']);
    add_editor_style();
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    global $content_width;
    if( !isset( $content_width)){
      $content_width = 1240;
    }

    add_image_size('featured-large', 350, 233, true);
  }
}
