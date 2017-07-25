// ============================================================================
// =============== file with functions, which use in app ======================
// ============================================================================
import { DWNLD_MAIN_PHOTO } from '../lib/constant';
import { URL_READ_COM } from '../lib/constant';
import { URL_DELETE_VIEWS } from '../lib/constant';
import { getUrlParams } from './slider/common';

export function loadMorePostsGallery () {
    let action = 'next',
        id = $('a.item-gallery').length;

    $.ajax({
        type: 'POST',
        data: {
          'json' :  JSON.stringify(getUrlParams()),
          'action' : action,
          'id' : id,
          '_token' : $('meta[name=_token]').attr('content')
        },
        url: '/posts/loadGallery',

        success: renderMorePostsGallery
    });
}

export function renderMorePostsGallery (data) {
    for (let i = 0; i < data.length; i++) {
        let newElement = `<a data-id="${data[i]}" href='/gallery/6/rule=${JSON.stringify(getUrlParams())}' class="item-gallery" data-grid-prepared="true" style="position: absolute;">
                                       <div class="uk-panel-box">
                                           <img src="${data[i]}">
                                       </div>
                                  </a>`;
        $('#pole').append(newElement);
    }
}
