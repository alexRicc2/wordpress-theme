<?php

/**
 * Enqueue theme Sidebars
 * 
 * @package Aquila
 * 
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Sidebars
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
    add_action('widgets_init', [$this, 'register_sidebars']);
    add_action('widgets_init', [$this, 'register_clock_widget']);
    
    
  }
  public function register_sidebars()
  {
    register_sidebar(array(
      'name'          => __('Sidebar', 'aquila'),
      'id'            => 'sidebar-1',
      'description'   => __('Main sidebar.', 'aquila'),
      'before_widget' => '<div id="%1$s" class="widget %2$s widget-sidebar">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widgettitle">',
      'after_title'   => '</h3>',
    ));
    register_sidebar(array(
      'name'          => __('Footer', 'aquila'),
      'id'            => 'sidebar-2',
      'description'   => __('Main sidebar.', 'aquila'),
      'before_widget' => '<div id="%1$s" class="widget %2$s widget-footer">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widgettitle">',
      'after_title'   => '</h3>',
    ));
  }
  public function register_clock_widget()
  {
    register_widget('AQUILA_THEME\Inc\Clock_Widget');
  }
}
