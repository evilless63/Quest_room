$(document).ready(function(){
	$('#datetimepicker').datetimepicker({
		format:'d.m.Y H:i',
 		inline:true,
	});

	$.datetimepicker.setLocale('ru');

	$('button.getValueDate').on('click', function () {
	    var d = $('#datetimepicker').datetimepicker('getValue');
	    var month = d.getMonth() + 1;
	    console.log(d.getFullYear());
	    if (d.getMonth() < 10) {
	    	console.log('0' + month);
	    } else {
	    	console.log(month);
	    }
	    if (d.getDate() < 10) {
	    	console.log('0' + d.getDate());
	    } else {
	    	console.log(d.getDate());
	    }
	    console.log(d.getHours());
	    console.log(d.getHours() + 1);
	});
});
