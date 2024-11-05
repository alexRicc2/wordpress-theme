<?php
/*
Main template  file
@package Aquila

*/
// get_header();
if (!isset($_GET['no_redirect'])) {
  wp_redirect("https://example.com/");
  exit;
}
?>


<div class="content index">

  <div id="primary">
    <main id="main" class="site-main mt-5" role="main">
      <a href="https://tsh-new-website.vercel.app/">The SEO Hustler</a>
    </main>
  </div>
</div>