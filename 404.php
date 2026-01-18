<?php
/**
 * 404.php
 * Aloha Goodies トップページ
 */
get_header('plain');
?>

<?php get_template_part( 'template-parts/hero' ); ?>

<div class="ag-404-content">
  <?php
  $error_text = ag_get_section_text('error');

  get_template_part(
    'template-parts/tagline',
    null,
    [
      'home_text' => $error_text,
    ]
  );
  ?>
</div>

<?php get_footer('plain'); ?>
