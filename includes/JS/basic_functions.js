(function ($) {
  $(document).ready(function () {
    // Adjust 'field_XXXXXX' to your ACF field key
    acf.addAction("change", '[data-key="field_XXXXXX"] input[type="file"]', function ($el) {
      var fileUrl = $el.val();
      // Set the value of the second field
      // Adjust 'field_YYYYYY' to your second ACF field key
      $('input[data-key="field_YYYYYY"]').val(fileUrl);
    });
  });
})(jQuery);
