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
    
    Assets::get_instance();
    $this->setup_hooks();

  }
  protected function setup_hooks(){

  }
}
