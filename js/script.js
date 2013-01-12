(function($){

  // autocomplete progress spinner hides on loading page
  $('.spinner').hide();

  //after load complete unblock page (gets blocked with submit)
  $.unblockUI();

  // this.select(); only worked for FF, the following
  // code works for safari / ipad as well
  $("input[type='text'], input[type='color'], textarea").live('mouseup', function (e) { 
    e.preventDefault(); 
  });
  $("input[type='text'], input[type='color'], textarea").live('focus', function () {
    this.setSelectionRange(0, 9999); 
  });

	
  // progress loader upon submit
  $('form#addImage').submit(function() {
    // block page
    $.blockUI({ message: '<h1><img src="i/loader.gif" /> Updating image ...</h1>' });
    $("#progress").html("<img src='i/loader.gif'>");
    //return false;
  });



  // fields with color picker
  $('#bgcolor, #titlecolor').ColorPicker({
    onSubmit: function(hsb, hex, rgb, el) {
      $(el).val(hex);
      $(el).ColorPickerHide();
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
    search: function(event, ui) { 
      $('.spinner').show();
    },
    open: function(event, ui) {
      $('.spinner').hide();
    }, 
    select: function(event, ui) { 
      $('.spinner').show();
      currentUrl = document.URL;
      imageLink = encodeURIComponent(ui.item.url);
      newUrl = currentUrl.replace(/(.*bg1_url=)(?:[^&]*)(&.*)/, "$1"+imageLink+"$2"); 
      $(this).val(newUrl);
      location.href=newUrl;
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
    search: function(event, ui) { 
      $('.spinner').show();
    },
    open: function(event, ui) {
      $('.spinner').hide();
    }, 
    select: function(event, ui) { 
      $('.spinner').show();
      currentUrl = document.URL;
      imageLink = encodeURIComponent(ui.item.url);
      newUrl = currentUrl.replace(/(.*bg2_url=)(?:[^&]*)(&.*)/, "$1"+imageLink+"$2"); 
      $(this).val(newUrl);
      location.href=newUrl;
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
    search: function(event, ui) { 
      $('.spinner').show();
    },
    open: function(event, ui) {
      $('.spinner').hide();
    }, 
    select: function(event, ui) { 
      $('.spinner').show();
      currentUrl = document.URL;
      imageLink = encodeURIComponent(ui.item.url);
      newUrl = currentUrl.replace(/(.*overlay_url=)(?:[^&]*)(&.*)/, "$1"+imageLink+"$2"); 
      $(this).val(newUrl);
      location.href=newUrl;
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


  // if clicking storeLink, autosubmit
  $("#storeLink").change(function() {
    $("#addImage").submit();
  });
  

  // todo: download image as png to desktop 
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
