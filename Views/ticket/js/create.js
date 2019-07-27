$(document).ready(function() {
	$('#ticketCreateForm').submit(function(e) {
		$.ajax({
			url: `${base_path}ticket/fCreate`,
			type: "POST",
			contentType: false,
			cache: false,
			processData: false,
			data: new FormData(this),
			dataType: 'json',
			success: function(msg) {
				let divClass=null;
				if(msg.return) {
                    divClass='success'; icon='check';
                }
				else {divClass='danger'; icon='alert-circle'}
				
				$('#formResult').html(`
					<div class="alert alert-${divClass}" role="alert">
						<i class="mdi mdi-${icon} mr-1"></i> ${msg.response}
					</div>
                `);

				$([document.documentElement, document.body]).animate({
                    scrollTop: $("#formResult").offset().top-100
                }, 1000);
			},
			error: function() {
				alert('Wystąpił błąd');
			}
		});
		e.preventDefault();
	});
});