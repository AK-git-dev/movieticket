$('.components').slimscroll({
  height: 'auto',
  color:"#fff",
  railVisible: true,
		alwaysVisible: false
});$('.components').slimscroll({
  height: 'auto',
  color:"#fff",
  railVisible: true,
		alwaysVisible: false
});$('.components').slimscroll({
  height: 'auto',
  color:"#fff",
  railVisible: true,
		alwaysVisible: false
});$('.components').slimscroll({
  height: 'auto',
  color:"#fff",
  railVisible: true,
		alwaysVisible: false
});
// document ready function ends here
$(document).ready(function(){
  //Date JS starts here
  var monthNames = [ "Jan", "Feb", "Mar", "Apr", "May", "June",
      "July", "Aug", "Sept", "Oct", "Nov", "Dec" ];
  var dayNames= ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"]

  var newDate = new Date();
  newDate.setDate(newDate.getDate());    
  $('#Date').html(dayNames[newDate.getDay()] + " , " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
  //DateJS End here

});// document ready function ends here

//sidebar
	$(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
			
			if(!$("#sidebar").hasClass("active")){
				$("#content").addClass("slideRight");
				$(".footer").addClass("slideRight");
			 } else {
			 $("#content").removeClass("slideRight");
			 $(".footer").removeClass("slideRight");
			 }
		});
		
		var divHeight = $('#sidebar').height() - 70; 
		 
		$('ul.components').css('max-height', divHeight+'px');
	});

$('.components').slimscroll({
  height: 'auto',
  color:"#fff",
  railVisible: true,
		alwaysVisible: false
});

