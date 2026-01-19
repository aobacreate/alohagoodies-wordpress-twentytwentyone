<?php
/**
 * Hero section
 */
?>

<header class="hero">
  <h1 class="hero-title">
    <a href="<?php echo esc_url( home_url('/') ); ?>" class="hero-logo">
      <img
        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png"
        alt=""
      >
      <span><?php bloginfo( 'name' ); ?></span>
    </a>
  </h1>
  
  <div class="hero-inner">
    <img
      src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/home/hero4.webp"
      alt="<?php bloginfo( 'name' ); ?>"
    >
  </div>
</header>
