<?php $ag_texts = ag_get_footer_text(); ?>

<footer class="ag-footer">
  <div class="ag-footer-inner">
    <?php foreach ( $ag_texts as $ag_text ) :
      $title = esc_html( $ag_text['title'] );
      $lines = $ag_text['lines'];
    ?>
      <div class="ag-footer-block">
        <h3 class="ag-footer-title"><?php echo $title; ?></h3>

        <div class="ag-footer-info">
          <?php foreach ( $lines as $raw_line ) :
            $line = esc_html( $raw_line );
          ?>
            <div class="ag-footer-line"><?php echo $line; ?></div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="ag-footer-logo"><?php bloginfo( 'name' ); ?></div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
