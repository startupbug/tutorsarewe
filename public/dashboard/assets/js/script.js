$(document).ready(function () {
  $('body').on( 'click', 'a[href^="#/"]', function() {
    alert( "Thank you for clicking, but that's a demo link." );
    return false;
  });
});
$(document).ready(function(){

  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#review-stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.review-star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });

  }).on('mouseout', function(){
    $(this).parent().children('li.review-star').each(function(e){
      $(this).removeClass('hover');
    });
  });


  /* 2. Action to perform on click */
  $('#review-stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.review-star');

    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }

    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }

    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#review-stars li.selected').last().data('value'), 10);
    var msg = "Thanks! You rated this " + ratingValue + " stars.";
    responseMessage(msg,ratingValue);

  });


});


function responseMessage(msg,ratingValue) {
  $('.success-box').fadeIn(200);
  $('.success-box').removeClass('hidden');
  $('.success-box div.text-message').html("<span>" + msg + "</span>");

  $('.review_input').val(ratingValue);
}
