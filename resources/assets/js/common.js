$( document ).ready(function () {
  $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.823});

  $(window).resize(function() {
    $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.823});
  });

  // $('#allPhotoLikes').on('click', function () {
  //   var id = $('.active-slide').data('id'),
  //       csrftoken = $('meta[name=_token]').attr('content');
  //   $.ajax({
  //     type:'POST',
  //     data: {
  //               '_token'  : csrftoken,
  //               'id': id
  //     },
  //     url:'/load_comments',
  //
  //     success: function (data) {
  //         for(var i=0; i<data.length; i++) {
  //         }
  //     }
  //   });
  // });
});
