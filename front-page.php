<?php
/* Template Name: Home */
get_header();
?>


<div class="container">
  <div class="row">
    <div class="col-6 about-paragraph">
      <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h1>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
        ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
        aliquip ex ea commodo consequat. Duis aute irure dolor in
        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
        culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
    <div class="col-6 main-image">
      <div class="img-bx">
        <?php
        if (has_post_thumbnail()) {
          the_post_thumbnail();
        }
        ?>
      </div>
    </div>
  </div>
</div>


<?php get_footer(); ?>