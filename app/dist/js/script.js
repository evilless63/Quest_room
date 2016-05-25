$(document).ready(function(){
	$( "#mailUsSubmit" ).click(function() {
	  alert( "Вопрос успешно отправлен и ожидает ответа !" );
	});
	$( "#mailFeedbackSubmit" ).click(function() {
	  alert( "Отзыв успешно отправлен и ожидает обработки модератором !" );
	});
	$(".addReview").click(function(){
		$("#mailUs").css("display", "block");
	});	
});