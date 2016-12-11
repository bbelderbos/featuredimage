function theme_autocomplete(){
  $( "#bg1_url" ).autocomplete({
    dataType: "json",
    source: "files.php?theme=" + $("#collection option:selected").val(),
    minLength: 0,
    search: function(event, ui) { 
      $('.spinner').show();
    },
    open: function(event, ui) {
      $('.spinner').hide();
    }, 
    select: function(event, ui) { 
      event.preventDefault();
      $(this).val(ui.item.full);
      $('#featImg').css({"background-image": "url("+ui.item.full+")" });
    }
  }).focus(function() { // show all upon focus of ac field
    $(this).autocomplete('search', $(this).val())
  }).data( "autocomplete" )._renderItem = function( ul, item ) {
    var imghtml = '';
    imghtml += "<a id="+item.full+">"; 
      imghtml += "<img src='"+item.thumb+"'>"; 
    imghtml += "</a>";
    return $( "<li></li>" )
      .data( "item.autocomplete", item )
      .append(imghtml)
      .appendTo(ul);
  };
}


(function($){

  // use diff bg images
  var cover_url = $("#coverImg").text();

  $('body').css({"background-image": "url("+cover_url+")" });

  // autofocus fields upon select
  $("input:text").focus(function() { $(this).select(); } );

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
    $('#featImg').css({"background-image": "url("+bg1_url+")" });

    var bg1_pos = $("#bg1_pos option:selected").val();
    $('#featImg').css({"background-position": bg1_pos });

    var bg1_size = $("#bg1_size option:selected").val();
    $('#featImg').css({"background-size": bg1_size+"%" });

    var overlay_url = $("#overlay_url").val();
    $('#overlay').css({"background": "url("+overlay_url+")" });

    var overlay_pos = $("#overlay_pos option:selected").val();
    $('#overlay').css({"background-position": overlay_pos });

    var overlay_size = $("#overlay_size option:selected").val();
    $('#overlay').css({"background-size": overlay_size+"%" });

    var overlay_repeat = $("#overlay_repeat option:selected").val();
    $('#overlay').css({"background-repeat": overlay_repeat });

    var overlay_opacity = $("#overlay_opacity option:selected").val();
    $('#overlay').css({"opacity": overlay_opacity });
  
    return false;
  });


  // fields with color picker
  $('#bgcolor, #titlecolor').spectrum({
    showInitial: true,
    showInput: true,
  });

  // not most elegant, but need the auto-complete dynamically pick collection type
  theme_autocomplete();
  $('#collection').on('change', function(e) {
    theme_autocomplete();
  });


  $("#bookmark").click(function() {
      $("#addImage").submit(); 
  });

  $("#reset").click(function() {
	  window.location.href = "/featured_image/";
	  return false;
  });

  $("#setDimensions").submit(function(event){
	var r = confirm("This will reset the canvas, you sure you want to continue?")
	if (r !== true) {
	  return false;
	} 
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
				$("#feedback").html("Image with external links ('tainted'), could not automatically download, click+save copy below");
			}

			$.unblockUI();
		}
	});

  });

})(jQuery);
