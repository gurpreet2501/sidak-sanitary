jQuery(function(){
	// console.log(window.getBaseUrl());
	var path = window.getBaseUrl();
	$('.set_od_approve_status').click(function(){
			var self = this;	
			$.LoadingOverlay("show");

			var record_id = $(this).data('record_id');
			
			$.ajax({
			  method: "POST",
			  url: window.getBaseUrl()+'/ajax/update_user_od_status',
			  data: { record_id:  record_id}
			})
			  .done(function( resp ) {
			  	$.LoadingOverlay("hide");
			  	
			  	if(resp){
			  		swal({
				  		  title: "Approved",
				  		  text: "OD Approval Successful",
				  		  icon: "success",
				  		});
			  		$('.od_status_'+record_id).html('APPROVED');
			  		$(self).hide();
			  	}else{
			  		swal({
				  		  title: "Error",
				  		  text: "Failed to approve OD",
				  		  icon: "error",
				  		});
			  	}

			  	return;

			  });

	})

});