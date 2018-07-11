
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

  	$(".sendJobReqButton").on('click', function(e){
  			e.preventDefault();

  			$("#job_id").val($(this).data('id'));

  	});

    $("#sendRequestTestimonial").on('submit', function(e){
        e.preventDefault();
        console.log("assad");
        var formData = new FormData(this);
        console.log(formData);

        $.ajaxSetup({
          headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
        });

        $.ajax({
          type: "POST",
          url: $(this).attr('action'),
          data: {'testComment':$("#testComment").val()},   
          success: function(data){
            
            console.log(data);

            if(data.status == 200){

              toastr.success(data.msg);
	              
              $("#jobRequestModal").modal('toggle');

            }else if(data.status == 202){
              toastr.error(data.msg);
            }
          },
          error: function(data){
            toastr.error(data.msg);
          }
        });

    }); 

});