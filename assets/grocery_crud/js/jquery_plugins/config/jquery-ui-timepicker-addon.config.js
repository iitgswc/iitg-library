function formatDate(date_var) {
	console.log(date_var);
	var date = date_var.getDate();
	var month = date_var.getMonth()+1;
	var year = date_var.getFullYear();

	var hours = date_var.getHours();
	var minutes = date_var.getMinutes();
	var seconds = date_var.getSeconds();

	if(date < 10) date = '0'+date;
	if(month < 10) month = '0'+month;
	if(hours < 10) hours = '0'+hours;
	if(minutes < 10) minutes = '0'+minutes;
	if(seconds < 10) seconds = '0'+seconds;

  return date + '/' + month + '/' + year + ' ' + hours + ':' + minutes + ':' + seconds;
}

$(function(){

	var cur_datetime = "";


    $('.datetime-input').datetimepicker({
    	timeFormat: 'HH:mm:ss',
		dateFormat: js_date_format,
		showButtonPanel: true,
		changeMonth: true,
		changeYear: true,
		setDate: new Date()
    }).val(formatDate(new Date()));
    
	$('.datetime-input-clear').button();
	
	$('.datetime-input-clear').click(function(){
		$(this).parent().find('.datetime-input').val("");
		return false;
	});	

});