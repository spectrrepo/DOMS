$( document ).ready(function() {
  function handleFileOneSelect(evt) {
      var files = evt.target.files; // FileList object

      // Loop through the FileList and render image files as thumbnails.
      for (var i = 0, f; f = files[i]; i++) {

        // Only process image files.
        if (!f.type.match('image.*')) {
          continue;
        }

        var reader = new FileReader();

        // Closure to capture the file information.
        reader.onload = (function(theFile) {
          return function(e) {
            // Render thumbnail.
            var span = document.createElement('span');
            span.innerHTML = ['<img class="img-full-width" src="', e.target.result,
                              '" title="', escape(theFile.name), '"/>'].join('');
            document.getElementById('main-wrap-photo').insertBefore(span, null);
          };
        })(f);

        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
      }
      $('#main-wrap-photo').children('.add-photo-ico').css({'display' : 'none'});
      $('#main-wrap-photo').children('.add-photo-text').css({'display' : 'none'});
    }

    document.getElementById('file').addEventListener('change', handleFileOneSelect, false);

// function for download views
  function handleFileSelect(evt) {
      var files = evt.target.files; // FileList object

      // Loop through the FileList and render image files as thumbnails.
      for (var i = 0, f; f = files[i]; i++) {

        // Only process image files.
        if (!f.type.match('image.*')) {
          continue;
        }

        var reader = new FileReader();

        // Closure to capture the file information.
        reader.onload = (function(theFile) {
          return function(e) {
            // Render thumbnail.
            var span = document.createElement('span');
            span.innerHTML = ['<img class="thumb" src="', e.target.result,
                              '" title="', escape(theFile.name), '"/>'].join('');
            document.getElementById('wrap-d').insertBefore(span, null);
          };
        })(f);

        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
      }
    }

    document.getElementById('files').addEventListener('change', handleFileSelect, false);
    
});
