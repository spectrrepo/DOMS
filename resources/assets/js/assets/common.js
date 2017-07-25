import { openModal } from './lib/common';
import { closeModal } from './lib/common';
import { slider } from './lib/common';
import { addArrowForMoreInfo } from './lib/common';
import { showUserInfoMore } from './lib/common';
import { deleteView } from './lib/common';

import { handleFileOneSelect } from './lib/image';
import { handleFileSelect } from './lib/image';
import { userAvaChange } from './lib/image';

import { deleteLink } from './lib/link';
import { save } from './lib/link';

import { like } from './lib/user_activity';
import { liked } from './lib/user_activity';
import { changeIcoPretense } from './lib/user_activity';
import { sendPretense } from './lib/user_activity';
import { allPhotoLikes } from './lib/user_activity';

import { commonValid } from './lib/validation';
import { validateBack } from './lib/validation';

import { addTag } from './lib/tags';
import { deleteTag } from './lib/tags';
import { hiddenTagMask } from './lib/tags';
import { renderPhoto } from './lib/tags';
import { esc } from './lib/tags';
import { moveTagMask } from './lib/tags';
import { enter } from './lib/tags';
import { renderTagsMask } from './lib/tags';
import { form } from './lib/tags';

import { mainSliderPhoto } from './main_slider';

import { commentAdd } from './lib/comments';
import { deleteComment } from './lib/comments';
import { getAllComments } from './lib/comments';
import { getAllCommentsForNews } from './lib/comments';

import { loadMorePostsGallery } from './posts/functions';
import { confirmModal } from './lib/common';
import { uploadMoreNews } from './lib/tpl';

import { openPopupSubCat } from './posts/slider/common';
import { addChooseIco } from './posts/slider/common';
import { closePopupSubCat } from './posts/slider/common';
import { subCatRemoveCurrent } from './posts/slider/common';

(function(){
    $('.click-ready').on('click', openPopupSubCat);
    $('.item-moodal-sidebar').on('click', addChooseIco);
    $('.sidebar-modal .close').on('click', closePopupSubCat);
    $('.choose-sort-item').on('click', subCatRemoveCurrent);
})();

(function(){
    $('.comment-add-form').on('submit', commentAdd);
    $('.remove-comment').on('click', deleteComment);
    $('#postCommentUpload').on('click', getAllComments);
    $('.news-upload-comments').on('click', getAllCommentsForNews);
})();

// инициализация главного слайдера
(function() {

  $('.btn-nav').on('click', mainSliderPhoto);
  $('.nav-zoom').on('click', mainSliderPhoto);

})();

// работа с тегами
(function() {

  $('.btn-add-tag').on('click', addTag);
    $('.input-tag-name').keydown(function(e){
            if(e.keyCode==13)
        {
            addTag();
            return false;
        }
    });
  $('.as').on('click', hiddenTagMask);
  $('.as').on('click', renderPhoto);
  $('.as').on('click', esc);
  $('.as').on('click', moveTagMask);
  $('.as').on('click', enter);
  $('.as').on('click', renderTagsMask);
  $('.as').on('click', form);

})();

// форма добавления фото
(function() {

  $('.delete-racourse').on('click', deleteView);
  $('.delete-tag').on('click', deleteTag);

  $('#file').on('change', handleFileOneSelect);
  $('#files').on('change', handleFileSelect);
  $('#change-user-ava').on('change', userAvaChange);

})();

// Подтверждение удаления
(function() {

 $().on('click', confirmModal);

})();

// инициализация слайдеров <--- !!! работает
(function() {

     $('.nav-slide-about').on('click', function () {
         slider('active-about', 'left-about', 'right-about', 'item');
     });

     $('.min-nav-views').on('click', function () {
       slider('active-view-min', 'left-view-min', 'right-view-min', 'item-view-min');
     });

     $('.nav-zoom-views').on('click', function () {
       slider('active-slide-zoom-views', 'left-slide-zoom-views', 'right-slide-zoom-views', 'item-views-zoom');
     });

    $('.nav-zoom-views').on('click', function () {
        slider('active-cicle', 'left-cicle', 'right-cicle', 'nav-cicle');
    });
})();


// прослушка кнопок закрытия попапов <--- !!! работает
(function() {

  $('.modalDescriptionFull').on('click', function () {
    closeModal('#modalDescriptionFull')
  });

  $('#close-modal-law').on('click', function(){
    closeModal('#modalLaw')
  });

  $('.popup-close-news').on('click', function() {
    closeModal('.modal-news')
  });

  $('#closeLink').on('click',function () {
    closeModal('#dialogLinkAdd')
  });

  $('.popup-close').on('click', function () {
    closeModal('.overlay')
  });

  $('#close-modal-likes').on('click', function () {
    closeModal('#allPhotoLikes')
  });

  $('#close-modal-views').on('click', function () {
    closeModal('#modalViewsZoom')
  });

  $('.popup-error-close').on('click', function () {
    closeModal('#popup-error-slider')
  });

  $('.slider-close').on('click', function () {
    closeModal('#zoom-slider')
  });

  $('#close-modal-description').on('click', function () {
    closeModal('#modalDescriptionFull')
  });

})();


// прослушка кнопок открытия попапов <--- !!! работает
(function() {

  $('.full-scrn').on('click', function () {
    openModal('#zoom-slider');
  });
  $('.b-pretense').on('click', function () {
    openModal('#modalLaw');
  });
  $('#foot-about').on('click', function () {
    openModal('#popup-about');
  });
  $('#foot-feedback').on('click', function () {
    openModal('#popup-feedback');
  });
  $('.login').on('click', function () {
    openModal('#login-popup');
  });
  $('#registration').on('click', function () {
    openModal('#popup-registr');
  });
  $('#recover-pswd').on('click', function () {
    openModal('#passwd-popup');
  });
  $('.item-view-min').on('click', function () {
    openModal('#modalViewsZoom');
  });

  $('#description-pole h3').on('click', function () {
    openModal('#modalDescriptionFull');
  });

  $('.item-news-title').on('click', function(){
    $('.'+$(this).attr('rel')).fadeIn();
  });
})();

// Инициализация кнопки для показа полной информации о пользователе <----! Работает
(function() {

  addArrowForMoreInfo();
  $('.to-bottom').on('click', showUserInfoMore);

})();

// активность пользователя
(function() {

  $('.like button').on('click', like);
  $('.liked button').on('click', liked);
  $('#pretense-file').on('change', changeIcoPretense);
  $('#formPretense').on('submit', sendPretense);
  $('#allLikesPost').on('click', allPhotoLikes);

})();

// валидация форм
(function() {

   $().on('submit', function(){
    commonValid('text', 'form')
   });
   $().on('submit', function(){
    commonValid('text', 'form')
   });
   $().on('submit', function(){
    commonValid('text', 'form')
   });
   $('#feedback').on('submit', validateBack);

})();

// <--- !!! работает
(function() {
  $('#feedback').children().on('click', function () {
    $(this).removeClass('error');
  });

  $('#current-position, #current-position-zoom').text($('.active-slide').index() + 1);

  $( document ).ready(function () {
    $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.85});
    $('.news-main-page').height(document.body.scrollHeight*0.83);
    $(window).resize(function() {
      $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.85});
      $('.news-main-page').height(document.body.scrollHeight*0.83);
    });
  });

})();

(function() {
    $('.b-next-page').on('click', loadMorePostsGallery);
})();

(function() {
    $('.open-modal-link').on('click', function() {
        if ($(this).data('action') === 'addLinks') {
            $('h3.title-form').empty().text('Добавить ссылку');
            $('.mini-modal-submit').removeClass('uk-icon-save').addClass('uk-icon-plus');
            $('.links-control').removeAttr('id').attr('id', 'add-link-form');
            addLink ();
        }
        else if ($(this).data('action') === 'editLinks'){
            $('.links-control').removeAttr('id').attr('id', 'save-link-form');
            $('input[name=old_link]').val($(this).children('input.soc-set-edit').val());
            $('input[name=link]').val($(this).children('input.soc-set-edit').val())
            $('#save-link-form').attr('data-id', $(this).data('id'));
            $('h3.title-form').empty().append(textPopupLink($(this).children().val()));
            $('.mini-modal-submit').removeClass('uk-icon-plus').addClass('uk-icon-save')

            deleteLink();
            save();
            openModalLink();
        }
        $('#dialogLinkAdd').fadeIn();
    });
})();

(function() {
   $('.btn-dwnld-new').on('click', uploadMoreNews);
})();