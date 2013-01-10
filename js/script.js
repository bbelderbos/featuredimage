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
  //$("form *").change(function() {
  //  $("#addImage").submit();
  //});

  // google image autocomplete
  $( "#bg1_url" ).autocomplete({
    source: "google_images.php", // passes $_GET['term']
    select: function(event, ui) {
      value = $("#bg1_url").val();
      // alert(ui.item.url);
      $("#bg1_url").val(ui.item.url); // todo: does not work
    },
    minLength: 2
  }).data( "autocomplete" )._renderItem = function( ul, item ) {
    var imghtml = '';
    imghtml += "<a id="+item.id+">"; 
      imghtml += "<img src='"+item.url+"'>"; 
    imghtml += "</a>";
    return $( "<li></li>" )
      .data( "item.autocomplete", item )
      .append(imghtml)
      .appendTo(ul);
  };

})(jQuery);
