
/*Jquery Custom JS File */

$(document).ready(function(){

  $("#roleSelect").change(function(e){
  		e.preventDefault();
  		if($(this).val() == 3){
  			$("#teach_div").toggle();
  		}else if($(this).val() == 2){
  			$("#teach_div").toggle();
  		}
  });

});