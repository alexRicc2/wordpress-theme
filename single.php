<?php
/*
Single template  file
@package Aquila

*/
// Get the post object
$post = get_post();
if ($post) {
  // Get the post slug
  $slug = $post->post_name;

  // Redirect to the Next.js headless website
  wp_redirect("https://blog.ultatel.com/$slug");
  exit;
}
?>


<div class="content index">


  <div id="primary">
    <main id="main" class="site-main mt-5" role="main">
      <a href="https://blog.ultatel.com/">BLOG ULTATEL single</a>

    </main>
  </div>
</div>