<?php
/**
 * page.php
 * Aloha Goodies 固定ページ
 */
get_header('plain');
?>

<?php get_template_part( 'template-parts/hero' ); ?>

<?php
$slug = get_post_field( 'post_name', get_post() );
$section_text = ag_get_section_text($slug);

get_template_part(
  'template-parts/tagline',
  null,
  [
    'home_text' => $section_text,
  ]
);
?>

<?php
  $cards = ag_get_items($slug);
?>

<div class="ag-container">
  <div class="ag-products-layout">
    <?php foreach ( $cards as $card ) : ?>
      <?php $key = sanitize_title( $card['name'] ); ?>
      <div
        class="ag-product-card"
        data-product="<?php echo esc_attr($key); ?>"
      >
        <div class="ag-product-card-inner">
          <div class="image-product-square">
            <img
              src="<?php echo esc_url( $card['image'] ); ?>"
              alt="<?php echo esc_attr( $card['name'] ); ?>"
            >
          </div>
          <h1 class="ag-product-name"><?php echo esc_html( $card['name'] ); ?></h1>
          <p class="ag-product-price"><?php echo '¥' . esc_html( $card['price'] ); ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php foreach ( $cards as $card ) : ?>
  <?php $key = sanitize_title( $card['name'] ); ?>

  <div
    class="ag-overlay"
    id="overlay-<?php echo esc_attr( $key ); ?>"
  >
    <div class="ag-overlay-inner">
      <button class="ag-overlay-close">×</button>

      <img
        src="<?php echo esc_url( $card['image'] ); ?>"
        alt="<?php echo esc_attr( $card['name'] ); ?>"
      >

      <h2><?php echo esc_html( $card['name'] ); ?></h2>

      <p class="ag-product-price">
        <?php echo '¥' . esc_html( $card['price'] ); ?>
      </p>

      <p class="ag-product-desc">
        <?php echo esc_html( $card['description'] ); ?>
      </p>
    </div>
  </div>
<?php endforeach; ?>

<?php get_footer('plain'); ?>
