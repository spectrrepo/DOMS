import { $, Jquery } from '../vendor/jquery.min';

import { Filtr } from './filtres/Filtr';

import { dwnldIndexPhoto } from './lib/functions';
import { openModalDescription } from './lib/functions';
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

// инициализация главного слайдера
// $().addEventListener('click', mainSliderPhoto(), false);
// $().addEventListener('click', mainSliderPhoto(), false);

// работа с тегами
// $().addEventListener('click', addTag(), false);
// $().addEventListener('click', hiddenTagMask(), false);
// $().addEventListener('click', renderPhoto(), false);
// $().addEventListener('click', esc(), false);
// $().addEventListener('click', moveTagMask(), false);
// $().addEventListener('click', enter(), false);
// $().addEventListener('click', renderTagsMask(), false);
// $().addEventListener('click', form(), false);

// форма добавления фото
$('.deleteSome').addEventListener('click', deleteView(), false);
var id = 1;

$('#file').addEventListener('change', handleFileOneSelect, false);
$('#files').on('change', handleFileSelect);

// Подтверждение удаления
// $().addEventListener('click', confirmModal(), false);

// Чтение комментария в админке
// $().addEventListener('click', readComment (), false);

// Инициализация слайдеров
// $().addEventListener('click', slider (activeEl, leftEl, rightEl, el), false);
// $().addEventListener('click', slider (activeEl, leftEl, rightEl, el), false);
// $().addEventListener('click', slider (activeEl, leftEl, rightEl, el), false);

// инициализация слайдеров
// $('').addEventListener('click', slider('.active-about',
//                               '.left-about',
//                               '.right-about',
//                               '.item' ), false);
$('.min-nav-views').addEventListener('click', slider('.active-view-min',
                                            '.left-view-min',
                                            '.right-view-min',
                                            '.item-view-min'), false);
$('.nav-zoom-views').addEventListener('click', slider('.active-slide-zoom-views',
                                                      '.left-slide-zoom-views',
                                                      '.right-slide-zoom-views',
                                                      '.item-views-zoom'), false);

// прослушка кнопок закрытия попапов
// $('').addEventListener('click', closeModal('#modalDescriptionFull'), false);
$('#close-modal-law').addEventListener('click', closeModal('#modalLaw'), false);
$('.popup-close-news').addEventListener('click', closeModal('.modal-news'), false);
$('#closeLink').addEventListener('click', closeModal('#dialogLinkAdd'), false);
$('.popup-close').addEventListener('click', closeModal('.overlay'), false);
$('#close-modal-likes').addEventListener('click', closeModal('#allPhotoLikes'), false);
$('#close-modal-views').addEventListener('click', closeModal('#modalViewsZoom'), false);
$('.popup-error-close').addEventListener('click', closeModal('#popup-error-slider'), false);
$('.slider-close').addEventListener('click', closeModal('#zoom-slider'), false);

// прослушка кнопок открытия попапов
$('.full-scrn').addEventListener('click', openModal('#zoom-slider'), false);
$('.b-pretense').addEventListener('click', openModal('#modalLaw'), false);
$('#foot-about').addEventListener('click', openModal('#popup-about'), false);
$('#foot-feedback').addEventListener('click', openModal('#popup-feedback'), false);
$('.login').addEventListener(openModalView('click', '#login-popup'), false);
$('#registration').addEventListener(openModal('click', '#popup-registr'), false);
$('#recover-pswd').addEventListener(openModal('click', '#passwd-popup'), false);

// Подгрузить все комментарии
// $().addEventListener('click', loadAllComments(btn), false);

// Открытие модального окна описания
// $().addEventListener('click', openModalDescription (), false);

// Инициализация кнопки для показа полной информации о пользователе
addArrowForMoreInfo();
$('.to-bottom').addEventListener('click', showUserInfoMore, false);

// попапы новостей
$('.item-news-title').on('click', function(){
    $('.'+$(this).attr('rel')).fadeIn();
});

// активность пользователя
$('.like button').addEventListener('click', like(), false);
$('.liked button').addEventListener('click', liked(), false);
$('#pretense-file').addEventListener('change', changeIcoPretense(), false);
$('#formPretense').addEventListener('submit', sendPretense(), false);
$('p.asd').addEventListener('click', allPhotoLikes(), false);

// валидация форм
// $().addEventListener('submit', commonValid(text, where), false);
// $().addEventListener('submit', commonValid(text, where), false);
// $().addEventListener('submit', commonValid(text, where), false);
// $().addEventListener('submit', validateBack(), false);

$('#feedback').children().on('click', function () {
    $(this).removeClass('error');
});


$( document ).ready(function () {
  $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.823});
  $(window).resize(function() {
    $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.823});
  });
});




$('#current-position, #current-position-zoom').text($('.active-slide').index() + 1);
var id, newLocal;

// делегирование

var filtr = new Filtr;

table.onclick = function(event) {
  var target = event.target; // где был клик?

  if (target.tagName != 'TD') return; // не на TD? тогда не интересует

  highlight(target); // подсветить TD
};
