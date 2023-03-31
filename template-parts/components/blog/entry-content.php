<?php

/**
 * template entry content
 * 
 * to be used inside the wordpress the loop
 * @package aquila
 */
?>

<div class="entry-content">
  <?php
  if (is_single()) {
    the_content(
      sprintf(
        wp_kses(
          __('continue reading %s <span class="meta-nav">&rarr;</span>', 'aquila'),
          [
            'span' => [
              'class' => []
            ]
          ]
        ),
        the_title('<span class="screen-reader-text">"', '"</span>', false)
      )
    );
  } else {
    aquila_the_excerpt(50);
    echo aquila_excerpt_more();
  }
  ?>

</div>