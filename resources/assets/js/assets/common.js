import { Filtr } from './filtres/Filtr';
import { photoID } from './lib/functions';
import { deleteLink, save } from './lib/link';
import { like,
         liked,
         changeIcoPretense,
         sendPretense,
         allPhotoLikes
       } from './lib/user_activity';
import { commonValid, validateBack } from './lib/validation';

$( document ).ready(function () {
  $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.823});
  $(window).resize(function() {
    $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.823});
  });
});


$('#current-position, #current-position-zoom').text($('.active-slide').index() + 1);
var id, newLocal;

loadAllPhoto('.btn-all-comments');
// делегирование

var filtr = new Filtr;

table.onclick = function(event) {
  var target = event.target; // где был клик?

  if (target.tagName != 'TD') return; // не на TD? тогда не интересует

  highlight(target); // подсветить TD
};

var height = parseInt($('pre').css('height'));
if (height > 119){
  $('.b-about-person').append(
  '<span class="to-bottom ico uk-icon-justify uk-icon-chevron-down"></span>'
  );
}
$('.to-bottom').on('click', function () {
  if ($(this).hasClass('uk-icon-chevron-down')) {
    $('.b-about-person').css({'height':'auto'});
    $(this).removeClass('uk-icon-chevron-down')
           .addClass('uk-icon-chevron-up');
  } else {
    $('.b-about-person').css({'height':'105px'});
    $(this).removeClass('uk-icon-chevron-up')
           .addClass('uk-icon-chevron-down');
  }
});

// прослушка кнопок закрытия попапов
$('').addEventListener(closeModal('#modalDescriptionFull'));
$('#close-modal-law').addEventListener(closeModal('#modalLaw'));
$('.popup-close-news').addEventListener(closeModal('.modal-news'));
$('#closeLink').addEventListener(closeModal('#dialogLinkAdd'));
$('.popup-close').addEventListener(closeModal('.overlay'));
$('#close-modal-likes').addEventListener(closeModal('#allPhotoLikes'));
$('#close-modal-views').addEventListener(closeModal('#modalViewsZoom'));
$('.popup-error-close').addEventListener(closeModal('#popup-error-slider'));
$('.slider-close').addEventListener(closeModal('#zoom-slider'));
// прослушка кнопок открытия попапов
$('.full-scrn').addEventListener(openModal('#zoom-slider'));
$('.b-pretense').addEventListener(openModal('#modalLaw'));
$('#foot-about').addEventListener(openModal('#popup-about'));
$('#foot-feedback').addEventListener(openModal('#popup-feedback'));
$('.login').addEventListener(openModalView('#login-popup'));
$('#registration').addEventListener(openModal('#popup-registr'));
$('#recover-pswd').addEventListener(openModal('#passwd-popup'));
// инициализация слайдеров
$('').addEventListener(slider('.active-about',
                              '.left-about',
                              '.right-about',
                              '.item' ));
$('.min-nav-views').addEventListener(slider('.active-view-min',
                                            '.left-view-min',
                                            '.right-view-min',
                                            '.item-view-min'));
// $('.nav-zoom-views').addEventListener(slider('.active-slide-zoom-views',
//                                              '.left-slide-zoom-views',
//                                              '.right-slide-zoom-views',
//                                              '.item-views-zoom');

// попапы новостей
$('.item-news-title').on('click', function(){
    $('.'+$(this).attr('rel')).fadeIn();
});
