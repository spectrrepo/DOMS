$( document ).ready(function() {
  var id = 1;
// TODO:переделать в одну единственную функцию или класс
  function handleFileOneSelect(evt) {
      $('#main-wrap-photo span img').parent('span').remove();
      var files = evt.target.files; // FileList object
      console.log(evt.target.files);
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
        console.log(files[i]);
        var reader = new FileReader();

        // Closure to capture the file information.
        reader.onload = (function(theFile) {
          return function(e) {
            // Render thumbnail.
            var span = document.createElement('span');
            span.id = id;
            span.className = 'deleteSome';
            span.innerHTML = ['<img class="thumb" src="', e.target.result,
                              '" title="', escape(theFile.name), '"/>'+
                              '<span class="b-hover-add-view">'+
                              '<span class="uk-icon-justify uk-icon-remove vertical-align">'+
                              '</span>'].join('');
            document.getElementById('wrap-d').insertBefore(span, null);
            var lastInp = $('#files').clone().appendTo('#wrap-d');
            lastInp.removeClass('input-dwnld-view-photo')
                   .addClass('new')
                   .css({'display':'none'})
                   .attr('name', 'files[]')
                   .attr('id', id);

            id += 1;
            $('.deleteSome').on('click', function () {
                $(this).remove();
                $('[id = '+$(this).attr("id")+'][class = new]').remove();
            });
          };
        })(f);
        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
      }
    }

    $('#files').on('change', handleFileSelect);
});
