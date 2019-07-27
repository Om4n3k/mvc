$(document).ready(function() {
	$('#loginForm').submit(function(e) {
		$.ajax({
			url: `${base_path}user/fLogin`,
			type: "POST",
			contentType: false,
			cache: false,
			processData: false,
			data: new FormData(this),
			dataType: 'json',
			success: function(msg) {
				let divClass=null;
				if(msg.return) {divClass='success'; icon='check'}
				else {divClass='danger'; icon='alert-circle'}

				//if(Array.isArray(msg.response)) {
				//    msg.response.forEach(function(){
				//        
				//    });
				//}
				
				$('#formResult').html(`
					<div class="alert alert-${divClass}" role="alert">
						<i class="mdi mdi-${icon} mr-1"></i> ${msg.response}
					</div>
				`);

				if(msg.return) setTimeout(function(){
					location.href=msg.url;
				},2500);
			},
			error: function() {
				alert('Wystąpił błąd');
			}
		});
		e.preventDefault();
	});

	$('#registerForm').submit(function(e) {
		$.ajax({
			url: `${base_path}user/fRegister`,
			type: "POST",
			contentType: false,
			cache: false,
			processData: false,
			data: new FormData(this),
			dataType: 'json',
			success: function(msg) {
				let divClass=null;
				if(msg.return) {divClass='success'; icon='check'}
				else {divClass='danger'; icon='alert-circle'}

				//if(Array.isArray(msg.response)) {
				//    msg.response.forEach(function(){
				//        
				//    });
				//}
				
				$('#formResult').html(`
					<div class="alert alert-${divClass}" role="alert">
						<i class="mdi mdi-${icon} mr-1"></i> ${msg.response}
					</div>
				`);

				if(msg.return) setTimeout(function(){
					location.href=base_path+'user/login';
				},2500);
			},
			error: function() {
				alert('Wystąpił błąd');
			}
		});
		e.preventDefault();
	});
});