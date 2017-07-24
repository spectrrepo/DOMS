/**
 *
 */
export function openPopupSubCat () {
    $(this).children('.sidebar-modal').toggle();
}

/**
 *
 */
export function addChooseIco () {
    $(this).children('.choose-ico').toggle();
}

/**
 *
 * @param dataType
 * @param subCatId
 */
export function addSubCat (dataType, subCatId) {
    $(`[data-type=${dataType}]`).find('jdshf').append();
}

/**
 *
 */
export function closePopupSubCat () {
    $(this).parent().fadeOut();
    $(this).parent().prev().removeClass('click-ready-active');
}

export function addActiveCat () {
    $(this).addClass('click-ready-active');
}

/**
 *
 * @param nameCat
 * @returns {boolean}
 */
export function checkMaxNumSubCat (nameCat) {
    let maxNum = $(this).closest(nameCat).data('max');
    let currentNum = $(nameCat).next().children().length;

    if (maxNum > currentNum) {
        return true;
    } else {
        return false;
    }
}

/**
 *
 * @param data
 * @param colorView
 * @returns {string}
 */
export function subCatView (data, colorView = false) {
    if (colorView === true) {
        return `<li class="choose-sort-item choose-sort-item-color">
                    <span class="name-sort-item color-sort-item" style="${data.hash}">${data.title}</span>
                    <i class="close-sort-item">×</i>
                </li>`;
    } else {
        return `<li class="choose-sort-item">
                    <span class="name-sort-item">${data.title}</span>
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
 * @param color
 * @param placements
 * @param style
 * @param tag
 */
export function setUrl (currentId = null, color = null, placements = null, style = null, tag = null) {
    let rule = getUrlParams();
    let host = window.location.origin;
    let urlWithoutRule, url;

    if (currentId !== null) {
        urlWithoutRule = host + '/gallery/' + currentId + '/rule=';
    } else {
        urlWithoutRule = host + '/rule=';
    }

    if (color !== null) {
        rule.color = color;
    }

    if (placements !== null) {
        rule.placements = placements;
    }

    if (style !== null) {
        rule.style = style;
    }

    if (tag !== null) {
        rule.tag = tag;
    }

    url = urlWithoutRule + JSON.stringify(rule);
    history.pushState(null, null, url);
}

export function writeNewSortRule () {

}

export function deleteSubCat () {

}

/**
 *
 * @param item
 * @returns {string}
 */
export function itemGalleryView (item) {
    return `<a data-id="${item}" href="/gallery/6/rule=" class="item-gallery" data-grid-prepared="true" style="position: absolute;">
                <div class="uk-panel-box">
                    <img src="${item}">
                </div>
            </a>`;
}

export function tagAdd () {

}

export function tagActiveAdd () {

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

