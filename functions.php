<?php

add_action('after_setup_theme', 'webtinus_theme_setup');
function webtinus_theme_setup()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('woocommerce');

  register_nav_menus(
    array(

      'header_page' => 'هدر',
      'header2' => 'هدر 2',
      'footer1' => 'فوتر 1',
      'footer2' => 'فوتر 2'

    )
  );
}
add_filter('show_admin_bar', '__return_true');
add_action('wp_enqueue_scripts', 'webtinus_name_scripts');
function webtinus_name_scripts()
{

  wp_enqueue_script('jquery-3.6.4', get_template_directory_uri() . '/js/jquery-3.6.4.min.js', array(), '1.0.0', true);
  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true);

  wp_enqueue_script('owl.carousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1.0.0', true);

  wp_enqueue_style('owl.carousel-css', get_template_directory_uri() . '/css/owl.carousel.min.css');
  wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/css/font-awesome.min.css');

  wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.min.js', array(), '1.0.0', true);
  wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.min.css');

  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
  wp_enqueue_style('style', get_template_directory_uri() . '/style.css');

}

add_action('widgets_init', 'wpdocs_theme_slug_widgets_init');
function wpdocs_theme_slug_widgets_init()
{
  register_sidebar(
    array(
      'name' => 'سایدبار مقاله',
      'id' => 'sidebar_blog',
      'description' => '',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4>',
      'after_title' => '</h4>',
    )
  );

}

// different archives

function custom_post_type_dates()
{
  $args = array(
    'public' => true,
    'label' => 'Dates',
    'supports' => array('title', 'editor', 'thumbnail'),
  );
  register_post_type('dates', $args);


  $taxonomy_args = array(
    'hierarchical' => true,
    'labels' => array(
      'name' => 'Dates Categories',
      'singular_name' => 'Dates Category',
    ),
    'public' => true,
  );
  register_taxonomy('dates-category', 'dates', $taxonomy_args);
}

add_action('init', 'custom_post_type_dates');



// Comment Layout
function wp_bootstrap_comments($comment, $args, $depth)
{
  $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class(); ?>>
    <div id="comment-<?php comment_ID(); ?>" class="comment-box">
      <div class="comment-left" itemscope itemtype="http://schema.org/Person">
        <?php if ($comment->comment_approved == '0'): ?>
          <div class="alert-message success">
            <p>دیدگاه شما در انتظار تایید می باشد.</p>
          </div>
        <?php endif; ?>
        <h5 itemprop="name">
          <?php comment_author(); ?>
        </h5><span>
          <?php echo get_comment_time(); ?>
        </span>
        <div itemprop="description">
          <?php comment_text(); ?>
        </div>
        <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
      </div>
    </div>
    <?php
}

function list_pings($comment, $args, $depth)
{
  $GLOBALS['comment'] = $comment;
  ?>
  <li id="comment-<?php comment_ID(); ?>"><i class="icon icon-share-alt"></i>&nbsp;
    <?php comment_author_link();
}





if (function_exists('acf_add_options_page')) {
  acf_add_options_page(
    array(
      'page_title' => 'تنظیمات سایت',
      'menu_title' => 'تنظیمات سایت',
      'menu_slug' => 'theme-general-settings',
      'capability' => 'edit_posts',
      'redirect' => true
    )
  );

  acf_add_options_sub_page(
    array(
      'page_title' => 'تنظیمات هدر',
      'menu_title' => 'هدر',
      'menu_slug' => 'header',
      'parent_slug' => 'theme-general-settings',
    )
  );

  acf_add_options_sub_page(
    array(
      'page_title' => 'تنطیمات فوتر',
      'menu_title' => 'فوتر',
      'menu_slug' => 'footer',
      'parent_slug' => 'theme-general-settings',
    )
  );
}


?>