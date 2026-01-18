<?php
/**
 * Tagline section
 */

$home_text = $args['home_text'] ?? null;

if ( ! $home_text ) {
  return;
}
?>

<section class="tagline">

  <?php if ( ! empty( $home_text['title'] ) ) : ?>
    <div class="taglines">
      <?php foreach ( $home_text['title'] as $line ) : ?>
        <div><?php echo esc_html( $line ); ?></div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <?php if ( ! empty( $home_text['subtitle'] ) ) : ?>
    <div class="taglines">
      <?php foreach ( $home_text['subtitle'] as $line ) : ?>
        <div><?php echo esc_html( $line ); ?></div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

</section>
