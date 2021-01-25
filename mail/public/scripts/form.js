$(document).ready(function() {
	$('form').submit(function(event) {
		if ($(this).attr('id') == 'no_ajax') {
			return;
		}
		var json;
		event.preventDefault();
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.url) {
					window.location.href = '/' + json.url;
				} else {
					alert(json.status + ' - ' + json.message);
				}
			},
		});
	});
	$("#send").click(function(){
		var recipient = $("#recipient").val();
		var theme = $("#theme").val();
		var message = $("#message").val();
		var flag = 0;
		if (recipient === ""){
			flag = 1;

		}
		if (theme === ""){
			flag = 1;
		}
		if (message === ""){
			flag = 1;
		}

		if (flag === 0){
			alert("Message sent!");
			$("recipient").val("");
			$("theme").val("");
			$("message").val("");
			// $('.modal-dialog, .modal-content, .modal-body').hide();
			window.location.href = "/account/inbox"
		}else if(flag === 1){
			alert("Not all fields are filled");
		}

	});
});


