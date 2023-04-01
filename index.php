<?php
/*
Main template  file
@package Aquiola

*/
get_header();


?>


<div class="content index">

  <!-- <?php get_template_part('template-parts/flexbox/boxes'); ?> -->
  <div id="primary">
    <main id="main" class="site-main mt-5" role="main">
      <?php
      if (have_posts()) :
      ?>
        <div class="container">
          <div>this is the index.php, just to be clear</div>
          <?php
          if (is_home() && !is_front_page()) {
          ?>
            <header class="mb-5">
              <h1 class="">
                <?php single_post_title() ?>
              </h1>
            </header>
          <?php
          }
          ?>
          <div class="row">
            <?php
            $index = 0;
            $no_of_columns = 3;


            while (have_posts()) : the_post();
              if ($index % $no_of_columns === 0) {
            ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                <?php
              }
              get_template_part('template-parts/content');

              $index++;
              if ($index !==  0 && 0 === $index % $no_of_columns) {
                ?>
                </div>
            <?php
              }

            endwhile;
            ?>
          </div>
          <?php aquila_pagination();?>
        </div>
      <?php
      else :
        get_template_part('template-parts/content-none');
      endif;

      ?>
    </main>
  </div>
</div>
<?php
get_footer();
