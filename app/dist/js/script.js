$(document).ready(function(){
	$(".addReview").click(function(){
		$("#mailUs").css("display", "block");
	});	

	$(".questContainer").hover(function(){
		$(this).children('.questPromo').css("display", "block");
	}, function(){
		$(this).children('.questPromo').css("display", "none");
	});


	function AjaxFormRequest(result_id,form_id,url) {
                jQuery.ajax({
                    url:     url, //Адрес подгружаемой страницы
                    type:     "POST", //Тип запроса
                    dataType: "html", //Тип данных
                    data: jQuery("#"+form_id).serialize(), 
                    success: alert("Данные успешно отправлены"),
                error: alert("При отправки формы возникли проблемы")
             });
        }

});