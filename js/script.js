(function($){

  // autocomplete progress spinner hides on loading page
  $('.spinner').hide();
  $('#instructions').hide();

  //after load complete unblock page (gets blocked with submit)
  // $.unblockUI();

  // this.select(); only worked for FF, the following
  // code works for safari / ipad as well
  $("input[type='text'], input[type='color'], textarea").live('mouseup', function (e) { 
    e.preventDefault(); 
  });
  $("input[type='text'], input[type='color'], textarea").live('focus', function () {
    this.setSelectionRange(0, 9999); 
  });

	
  // progress loader upon submit
  $('form').submit(function() {
    $("#progress").html("<img src='i/loader.gif'>");
    // $.blockUI({ message: '<h1><img src="i/loader.gif" /> Updating image ...</h1>' });
    var bgcolor = $("#bgcolor").val();
    var titlecolor = $("#titlecolor").val();
    var title = $("#title").val();
    var font = $("#font option:selected").val();
    var topoffset = $("#topoffset").val();
    var bg1_url = $("#bg1_url").val();
    var bg1_pos = $("#bg1_pos option:selected").val();
    var bg1_size = $("#bg1_size option:selected").val();
    var bg2_url = $("#bg2_url").val();
    var bg2_pos = $("#bg2_pos option:selected").val();
    var bg2_size = $("#bg2_size option:selected").val();
    var overlay_url = $("#overlay_url").val();
    var overlay_pos = $("#overlay_pos option:selected").val();
    var overlay_size = $("#overlay_size option:selected").val();
    var overlay_opacity = $("#overlay_opacity option:selected").val();
    var storeLink = $('#storeLink').is(':checked');
    var create = $("#create").val();
    var fbid = $("#fbid").val();
    alert(font); // undefined?
    return false;
  });



  // fields with color picker
  $('#bgcolor, #titlecolor').spectrum({
    showInitial: true,
    showInput: true,
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
  

  // show / hide instructions under save btn
  $("#saveImage").toggle(
    function () {
      $('#instructions').slideDown();
    },
    function () {
      $('#instructions').slideUp();
    }
  );

})(jQuery);


function input_is_url(str){
  if(str.indexOf('http://') == 0) { 
    return true; 
  } else {
    return false; 
  }
}

function googleplusbtn(url) {                                                                                                                     
  sharelink = "https://plus.google.com/share?url="+url;
  newwindow=window.open(sharelink,'name','height=400,width=600');
  if (window.focus) {newwindow.focus()}
  return false;
}
