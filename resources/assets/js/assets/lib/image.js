export function handleFileOneSelect(evt) {
    $('#main-wrap-photo span img').parent('span').remove();
    let files = evt.target.files; // FileList object
    for (let i = 0, f; f = files[i]; i++) {
        if (!f.type.match('image.*')) {
            continue;
        }

        let reader = new FileReader();

        reader.onload = (function(theFile) {
            return function(e) {
                let span = document.createElement('span');
                span.innerHTML = [
                    '<img class="img-full-width" src="',
                    e.target.result,
                    '" title="',
                    escape(theFile.name),
                    '"/>'
                ].join('');
                document.getElementById('main-wrap-photo').insertBefore(span, null);
            };
        })(f);

        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
    }
    $('#main-wrap-photo').children('.add-photo-ico').css({'display': 'none'});
    $('#main-wrap-photo').children('.add-photo-text').css({'display': 'none'});
}

export function userAvaChange(evt) {
    let files = evt.target.files;

    for (var i = 0, f; f = files[i]; i++) {

        if (!f.type.match('image.*')) {
            continue;
        }

        let reader = new FileReader();

        reader.onload = (function(theFile) {
            return function(e) {
                $('#photo-person img').attr('src', e.target.result);
            };
        })(f);
        reader.readAsDataURL(f);
    }
}

export function handleFileSelect(evt) {
    let files = evt.target.files;

    for (let i = 0, f; f = files[i]; i++) {
        if (!f.type.match('image.*')) {
            continue;
        }

        var reader = new FileReader();
        reader.onload = (function(theFile) {
            return function(e) {
                let id = Math.random() * (100000 - 1) + 1;
                $('#files').attr('id', id).attr('style', 'display:none;');
                let client = `<li data-id="${id}" class="racurs-list-item uk-margin-bottom uk-margin-top uk-padding-remove">
                                <div class="uk-overlay uk-width-1-1">
                                    <img src="${e.target.result}">
                                    <div class="uk-overlay-area">
                                        <div class="uk-overlay-area-content">
                                            <span class="fz-big">×</span>
                                        </div>
                                    </div>
                                </div>
                              </li>`;
                $('.uk-list').append(client);

                $('.racurs-list-item').on('click', function() {
                    document.getElementById($(this).data('id')).remove();
                    $(this).remove();
                });

                $('<input id="files" class="input-dwnld-view-photo" type="file" name="views[]">').appendTo('.wrap-dwnld-photo');

                $('#files').on('change', handleFileSelect);
            };
        })(f);

        reader.readAsDataURL(f);
    }
}