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

(function($){

  $('#moreFields').hide();

  $('#more').click(function(){
	var $this = $(this);
  	$this.text($this.text() == "more ..." ? "less ..." : "more ...");
    $("#moreFields").slideToggle(); 
  });

  // autocomplete progress spinner hides on loading page
  $('.spinner').hide();
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

    var fbid = $("#fbid").val();

    return false;
  });


  // fields with color picker
  $('#bgcolor, #titlecolor').spectrum({
    showInitial: true,
    showInput: true,
  });

  $( "#bg1_url" ).autocomplete({
    dataType: "json",
    source: "files.php", 
    minLength: 2,
    search: function(event, ui) { 
      $('.spinner').show();
    },
    open: function(event, ui) {
      $('.spinner').hide();
    }, 
    select: function(event, ui) { 
      $(this).val(ui.item.value);
      $('#featImg').css({"background-image": "url("+ui.item.value+")" });
    }
  }).data( "autocomplete" )._renderItem = function( ul, item ) {
    var imghtml = '';
    imghtml += "<a id="+item.id+">"; 
      imghtml += "<img style='width: 50px; height: 50px;' src='"+item.value+"'>"; 
    imghtml += "</a>";
    return $( "<li></li>" )
      .data( "item.autocomplete", item )
      .append(imghtml)
      .appendTo(ul);
  };


  $("#bookmark").click(function() {
      alert("You will be redirected to a unique URL to bookmark (TODO: make it a short URL)"); // TODO
      $("#addImage").submit(); 
  });

  $("#reset").click(function() {
	  window.location.href = "/featured_image/";
	  return false;
  });

  $("#btnSave").click(function() { 
    $.blockUI({ message: '<h1><img src="i/loader.gif" />Generating image ...</h1>' });

	var ext = ".jpg";
	var imageFileName = $('h1#blogtitle').text().toLowerCase().replace(/[^a-zA-Z0-9]+/g, "-") + ext;

	html2canvas($("#featImg"), {

		"logging": true, //Enable log (use Web Console for get Errors and Warnings)
		allowTaint: true,
		// useCORS: true,

		onrendered: function(canvas) {
			//document.body.appendChild(canvas);

			try {
				// save to file, this method does not let you specify filename:
				// Canvas2Image.saveAsPNG(canvas); 
				// so using easy workaround
				// canvas.toDataURL can crash on external images ("tainted canvas"), even with above allowTaint: true
				// in that case show the generated canvas below for user to manually download
				var a = $("<a>").attr("href", canvas.toDataURL('image/png'))
				.attr("download", imageFileName)
				.appendTo("body");
				a[0].click();
				a.remove();
			}
			catch(err) {
				// Convert and download as image 
				$("#img-out").html(canvas);
				$("#feedback").html("Could not automatically download image, right-click on below image to save");
			}


			$.unblockUI();
		}
	});

  });

})(jQuery);
