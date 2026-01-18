<?php
/**
 * Aloha Goodies (TT1 Child) functions
 */
add_action( 'wp_enqueue_scripts', function () {

  // 親テーマ Twenty Twenty-One
  wp_enqueue_style(
    'twentytwentyone-style',
    get_template_directory_uri() . '/style.css',
    [],
    wp_get_theme( 'twentytwentyone' )->get( 'Version' )
  );

  // 子テーマ Aloha Goodies（base）
  wp_enqueue_style(
    'alohagoodies-style',
    get_stylesheet_directory_uri() . '/style.css',
    [ 'twentytwentyone-style' ],
    filemtime( get_stylesheet_directory() . '/style.css' )
  );

  // hero
  wp_enqueue_style(
    'alohagoodies-hero',
    get_stylesheet_directory_uri() . '/assets/css/hero.css',
    [ 'alohagoodies-style' ],
    filemtime( get_stylesheet_directory() . '/assets/css/hero.css' )
  );

  // tagline
  wp_enqueue_style(
    'alohagoodies-tagline',
    get_stylesheet_directory_uri() . '/assets/css/tagline.css',
    [ 'alohagoodies-hero' ],
    filemtime( get_stylesheet_directory() . '/assets/css/tagline.css' )
  );

  // categories（base の後でOK）
  wp_enqueue_style(
    'alohagoodies-categories',
    get_stylesheet_directory_uri() . '/assets/css/ag-categories.css',
    [ 'alohagoodies-style' ],
    filemtime( get_stylesheet_directory() . '/assets/css/ag-categories.css' )
  );

}, 20 );

function ag_get_home_text() {
  return [
    'title' => [
      'ハワイの風や空気を感じられる、',
      '小さな雑貨を集めたショップです。',
    ],
    'subtitle' => [
      '毎日の暮らしに、',
      '少しだけ南国のやさしさを。',
    ],
  ];
}

function ag_get_categories() {
  $base_uri  = get_stylesheet_directory_uri();
  $base_link = home_url( '/' );

  $categories = [
    [
      'slug'  => 'accessories',
      'title' => 'Accessories',
      'desc'  => '自然素材を使ったハワイアンアクセサリー',
      'image' => $base_uri . '/assets/img/home/cat-accessories.webp',
    ],
    [
      'slug'  => 'interior-goods',
      'title' => 'Interior Goods',
      'desc'  => '自然のぬくもりを感じるインテリア雑貨',
      'image' => $base_uri . '/assets/img/home/cat-interior.webp',
    ],
    [
      'slug'  => 'kitchen-tableware',
      'title' => 'Kitchen & Tableware',
      'desc'  => '島の暮らしを感じるキッチンウェア',
      'image' => $base_uri . '/assets/img/home/cat-kitchen.webp',
    ],
    [
      'slug'  => 'apparel-fabric',
      'title' => 'Apparel & Fabric',
      'desc'  => 'リラックスできるアパレルとファブリック',
      'image' => $base_uri . '/assets/img/home/cat-apparel.webp',
    ],
  ];

  // slug からシンプルにリンクを作る（まずはこれで十分）
  foreach ( $categories as &$cat ) {
    $cat['link'] = $base_link . $cat['slug'] . '/';
  }
  unset( $cat ); // 参照解除

  return $categories;
}


