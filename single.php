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

    // Check the post type
    if ($post->post_type === 'case_study') {
        // Redirect for 'case_study' post type
        wp_redirect("https://tsh-new-website.vercel.app/case-study/$slug");
        exit;
    } else {
        // Redirect for other post types
        wp_redirect("https://tsh-new-website.vercel.app/$slug");
        exit;
    }
}
?>


<div class="content index">


  <div id="primary">
    <main id="main" class="site-main mt-5" role="main">
      <a href="https://blog.ultatel.com/">BLOG ULTATEL single</a>

    </main>
  </div>
</div>