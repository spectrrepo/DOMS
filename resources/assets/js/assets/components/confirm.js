/*
 *  Simple image gallery. Uses default settings
 */
 $(document).ready(function () {
   $('.confirm-form-delete').on('submit', function () {
     if(confirm('Вы уверены?')) {
       $('#userform').submit();
     }
   });
 });
