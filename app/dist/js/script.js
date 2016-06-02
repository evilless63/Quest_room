$(document).ready(function(){
	$(".addReview").click(function(){
		$("#mailUs").css("display", "block");
	});	

	$(".questContainer").hover(function(){
		$(this).children('.questPromo').css("display", "block");
	}, function(){
		$(this).children('.questPromo').css("display", "none");
	});

	$("#mailUs").submit(function(){
	    event.preventDefault();
		var form_data = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "mail_questions.php",
			data: form_data,
			success: function(){
				alert("Сообщение успешно отправлено");
			}
		});
	});

	$("#mailUsFeedback").submit(function(){
	    event.preventDefault();
		var form_data = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "mail_feedback_quest.php",
			data: form_data,
			success: function(){
				alert("Сообщение успешно отправлено");
			}
		});
	});

});

      	 