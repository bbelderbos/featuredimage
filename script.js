(function($){
  // fields with color picker
  $('#bgcolor, #titlecolor').ColorPicker({
    onSubmit: function(hsb, hex, rgb, el) {
      $(el).val(hex);
      $(el).ColorPickerHide();
      // submit form on change
      $("#addImage").submit();
    },
    onBeforeShow: function () {
      $(this).ColorPickerSetColor(this.value);
    }
  })
  .bind('keyup', function(){
    $(this).ColorPickerSetColor(this.value);
  });

  // automatically submit if changes are made to the form
  $("form *").change(function() {
    $("#addImage").submit();
  });
})(jQuery);
