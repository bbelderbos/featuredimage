(function($){

  // autocomplete progress spinner hides on loading page
  $('.spinner').hide();
  $('#instructions').hide();
  $.unblockUI();

  // this.select(); only worked for FF, the following
  // code works for safari / ipad as well
  $("input[type='text'], input[type='color']").live('mouseup', function (e) { 
    e.preventDefault(); 
  });
  $("input[type='text'], input[type='color']").live('focus', function () {
    this.setSelectionRange(0, 9999); 
  });
  

  // update canvas on any field change
  $("form#addImage *").live('change', function() {
    // reset spinner 
    $('.spinner').hide();

    var bgcolor = $("#bgcolor").val();
    $('#outerWrapper').css({"background-color": bgcolor });

    var titlecolor = $("#titlecolor").val();
    $('h1#blogtitle').css({"color": titlecolor });

    var title = $("#title").val();
    $('h1#blogtitle').html(title);

    // fonts are a bit more complicated, the key-value pair needs to be found
    // then the inline css and google font link need to be updated
    var fontCss = $("#font option:selected").val();
    var fontFam = "";
    $.get('googlefonts.txt', function(data){
      var fonts = new Array();
      var lines = data.split("\n");
      for (var i=0;i<lines.length;i++){
        var fields = lines[i].split("::");
        fonts[fields[0]] = fields[1];
      }
      // console.log(fonts);
      fontFam = fonts[fontCss];
      fontFam = fontFam.replace("font-family: ", "").replace(";", "");
      googleFontUrl = "http://fonts.googleapis.com/css?family="+fontCss;
      console.log(fontCss);
      console.log(fontFam);
      console.log(googleFontUrl);

      $('h1#blogtitle').css({"font-family": fontFam });
      //$('h1#blogtitle').css({"font-family": '"'+fontFam+'"' });
      $("link#titleGoogleFont").attr("href", googleFontUrl);
    });


    var topoffset = $("#topoffset").val();
    $('h1#blogtitle').css({"top": topoffset });

    var bg1_url = $("#bg1_url").val();
    var bg2_url = $("#bg2_url").val();
    $('#featImg').css({"background-image": "url("+bg1_url+"), url("+bg2_url+")" });

    var bg1_pos = $("#bg1_pos option:selected").val();
    var bg2_pos = $("#bg2_pos option:selected").val();
    $('#featImg').css({"background-position": bg1_pos+", "+bg2_pos });

    var bg1_size = $("#bg1_size option:selected").val();
    var bg2_size = $("#bg2_size option:selected").val();
    $('#featImg').css({"background-size": bg1_size+", "+bg2_size });

    var overlay_url = $("#overlay_url").val();
    $('#overlay').css({"background": "url("+overlay_url+")" });

    var overlay_pos = $("#overlay_pos option:selected").val();
    $('#overlay').css({"background-position": overlay_pos });

    var overlay_size = $("#overlay_size option:selected").val();
    $('#overlay').css({"background-size": overlay_size });

    var overlay_opacity = $("#overlay_opacity option:selected").val();
    $('#overlay').css({"opacity": overlay_opacity });

    var storeLink = $('#storeLink').is(':checked');
    var fbid = $("#fbid").val();

    if(storeLink == true){
      $("#addImage").submit(); 
    }

    return false;
  });


  // extra submit button
  $('#commitChanges').click(function(){
    $("#addImage").submit(); 
    return false;
  });

  
  // lock page upon submit
  $('form').submit(function(){
    $.blockUI({ message: '<h1><img src="i/loader.gif" /> Updating image ...</h1>' });
  });


  // fields with color picker
  $('#bgcolor, #titlecolor').spectrum({
    showInitial: true,
    showInput: true,
  });


  // google image autocomplete fields (x3)
  // 1.
  $( "#bg1_url" ).autocomplete({
    dataType: "json",
    source: "google_images_bg.php", 
    minLength: 2,
    search: function(event, ui) { 
      $('.spinner').show();
    },
    open: function(event, ui) {
      $('.spinner').hide();
    }, 
    select: function(event, ui) { 
      $(this).val(ui.item.value);
      var bg2_url = $("#bg2_url").val();
      $('#featImg').css({"background-image": "url("+ui.item.value+"), url("+bg2_url+")" });
    }
  }).data( "autocomplete" )._renderItem = function( ul, item ) {
    var imghtml = '';
    imghtml += "<a id="+item.id+">"; 
      imghtml += "<img style='height: 100px;' src='"+item.value+"'>"; 
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
      $(this).val(ui.item.value);
      var bg1_url = $("#bg1_url").val();
      $('#featImg').css({"background-image": "url("+bg1_url+"), url("+ui.item.value+")" });
    },
  }).data( "autocomplete" )._renderItem = function( ul, item ) {
    var imghtml = '';
    imghtml += "<a id="+item.id+">"; 
      imghtml += "<img style='height: 100px;' src='"+item.value+"'>"; 
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
      $(this).val(ui.item.value);
      $('#overlay').css({"background": "url("+ui.item.value+")" });
    },
  }).data( "autocomplete" )._renderItem = function( ul, item ) {
    var imghtml = '';
    imghtml += "<a id="+item.id+">"; 
      imghtml += "<img style='height: 100px;' src='"+item.value+"'>"; 
    imghtml += "</a>";
    return $( "<li></li>" )
      .data( "item.autocomplete", item )
      .append(imghtml)
      .appendTo(ul);
  };



  // show / hide instructions under save btn
  $("#saveImage").toggle(
    function () {
      $('#instructions').slideDown();
    },
    function () {
      $('#instructions').slideUp();
    }
  );


  $("#btnSave").click(function() { 
	html2canvas($("#featImg"), {

        $('.spinner').show();

		"logging": true, //Enable log (use Web Console for get Errors and Warnings)
		allowTaint: true,

		// "proxy":"html2canvasproxy.php", // allowTaint works better

		onrendered: function(canvas) {
			theCanvas = canvas;
			document.body.appendChild(canvas);

			// Convert and download as image 
			//Canvas2Image.saveAsPNG(canvas); 
			$("#img-out").append(canvas);

			// Clean up 
			//document.body.removeChild(canvas);
			var myImage = canvas.toDataURL("image/png");
			downloadURI("data:" + myImage, "yourImage.png");

            $('.spinner').hide();
		}
	});
  });

})(jQuery);

//Creating dynamic link that automatically click
function downloadURI(uri, name) {
	var link = document.createElement("a");
	link.download = name;
	link.href = uri;
	link.click();
	//after creating link you should delete dynamic link
	//clearDynamicLink(link); 
}


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
