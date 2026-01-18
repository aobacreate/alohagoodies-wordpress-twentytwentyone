<?php
/**
 * front-page.php
 * Aloha Goodies トップページ
 */
get_header();
?>

<main class="site-main">

  <?php
  // categories.map(...) 相当
  $categories = [
    [
      'slug'  => 'accessories',
      'title' => 'Accessories',
      'desc'  => '自然素材を使ったハワイアンアクセサリー',
      'image' => get_stylesheet_directory_uri() . '/assets/img/home/cat-accessories.webp',
    ],
    [
      'slug'  => 'interior-goods',
      'title' => 'Interior Goods',
      'desc'  => '自然のぬくもりを感じるインテリア雑貨',
      'image' => get_stylesheet_directory_uri() . '/assets/img/home/cat-interior.webp',
    ],
    [
      'slug'  => 'kitchen-tableware',
      'title' => 'Kitchen & Tableware',
      'desc'  => '島の暮らしを感じるキッチンウェア',
      'image' => get_stylesheet_directory_uri() . '/assets/img/home/cat-kitchen.webp',
    ],
    [
      'slug'  => 'apparel-fabric',
      'title' => 'Apparel & Fabric',
      'desc'  => 'リラックスできるアパレルとファブリック',
      'image' => get_stylesheet_directory_uri() . '/assets/img/home/cat-apparel.webp',
    ],
  ];
  ?>

  <div id="item-card">
    <div id="items-grid">
      <?php foreach ( $categories as $category ) : ?>
        <div class="category-card">
          <a href="<?php echo esc_url( home_url( '/' . $category['slug'] . '/' ) ); ?>">
            <figure class="product-card__thumb">
              <img
                src="<?php echo esc_url( $category['image'] ); ?>"
                alt="<?php echo esc_attr( $category['title'] ); ?>"
              >
            </figure>
            <div class="product-card__body">
              <h2 class="product-card__title">
                <?php echo esc_html( $category['title'] ); ?>
              </h2>
              <p class="product-card__desc">
                <?php echo esc_html( $category['desc'] ); ?>
              </p>
            </div>
          </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

</main>

<?php get_footer(); ?>
