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

  get_template_part(
  'template-parts/ag-products',
  null,
  [
    'ag-cards' => $cards,
  ]
);
?>

<?php get_footer('plain'); ?>
