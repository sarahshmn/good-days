<?php
/* Template Name: Archive */

get_header();

?>

<div class="albums-date left-archive">
  <?php
  $query = new WP_Query(
    array(
      'post_type' => 'post',
      'paged' => $paged,
      'posts_per_page' => 6
    )
  );
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();

      ?>
      <div class="post post-pro dates-left">

        <a href="<?php echo get_the_permalink(); ?>">
          <?php the_title(); ?>
          <?php
          if (has_post_thumbnail()) {
            the_post_thumbnail();
          }
          ?>
        </a>


      </div>

      <?php
    }
  }

  ?>
</div>

<div class="albums-date right-archive">
  <?php
  $query = new WP_Query(
    array(
      'post_type' => 'dates',
      'paged' => $paged,
      'posts_per_page' => 6
    )
  );
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();

      ?>
      <div class="post post-pro dates-right">

        <a href="<?php echo get_the_permalink(); ?>">
          <?php the_title(); ?>
          <?php
          if (has_post_thumbnail()) {
            the_post_thumbnail();
          }
          ?>
        </a>


      </div>

      <?php
    }
  }

  ?>
</div>



<?php get_footer(); ?>