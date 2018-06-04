
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

    $("#sendRequest").on('submit', function(e){
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
		      data: formData,
		      processData: false,
		      contentType: false,     
		      success: function(data){

		        if(data.success == true){
		          toastr.success(data.msg);
		          
		          $("#jobRequestModal").modal('toggle');

		          // setTimeout(function(){ 
		          //   location.reload();
		          // }, 600);

		        }else if(data.success == false){
		          toastr.success(data.msg);
		        }
		      },
		      error: function(data){
		        toastr.error(data.msg);
		      }
		    });

    });  

});