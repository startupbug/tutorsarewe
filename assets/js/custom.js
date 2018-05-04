/*$('.collapse').on('shown.bs.collapse', function(){
$(this).parent().find(".fa fa-chevron-right").removeClass("fa fa-chevron-right").addClass("fa fa-angle-down");
}).on('hidden.bs.collapse', function(){
$(this).parent().find(".fa fa-angle-down").removeClass("fa fa-angle-down").addClass("fa fa-chevron-right");
});*/
 $( function() {
    $( "#slider" ).slider();

	// With JQuery
	$("#ex2").slider({});

	// Without JQuery
	var slider = new Slider('#ex2', {});
	
  } );