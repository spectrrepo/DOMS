$( document ).ready(function() {

  $('#closeLink').on('click', function () {
    $('#dialogLinkAdd').fadeOut();
  });

  $('.open-modal-link').on('click', function () {
    if ($(this).data('action') === 'addLinks') {

      $('h3.title-form').empty()
                        .text('Добавить ссылку');
      $('.mini-modal-submit').removeClass('uk-icon-save')
                             .addClass('uk-icon-plus');
      $('.links-control').removeAttr('id')
                         .attr('id', 'add-link-form');

      $('#add-link-form').submit(function (e) {
         e.preventDefault();
         var csrftoken = $('meta[name=_token]').attr('content'),
             link = $('input[name=link]').val(),
             user_id = $('input[name=user_id]').val();

         $.ajax({
           type:'POST',
           data: {
                '_token'  : csrftoken,
                'link' : link,
                'user_id' : user_id
           },
           url:'http://localhost:8000/add_links',
           success: function () {
             $('input[name=link]').val('');
             $('#dialogLinkAdd').fadeOut();
             $('.list-links').append(
               '<li class="item-links uk-icon-external-link '+
                'open-modal-link" data-action="editLinks">'+
               '<input class="contact-item-value soc-set-edit" name="soc_net"'+
               'value="'+link+'" type="hidden"></li>');
           // fadeIn
           }
         });
         return false;
     });
    }else {
      $('input[name=old_link]').val($(this).children('input[name=soc_net]').val());
      $('input[name=link]').val($(this).children('input[name=soc_net]').val())

      $('h3.title-form').empty()
                        .append('Изменить ссылку для '+
                        $(this).children('input[name=soc_net]').val()+' или '+
              '<span id="delete-btn" class="remove-this-links">удалить</span>');

      $('.mini-modal-submit').removeClass('uk-icon-plus')
                             .addClass('uk-icon-save')
      $('.links-control').removeAttr('id')
                         .attr('id', 'save-link-form');
         $('#save-link-form').submit(function (e) {
             e.preventDefault();
             var csrftoken = $('meta[name=_token]').attr('content'),
                 link = $('input[name=link]').val(),
                 user_id = $('input[name=user_id]').val();

             $.ajax({
                 type:'POST',
                 data: {
                      '_token'  : csrftoken,
                      'link' : link,
                      'user_id' : user_id
                 },
                 url:'http://localhost:8000/edit_links',
                 success: function () {
                   $('input[name=link]').val('');
                   $('#dialogLinkAdd').fadeOut();
                                 // add
                                 // fadeIn
                 }
             });
             return false;
         });
         $('#delete-btn').on('click', function () {
           var csrftoken = $('meta[name=_token]').attr('content'),
               link = $('input[name=link]').val(),
               user_id = $('input[name=user_id]').val();

           $.ajax({
               type:'POST',
               data: {
                         '_token'  : csrftoken,
                         'link' : link,
                         'user_id' : user_id
               },
               url:'http://localhost:8000/delete_links',

               success: function () {
                 $('input[name=link]').val('');
                 $('#dialogLinkAdd').fadeOut();
                 // add
                 // fadeIn
               }
           });
         });
    }
    $('#dialogLinkAdd').fadeIn();
  });

});
