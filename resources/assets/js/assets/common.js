import { Filtr } from './filtres/Filtr';

import { dwnldIndexPhoto } from './lib/functions';
import { loadAllComments } from './lib/functions';
import { openModal } from './lib/functions';
import { closeModal } from './lib/functions';
import { slider } from './lib/functions';
import { readComment } from './lib/functions';
import { handleFileOneSelect } from './lib/functions';
import { handleFileSelect } from './lib/functions';
import { confirmModal } from './lib/functions';
import { deleteView } from './lib/functions';
import { addArrowForMoreInfo } from './lib/functions';
import { showUserInfoMore } from './lib/functions';

import { deleteLink } from './lib/link';
import { save } from './lib/link';

import { like } from './lib/user_activity';
import { liked } from './lib/user_activity';
import { changeIcoPretense } from './lib/user_activity';
import { sendPretense } from './lib/user_activity';
import { allPhotoLikes } from './lib/user_activity';

import { commonValid } from './lib/validation';
import { validateBack } from './lib/validation';

import { addTag } from './lib/tags_functions';
import { hiddenTagMask } from './lib/tags_functions';
import { renderPhoto } from './lib/tags_functions';
import { esc } from './lib/tags_functions';
import { moveTagMask } from './lib/tags_functions';
import { enter } from './lib/tags_functions';
import { renderTagsMask } from './lib/tags_functions';
import { form } from './lib/tags_functions';

import { mainSliderPhoto } from './lib/main_slider';

import { commentAdd } from './lib/functions';
import { deleteComment } from './lib/functions';
import { getAllComments } from './lib/functions';

(function(){
    $('.comment-add-form').on('submit', commentAdd);
    $('.remove-comment').on('click', deleteComment);
    $('.btn-all-comments-news').on('click', getAllComments);
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

  $('.deleteSome').on('click', deleteView);
  var id = 1;

  $('#file').on('change', handleFileOneSelect);
  $('#files').on('change', handleFileSelect);

})();

// Подтверждение удаления
(function() {

 $().on('click', confirmModal);

})();


// Чтение комментария в админке
(function() {

  $().on('click', readComment);

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
       slider('active-slide-zoom-views', 'left-slide-zoom-views', 'right-slide-zoom-views', 'item-views-zoom')
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
})();


// Подгрузить все комментарии <--- !!! работает
(function() {

  $('.btn-all-comments').on('click', function () {
    loadAllComments(this);
  });

})();


// Инициализация кнопки для показа полной информации о пользователе <----! Работает
(function() {

  addArrowForMoreInfo();
  $('.to-bottom').on('click', showUserInfoMore);

})();

// попапы новостей <--- !!! работает
(function() {

  $('.item-news-title').on('click', function(){
    $('.'+$(this).attr('rel')).fadeIn();
  });

})();


// активность пользователя
(function() {

  $('.like button').on('click', like);
  $('.liked button').on('click', liked);
  $('#pretense-file').on('change', changeIcoPretense);
  $('#formPretense').on('submit', sendPretense);
  // $('p.asd').on('click', allPhotoLikes);

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


(function() {

  $('#feedback').children().on('click', function () {
    $(this).removeClass('error');
  });

})();

// <--- !!! работает
(function() {

  $( document ).ready(function () {
    $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.823});
    $(window).resize(function() {
      $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.823});
    });
  });

})();



// <--- !!! работает
(function() {

  $('#current-position, #current-position-zoom').text($('.active-slide').index() + 1);

})();

// делегирование

(function() {

  // var filtr = new Filtr;
  //
  // table.onclick = function(event) {
  //   var target = event.target; // где был клик?
  //
  //   if (target.tagName != 'TD') return; // не на TD? тогда не интересует
  //
  //   highlight(target); // подсветить TD
  // };

})();
