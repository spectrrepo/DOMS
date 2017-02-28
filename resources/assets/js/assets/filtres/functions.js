// ============================================================================
// =============== file with functions, which use in app ======================
// ============================================================================

/**
 * [photoID description]
 * @return {[type]} [description]
 */
function photoID () {
  return $('.active-slide').data('id');
}

/**
 * [csrftoken description]
 * @return {[type]} [description]
 */
function csrftoken () {
  return $('meta[name=_token]').attr('content');
}

/**
 * [user_id description]
 * @return {[type]} [description]
 */
function user_id () {
  return $('input[name=user_id]').val();
}

/**
 * [authID description]
 * @return {[type]} [description]
 */
function authID () {
  return $('meta[name=authID]').attr('content');
}

/**
 * [dwnldIndexPhoto description]
 * @param  {[type]} sortSorting  [description]
 * @param  {[type]} styleSorting [description]
 * @param  {[type]} roomSorting  [description]
 * @param  {[type]} colorSorting [description]
 * @param  {[type]} tagSorting   [description]
 * @return {[type]}              [description]
 */
function dwnldIndexPhoto(sortSorting, styleSorting, roomSorting, colorSorting, tagSorting) {
  var lastIdJS = $('#pole').children('.item-gallery:last-child').index();
  $.ajax({
      type:'POST',
      data: {
              'lastId': lastIdJS,
              '_token': csrftoken,
              'sortSorting': sortSorting,
              'styleSorting': styleSorting,
              'roomSorting': roomSorting,
              'colorSorting': colorSorting,
              'tag': tagSorting
      },
      url:'/pagination_index',

      success: function (data) {
        for(var i=0; i<data.length; i++) {
              $('<a href="/photo/id=['+data[i].id+
                  '],room=['+roomSorting+
                  '],styles=['+styleSorting+
                  '],colors=['+colorSorting+
                  '],sort=['+sortSorting+
                  '],tag=['+tagSorting+']" class="item-gallery" '+
                  'data-grid-prepared="true"style="position:absolute;">' +
                  '<div class="uk-panel-box">' +
                    '<img src="'+data[i].min_path+'">'+
                   '</div>' +
                 '</a>').appendTo('.uk-grid-width-small-1-2');
        }
      }
  });
}

/**
 * [openModalDescription description]
 * @return {[type]} [description]
 */
function openModalDescription () {
  $('.description-scroll-place').empty();
  $('<h3 class="title-description-popup"></h3>')
                .appendTo('.description-scroll-place')
                .text($(this).text());
  $('<p></p>').appendTo('.description-scroll-place')
              .text($('#description-pole p').text());
  $('#modalDescriptionFull').fadeIn();
}

/**
 * [loadAllPhoto description]
 * @param  {[type]} btn [description]
 * @return {[type]}     [description]
 */
function loadAllPhoto(btn) {
  $(btn).on('click', function() {
    $('.b-comment-wrap').fadeIn();
    $(btn).fadeOut();
  });
}

/**
 * [openModalView description]
 * @param  {[type]} el [description]
 * @return {[type]}    [description]
 */
function openModal(el) {
    $('.overlay').fadeOut();
    $(el).fadeIn();
}

/**
 * [closeDescriptionModal description]
 * @return {[type]} [description]
 */
function closeModal (el) {
    $(el).fadeOut();
}

function slider (activeEl, leftEl, rightEl, el) {
  if ($(this).data('direction') === 'prev') {
      if ($(el+':first').hasClass(activeEl)) {
            $(el+':not('+el+':last)').addClass(leftEl).removeClass(activeEl)
                                                      .removeClass(rightEl);
            $(el+':last').addClass(activeEl).removeClass(rightEl);
        } else {
            $(activeEl).prev().addClass(activeEl).removeClass(leftEl);
            $(activeEl+':last').removeClass(activeEl).addClass(rightEl);
        }
    } else {
        if ($(el+':last').hasClass(activeEl)) {
            $(el+':not('+el+'first)').addClass(rightEl).removeClass(activeEl)
                                                       .removeClass(leftEl);
            $(el+':first').addClass(activeEl).removeClass(leftEl);
        } else {
            $(activeEl).next().addClass(activeEl).removeClass(rightEl);
            $(activeEl+':first').removeClass(activeEl).addClass(leftEl);
        }
    }
}
