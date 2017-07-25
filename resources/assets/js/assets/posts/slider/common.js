/**
 *
 */
export function openPopupSubCat () {
    $('.click-ready').next('.sidebar-modal').not(this).fadeOut();
    $('.click-ready').not(this).removeClass('click-ready-active');
    $(this).next('.sidebar-modal').toggle();
    $(this).toggleClass('click-ready-active');
}

/**
 *
 */
export function addChooseIco () {
    let nameCat = $(this).closest('.sidebar-modal').parent().attr('id');
    let dataId = $(this).data('id');
    let dataVal = $(this).data('val');
    let self = this;
    let colorView = false;
    let currentId = $('.active-slide').data('id');

    if ($(this).hasClass('colors-space-item')){
        colorView = true;
    }
    $(this).children('.choose-ico').toggleClass('active-choose-ico');

    if (checkMaxNumSubCat(nameCat, self)) {
        addSubCat(nameCat, dataId, dataVal, colorView);
        $('.subcat-list').children('[data-id='+dataId+']').on('click', function (){subCatRemove(dataId);});
    } else {
        let deleteId = $('#'+nameCat).children('.subcat-list').children().last().data('id');
        $('#'+nameCat).children('.subcat-list').children().last().remove();
        $('#'+nameCat).children('.sidebar-modal').find('[data-id='+deleteId+']').children('.choose-ico').removeClass('active-choose-ico');
        addSubCat(nameCat, dataId, dataVal, colorView);
        $('.subcat-list').children('[data-id='+dataId+']').on('click', function (){subCatRemove(dataId);});
    }
    if (currentId === undefined) {
        currentId = null;
    }

    rewriteUrl(currentId);
    loadGallery();
}

/**
 *
 * @param dataType
 * @param subCatId
 * @param subCatValue
 * @param colorView
 */
export function addSubCat (dataType, subCatId, subCatValue, colorView = false) {
    $(`#${dataType}`).find('.subcat-list').prepend(subCatView(subCatId, subCatValue, colorView));
}

/**
 *
 * @param dataId
 */
export function subCatRemove (dataId) {
    let currentId = $('.active-slide').data('id');
    if (currentId === undefined) {
        currentId = null;
    }
    $('.subcat-list').find('[data-id='+dataId+']').remove();
    $('.sidebar-modal').find('[data-id='+dataId+']').children('.choose-ico').removeClass('active-choose-ico');
    rewriteUrl(currentId);
    loadGallery();
}

export function subCatRemoveCurrent () {
    let currentId = $('.active-slide').data('id');
    if (currentId === undefined) {
        currentId = null;
    }
    let id = $(this).data('id');
    $(this).remove();
    $('.sidebar-modal').find('[data-id='+id+']').children('.choose-ico').removeClass('active-choose-ico');
    rewriteUrl(currentId);
    loadGallery();
}

/**
 *
 * @returns {{color: (*|jQuery), placements: Array, style: Array, sort: (*|jQuery), tag: (string|*|jQuery)}}
 */
export function currentFiltr () {
    let places = [];
    $('#placements').children('.subcat-list').children().each(
        function (i,elem) {
            places.push($(elem).data('id'));
        });
    let placements = places;
    if (placements.length === 0) {
        placements = [0];
    }

    let styles = [];
    $('#styles').children('.subcat-list').children().each(
        function(i,elem) {
            styles.push($(elem).data('id'));
        });
    let style = styles;
    if (style.length === 0) {
        style = [0];
    }

    let color = $('#colors').children('.subcat-list').children('.choose-sort-item').data('id');
    if (color === undefined) {
        color = 0;
    }

    let sort = $('#orders').children('.subcat-list').children('.choose-sort-item').data('id');
    if (sort === undefined) {
        sort = "0";
    }

    let tag = $('#hide-pole-tag').children('.tag-item').text().substring(1, $('#hide-pole-tag').children('.tag-item').text().length);
    if (tag === undefined) {
        tag = "0";
    }
    return {
        'color' : color,
        'placements' : placements,
        'style' : style,
        'sort' : sort,
        'tag' : tag
    };
}

/**
 *
 */
export function closePopupSubCat () {
    $(this).parent().fadeOut();
    $(this).parent().prev().removeClass('click-ready-active');
}

/**
 *
 * @param nameCat
 * @returns {boolean}
 */
export function checkMaxNumSubCat (nameCat, self) {
    let maxNum = $(self).parent().parent().data('max');
    let currentNum = $('#'+nameCat).children('.subcat-list').children().length;

    if (maxNum > currentNum) {
        return true;
    } else {
        return false;
    }
}

/**
 *
 * @param dataId
 * @param dataValue
 * @param colorView
 * @returns {string}
 */
export function subCatView (dataId, dataValue, colorView = false) {
    if (colorView === true) {
        return `<li class="choose-sort-item choose-sort-item-color" data-id="${dataId}">
                    <span class="name-sort-item color-sort-item" style="background: ${dataValue}"></span>
                    <i class="close-sort-item">×</i>
                </li>`;
    } else {
        return `<li class="choose-sort-item" data-id="${dataId}">
                    <span class="name-sort-item">${dataValue}</span>
                    <i class="close-sort-item">×</i>
                </li>`;
    }

}
/**
 *
 * @returns {*}
 */
export function getUrlParams () {
    let relativePath = window.location.pathname;
    let dampJson, ruleSort;
    dampJson = relativePath.substring(relativePath.indexOf('=')+1);
    ruleSort = JSON.parse(dampJson.replace(/%22/g, '"').replace('%7B', '{').replace('%7D', '}'));
    return ruleSort;
}

/**
 *
 * @param currentId
 * @returns {{url: *, rule: *}}
 */
export function setUrl (currentId = null) {
    let rule = getUrlParams();
    let host = window.location.origin;
    let urlWithoutRule, url;
    let filter = currentFiltr();

    if (currentId !== null) {
        urlWithoutRule = host + '/gallery/' + currentId + '/rule=';
    } else {
        urlWithoutRule = host + '/rule=';
    }

    rule.color = filter.color;
    rule.placements = filter.placements;
    rule.sort = filter.sort;
    rule.style = filter.style;
    rule.tag = filter.tag;

    url = urlWithoutRule + JSON.stringify(rule);
    return {'url': url, 'rule' : rule};
}

/**
 *
 * @param currentId
 */
export function rewriteUrl (currentId = null) {

    let url = setUrl(currentId)['url'];
    let rule = setUrl(currentId)['rule'];
    if (currentId !== null) {
        $('.logo').attr('href', url);
    }
    __JSON_FILTER_GALLERY = rule;
    history.pushState(null, null, url);
}

/**
 *
 * @param item
 * @returns {string}
 */
export function itemGalleryView (item) {
    return `<a data-id="${item.id}" href='/gallery/6/rule=${JSON.stringify(getUrlParams())}' class="item-gallery" data-grid-prepared="true" style="position: absolute;">
                <div class="uk-panel-box">
                    <img src="${item.img_middle}">
                </div>
            </a>`;
}

/**
 *
 * @param direction
 * @param data
 * @returns {string}
 */
export function itemSliderView (direction, data) {
    let position;
    if (direction === 'left') {
        position = 'left-slide';
    } else if (direction === 'right') {
        position = 'right-slide';
    }
    return `<div class="photo-item ${position}" data-id="${data}">
                <img class="img-slider" src="${data}">
            </div>`;
}

/**
 *
 * @param direction
 * @param data
 * @returns {string}
 */
export function itemRacourseView (direction, data) {
    let position;

    if (direction === 'active') {
        position = 'left-view-min';
    } else if (direction === 'left') {
        position = 'left-view-min';
    } else if (direction === 'right') {
        position = 'left-view-min';
    }

    return `<div class="item-view-min ${position}">
                <img src="${data}">
            </div>`;
}

/**
 *
 * @param data
 * @returns {string}
 */
export function commentView (data) {
    return `<div class="b-comment-wrap uk-clearfix">
                <span class="remove-comment uk-icon-justify uk-icon-remove"><span class="delete_comment_id" data-id="39"></span></span>
                <a href="http://127.0.0.1:8000/user/2" class="b-photo-comment">
            <img src="/storage/user/mini/2a/53/2a538e54b334127eb35f9bac586d0fbd.jpg">
        </a>
        <div class="b-comment">
            <a href="http://127.0.0.1:8000/user/2" class="b-name-comment">
                Георгий
            </a>
            <div class="b-text-comment">
                dfsdfs
            </div>
            <div class="b-date-comment">
                21 Июль 2017 г. 13:41
            </div>
        </div>
    </div>`;
}

/**
 *
 * @param name
 * @param visibility
 */
export function toggleBlockDescrImage (name, visibility) {
    if (visibility === 'visible') {
        $(name).fadeIn();
    } else {
        $(name).fadeOut();
    }
}

/**
 *
 * @param data
 * @returns {string}
 */
export function tagView (data) {
    return `<div class="tag-item">${data}</div>`;
}

/**
 *
 * @param data
 */
export function renderGallery (data) {
    $('#pole').empty();
    for (let i = 0; i < data.length; i++) {
        $('#pole').append(itemGalleryView(data[i]));
    }
}

export function loadGallery () {
    let action = 'sort';

    $.ajax({
        type: 'POST',
        data: {
            'json' :  JSON.stringify(getUrlParams()),
            'action' : action,
            '_token' : $('meta[name=_token]').attr('content')
        },
        url: '/posts/loadGallery',

        success: renderGallery
    });
}
/**
 *
 * @param data
 */
export function renderSlider (data) {

}

/**
 *
 * @param direction
 */
export function changeActiveSlide (direction) {
    if (direction === 'left') {
        $('.active-slide').prev().addClass('active-slide');
        $('.active-slide')[1].removeClass('active-slide');
    } else {
        $('.active-slide').next().addClass('active-slide');
        $('.active-slide')[0].removeClass('active-slide');
    }
}


export function tagAdd () {

}

export function tagActiveAdd () {

}

export function notFoundedView () {
    return `<div class="info-text-message">По вышему запросу ничего не найдено</div>`;
}