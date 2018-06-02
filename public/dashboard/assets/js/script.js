$(document).ready(function () {
    //for jquery functions


  $('body').on( 'click', 'a[href^="#/"]', function() {
      alert( "Thank you for clicking, but that's a demo link." );
      return false;
  });

});
