// ============================================================================
// =============== file with functions, which use in app ======================
// ============================================================================
import { DWNLD_MAIN_PHOTO } from './constant';
import { URL_READ_COM } from './constant';
import { URL_DELETE_VIEWS } from './constant';

export function loadMorePostsGallery () {
    let action = 'next',
        id = $('a.item-gallery').length;

    $.ajax({
        type: 'POST',
        data: {
          'json' :  JSON.stringify(__JSON_FILTER_GALLERY),
          'action' : action,
          'id' : id,
          '_token' : $('meta[name=_token]').attr('content')
        },
        url: '/posts/loadGallery',

        success: function (data) {
            for (let i = 0; i < data.length; i++) {
                let newElement = `<a data-id="${data[i]}" href="/gallery/6/rule=" class="item-gallery" data-grid-prepared="true" style="position: absolute;">
                                       <div class="uk-panel-box">
                                           <img src="${data[i]}">
                                       </div>
                                  </a>`;
                $('#pole').append(newElement);
            }
        }
    });
}

