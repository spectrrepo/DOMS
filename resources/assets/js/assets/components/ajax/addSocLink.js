$(document).ready(function() {
//TODO:сделать через addEventListener
    $('#closeLink').on('click', function() {
        $('#dialogLinkAdd').fadeOut();
    });


    function save() {
        $('#save-link-form').submit(function(e) {
            e.preventDefault();
            var csrftoken = $('meta[name=_token]').attr('content'),
                link = $('input[name=link]').val(),
                user_id = $('input[name=user_id]').val();
            old_link = $('input[name=old_link]').val();

            $.ajax({
                type: 'POST',
                data: {
                    '_token': csrftoken,
                    'link': link,
                    'old_link': old_link,
                    'user_id': user_id
                },
                url: '/edit_links',
                success: function() {
                    $('input[name=link]').val('');
                    $('#dialogLinkAdd').fadeOut();
                    $('.uk-alert').remove();
                    $('#editUser').prepend(
                        '<div class="uk-alert uk-alert-success" data-uk-alert=""' +
                        'style="display: block;">' +
                        '<a href="" class="uk-alert-close uk-close"></a>' +
                        '<p>Ссылка изменена</p></div>');
                    $('li.item-links[data-id=' + $('#save-link-form').data('id') + ']')
                        .children('input.soc-set-edit')
                        .val(link);
                    setTimeout(function() {
                        $('.uk-alert').css({
                            'height': '0'
                        }).remove()
                    }, 10000)

                }
            });
            return false;
        });
    }

    function deleteLink() {
        $('#delete-btn').on('click', function() {
            var csrftoken = $('meta[name=_token]').attr('content'),
                link = $('input[name=link]').val(),
                user_id = $('input[name=user_id]').val();

            $.ajax({
                type: 'POST',
                data: {
                    '_token': csrftoken,
                    'link': link,
                    'user_id': user_id
                },
                url: '/delete_links',

                success: function() {
                    $('input[name=link]').val('');
                    $('#dialogLinkAdd').fadeOut();
                    $('#editUser').prepend(
                        '<div class="uk-alert uk-alert-success" data-uk-alert=""' +
                        'style="display: block;">' +
                        '<a href="" class="uk-alert-close uk-close"></a>' +
                        '<p>Ссылка удалена</p></div>');
                    $('li[data-id=' + $('#save-link-form').data('id') + ']').remove();
                    setTimeout(function() {
                        $('.uk-alert').css({
                            'height': '0'
                        }).remove()
                    }, 10000)

                }
            });
        });
    }

    function openModalLink() {
        $('.open-modal-link').on('click', function() {

            $('.links-control').removeAttr('id')
                .attr('id', 'save-link-form');
            $('input[name=old_link]').val($(this).children('input.soc-set-edit').val());
            $('input[name=link]').val($(this).children('input.soc-set-edit').val())
            $('#save-link-form').attr('data-id', $(this).data('id'));

            $('h3.title-form').empty()
                .append('Изменить ссылку для ' +
                    $(this).children('input.soc-set-edit').val() + ' или ' +
                    '<span id="delete-btn" class="remove-this-links">удалить</span>');

            $('.mini-modal-submit').removeClass('uk-icon-plus')
                .addClass('uk-icon-save')
            $('#dialogLinkAdd').fadeIn();
            deleteLink();
        });
    }
    $('.open-modal-link').on('click', function() {
        if ($(this).data('action') === 'addLinks') {

            $('h3.title-form').empty()
                .text('Добавить ссылку');
            $('.mini-modal-submit').removeClass('uk-icon-save')
                .addClass('uk-icon-plus');
            $('.links-control').removeAttr('id')
                .attr('id', 'add-link-form');

            $('#add-link-form').submit(function(e) {
                e.preventDefault();
                var csrftoken = $('meta[name=_token]').attr('content'),
                    link = $('input[name=link]').val(),
                    user_id = $('input[name=user_id]').val();

                $.ajax({
                    type: 'POST',
                    data: {
                        '_token': csrftoken,
                        'link': link,
                        'user_id': user_id
                    },
                    url: '/add_links',
                    success: function(data) {
                        $('input[name=link]').val('');
                        $('#dialogLinkAdd').fadeOut();
                        $('.open-di-link').before(
                            '<li class="item-links uk-icon-external-link ' +
                            'open-modal-link" data-action="editLinks"data-id="' + data.id + '">' +
                            '<input class="contact-item-value soc-set-edit" name="soc_net' + data.id + '"' +
                            'value="' + link + '" type="hidden"></li>');
                        $('.uk-alert').remove();
                        $('#editUser').prepend(
                            '<div class="uk-alert uk-alert-success" data-uk-alert=""' +
                            'style="display: block;">' +
                            '<a href="" class="uk-alert-close uk-close"></a>' +
                            '<p>Ссылка добавлена</p></div>');
                        save();
                        openModalLink();
                        setTimeout(function() {
                            $('.uk-alert').css({
                                'height': '0'
                            }).remove()
                        }, 10000);
                    }
                });
                return false;
            });
        } else {
            $('.links-control').removeAttr('id')
                .attr('id', 'save-link-form');
            $('input[name=old_link]').val($(this).children('input.soc-set-edit').val());
            $('input[name=link]').val($(this).children('input.soc-set-edit').val())
            $('#save-link-form').attr('data-id', $(this).data('id'));

            $('h3.title-form').empty()
                .append('Изменить ссылку для ' +
                    $(this).children('input.soc-set-edit').val() + ' или ' +
                    '<span id="delete-btn" class="remove-this-links">удалить</span>');

            $('.mini-modal-submit').removeClass('uk-icon-plus')
                .addClass('uk-icon-save')

            deleteLink();
            save();
            openModalLink();
        }
        $('#dialogLinkAdd').fadeIn();
    });

});
