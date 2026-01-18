<?php
/**
 * Categories section
 */
$ag_categories = ag_get_categories();
?>

<h1 class="section-title">
  Our Items
</h1>  

<div class="ag-container">
  <div class="ag-grid-layout">

    <?php foreach ( $ag_categories as $category ) : ?>
      <?php
        get_template_part(
          'template-parts/ag-category',
          null,
          [
            'ag_card' => $category,
          ]
        );
      ?>
    <?php endforeach; ?>

  </div>
</div>