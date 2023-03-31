<?php

/**
 * template part for displaying a message that post can not be found
 * @package aquila
 */
?>

<section>
  <header>
    <h1><?php esc_html_e('Nothing found', 'aquila') ?></h1>
  </header>
  <div>
    <?php
    if (is_home() && current_user_can('publish_posts')) {
    ?>
      <p>
        <?php
        printf(wp_kses(
          __('Ready to publish your first posts? <a href="%s">Get started here </a>', 'aquila'),
          [
            'a' => [
              'href' => []
            ]
          ]
        ), esc_url(admin_url('post-new.php')))
        ?>
      </p>
    <?php
    } elseif (is_search()) {
    ?>
      <p><?php esc_html_e('Sorry but not matched your search '); ?></p>
    <?php
    get_search_form();
    }
    else{
      ?>
      <p><?php esc_html_e('ahhhhhh we could not find what you want. '); ?></p>
      <?php
      get_search_form();
    }
    ?>
  </div>
</section>