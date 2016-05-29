$(document).ready(function(){
	$(".addReview").click(function(){
		$("#mailUs").css("display", "block");
	});	

	$(".questContainer").hover(function(){
		$(this).children('.questPromo').css("display", "block");
	}, function(){
		$(this).children('.questPromo').css("display", "none");
	});


	var form = document.forms.mailUs;

			var formData = new FormData(form);  

			var xhr = new XMLHttpRequest();
			xhr.open("POST", "mail_questions.php");

			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4) {
					if(xhr.status == 200) {
						data = xhr.responseText;
						if(data == "true") {
							alert("Ваше сообщение успешно отправлено !");
						} else {
							alert("При отправки сообщения возникли проблемы !")
						}
					}
				}
			};
			
			xhr.send(formData);


});