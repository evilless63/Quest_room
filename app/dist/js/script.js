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

	$(".schedule_wpapper_column_block").click(function(){
		if( $(this).hasClass("not_active")){
			//Do nothing
		} else {
			$("body").removeClass();
		    $("body").addClass("schedule_background");

			$(".quest_description_wrapper, .info_wrapper").fadeOut("slow");

			var itemScheduleTime = $(this).children(".schedule_time").text();
			var itemScheduleCost = $(this).children(".schedule_cost").text();
			var itemScheduleDate = $(this).children(".schedule_date_nodisplay").text();	

			$(".itemScheduleTime").html(itemScheduleTime);
			$(".itemScheduleCost").html(itemScheduleCost);
			$(".itemScheduleDate").html(itemScheduleDate);

			$(".modalWindow").fadeIn("slow");
			$('html, body').animate({
		        scrollTop: $(".mainLogo").offset().top
		    }, 1000);
		    	
		}
	});
	

	$("#itemScheduleFormSubmit").click(function(){
		var date = $("#itemScheduleDate").text();
		var time = $(".itemScheduleTime").text();
		var cost = $(".itemScheduleCost").text();
		var name = $("#itemScheduleFormName").val();
		var surname = $("#itemScheduleFormSurname").val();
		var phone = $("#itemScheduleFormPhone").val();
		var questName = $("#itemScheduleFormQuest").val();

	    $.ajax({
          type: "POST",
          url: "../../schedule_mail.php",
          data: { date: date, time: time, cost: cost, name: name, surname: surname, phone: phone, questName: questName }
        }).done(function() {
          alert( "Заявка успешно отправлена");
          location.reload();
        });
	});
	

});

      	 