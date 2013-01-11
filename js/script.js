(function($){
	$(".defaultText").live('focus', function(srcc){
    if ($(this).val() == $(this)[0].title) {
      $(this).removeClass("defaultTextActive");
      $(this).val("");
    }
  });
  $(".defaultText").live('blur', function(e){
    if ($(this).val() == "") {
      $(this).addClass("defaultTextActive");
      $(this).val($(this)[0].title);
    }
  });
	$(".defaultText").live().blur(); // ??

	
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


  // google image autocomplete
  $( "#bg1_url" ).autocomplete({
    source: "google_images_bg.php", 
    minLength: 2,
    select: function(event, ui) { 
      currentUrl = document.URL
      imageLink = encodeURIComponent(ui.item.url)
      newUrl = currentUrl.replace(/(.*bg1_url=)(?:[^&]+)(&.*)/, "$1"+imageLink+"$2"); 
      location.href=newUrl
    },
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


  $( "#bg2_url" ).autocomplete({
    source: "google_images_bg.php", 
    minLength: 2,
    select: function(event, ui) { 
      currentUrl = document.URL
      imageLink = encodeURIComponent(ui.item.url)
      newUrl = currentUrl.replace(/(.*bg2_url=)(?:[^&]+)(&.*)/, "$1"+imageLink+"$2"); 
      location.href=newUrl
    },
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


  $( "#overlay_url" ).autocomplete({
    source: "google_images_ol.php", 
    minLength: 2,
    select: function(event, ui) { 
      currentUrl = document.URL
      imageLink = encodeURIComponent(ui.item.url)
      newUrl = currentUrl.replace(/(.*overlay_url=)(?:[^&]+)(&.*)/, "$1"+imageLink+"$2"); 
      location.href=newUrl
    },
  }).data( "autocomplete" )._renderItem = function( ul, item ) {
    var imghtml = '';
    imghtml += "<a id="+item.id+">"; 
      imghtml += "<img style='height: 150px;' src='"+item.url+"'>"; 
    imghtml += "</a>";
    return $( "<li></li>" )
      .data( "item.autocomplete", item )
      .append(imghtml)
      .appendTo(ul);
  };

})(jQuery);
