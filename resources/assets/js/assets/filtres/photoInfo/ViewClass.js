/**
* Класс для работы с видами фотографий
* @class View
*/
export default class View{
  /** Конструктор
  * @constructor Comment
  * @param
  */
  constructor ( ) {

  }
  let wrap='';
  /**
  * @property {object}
  */
  URL: 'load_views';
  /**
  * @property {object}
  */
  photoID: .get();
  /**
  * @property {object}
  */
  token : $('meta[name=_token]').attr('content');
  /**
  * @property {object}
  */
  active : ' active-view-min';
  /**
  * @property {object}
  */
  left : ' left-view-min';
  /**
  * @property {object}
  */
  right : ' right-view-min';
  /**
  * Конструктор
  * @method Comment
  * @param
  * @return
  */
  HTML(array){
   `'<div class="item-view-min">'
      '<img src="'${path}'" alt="" />'
    '</div>'`
  }
  /**
   * Конструктор
   * @method Comment
   * @param
   * @return
  */
  getJSON () {

  }
  /**
   * Конструктор
   * @method Comment
   * @param
  */
  clear (wrap) {

  }
  /**
   * Конструктор
   * @method Comment
   * @param
  */
  render () {

  }
  /**
   * Конструктор
   * @method Comment
   * @param
  */
  hide (wrap){

  }
  /**
   * Конструктор
   * @method Comment
   * @param
  */
  show (wrap) {

  }
}

var id = $('.active-slide').data('id'),
        csrftoken = $('meta[name=_token]').attr('content');
    $.ajax({
        type: 'POST',
        data: {
            '_token': csrftoken,
            'id': id
        },
        url: '/load_views',

        success: function(data) {
            if (data.length === 1) {
                $('#views-pole').fadeIn();
                $('#views').fadeIn();
                $('.b-change-photo').empty();
                $('.min-nav-views').fadeOut()
                $('<li class="item-views-zoom active-slide-zoom-views">' +
                        '<img class="img-views-zoom" src="' + data[0].path_full + '"></li>')
                    .appendTo('.views-zoom-list');
                $('<div class="item-view-min active-view-min"><img src="' + data[0].path_min + '"></div>').appendTo('.b-change-photo');
                openModalView('.item-view-min');
            } else if (data.length === 0) {
                $('#views-pole').fadeIn();
                $('#views').fadeIn();
                $('.b-change-photo').empty();
                $('#views').fadeOut();
                $('#views-pole').fadeOut();
            } else {
                $('.b-change-photo').empty();
                $('.min-nav-views').fadeIn()
                $('#views').fadeIn();
                $('#views-pole').fadeIn();

                for (var i = 0; i < data.length; i++) {
                    if (data[i] === data[0]) {
                        $('<div class="item-view-min active-view-min"><img src="' + data[i].path_min + '"></div>').appendTo('.b-change-photo');
                        $('<li class="item-views-zoom active-slide-zoom-views">' +
                                '<img class="img-views-zoom" src="' + data[i].path_full + '"></li>')
                            .appendTo('.views-zoom-list');
                    } else {
                        $('<div class="item-view-min right-view-min"><img src="' + data[i].path_min + '"></div>').appendTo('.b-change-photo');
                        $('<li class="item-views-zoom right-slide-zoom-views">' +
                                '<img class="img-views-zoom" src="' + data[i].path_full + '"></li>')
                            .appendTo('.views-zoom-list');
                    }
                }

            }
            openModalView('.item-view-min');
        }
    });
