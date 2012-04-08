$(document).ready(function() {
   // jQuery UI Accordion
  $(".accordion").accordion();
  
   // A global variable to remember the text area currently being edited
  var openText;
  
   // Loadmore paginator
  $(".loadmore").click(function() {
    $.ajax({
	    url:$(this).attr("href"), 
	    data:{startingfrom:count, recordcount:5}, // hardcoding sucks!! Will do better with the help of PHP session
        success:function(html) {
          // Open the first of the newly-loaded accordion content
          var newcount = $(".accordion").children(".accordioncontent").length;
          if ((newcount - count) <= 0) return;
          $(".accordion").accordion("option", "active", accordioncount);
          // If the newly-loaded rows counts less than asked for, it's a sign that we have reached bottom of the database table,
          // which means we should hide the "More..." button.
          if ((newcount - accordioncount) < 2) $(this).hide();
          count = newcount;			  
        }
	});
	return false; // prevent the default action, which is navigating to the link here
  });

  $("#tohome").click(function() {
    $("#home_content").show();
    $("#touguide_content").hide();
    $("#plantseed_content").hide();
    $("#forest_content").hide();
  });


});

