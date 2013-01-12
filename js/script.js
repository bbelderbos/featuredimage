(function($){
  // for autocomplete need select text in input field upon focus
  $("#bg1_url, #bg2_url, #overlay_url").focus(function(){
    this.select();
  });
  // workaround to make the focus work in safari
  // http://stackoverflow.com/questions/1269722/selecting-text-on-focus-using-jquery-not-working-in-safari-and-chrome
  $("#bg1_url, #bg2_url, #overlay_url").mouseup(function(e){
    e.preventDefault();
  });

	
  // automatically submit if url fields change (autocomplete select = populate does not work)
  $("#bg1_url, #bg2_url, #overlay_url").change(function() {
    $("#addImage").submit();
  });


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


  // google image autocomplete fields (x3)
  // 1.
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


  // 2.
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


  // 3.
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

  
  $("#saveImage").live('click', function(e) {
    alert("To be implemented ...");
    return false;
  });

})(jQuery);


function input_is_url(str){
  if(str.indexOf('http://') == 0) { 
    return true; 
  } else {
    return false; 
  }
}
