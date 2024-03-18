<!DOCTYPE html>
<html>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  <div class="container header">
    <div class="row">
      <div class="col-12">
        <?php wp_nav_menu(array('theme_location' => 'header_page')); ?>
      </div>
    </div>
  </div>