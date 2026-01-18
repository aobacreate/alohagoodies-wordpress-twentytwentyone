<?php
/**
 * front-page.php
 * Aloha Goodies トップページ
 */
get_header('plain');
?>

<?php get_template_part( 'template-parts/hero' ); ?>

<?php
$home_text = ag_get_section_text('home');

get_template_part(
  'template-parts/tagline',
  null,
  [
    'home_text' => $home_text,
  ]
);
?>

<?php get_template_part( 'template-parts/ag-categories' ); ?>

<?php get_footer('plain'); ?>
