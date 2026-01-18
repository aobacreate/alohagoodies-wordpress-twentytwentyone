jQuery(function ($) {

  $('.ag-product-card').on('click', function () {
    const key = $(this).data('product');
    $('#overlay-' + key).addClass('is-open');
  });

  $('.ag-overlay-close').on('click', function (e) {
    e.stopPropagation();
    $(this).closest('.ag-overlay').removeClass('is-open');
  });

  $('.ag-overlay').on('click', function () {
    $(this).removeClass('is-open');
  });

  $('.ag-overlay-inner').on('click', function (e) {
    e.stopPropagation();
  });

});
