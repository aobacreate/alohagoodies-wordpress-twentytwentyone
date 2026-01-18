<?php
/**
 * Category section
 */

$card = $args['ag_card'] ?? null;

if ( ! $card ) {
  return;
}
?>
<div class="ag-category-cards">
  <div class="ag-category-card">
    <div class="image-square">
      <img
        src="<?php echo esc_url( $card['image'] ); ?>"
        alt="<?php echo esc_attr( $card['title'] ); ?>"
        class="object-cover"
      >
    </div>
    <h2 class="ag-card-title">
      <?php echo esc_html( $card['title'] ); ?>
    </h2>
    <p class="ag-card-desc">
      <?php echo esc_html( $card['desc'] ); ?>
    </p>
    <a href="<?php echo esc_url( $card['link'] ); ?>" class="ag-button">
      VIEW
    </a>
  </div>
</div>
