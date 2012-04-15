$(document).ready(function() {
  // jQuery UI Accordion
  $(".accordion").accordion();

  $("#home_content").show();
  $("#tourguide_content").hide();
  $("#plantseed_content").hide();
  $("#forest_content").hide();
  $("#contactus_content").hide();
  $("#TOU_content").hide();
  $("#tree_content").hide();

  
   // A global variable to remember the text area currently being edited
  var openText;
  
  $("#tohome").click(function() {
    $("#home_content").show();
    $("#tourguide_content").hide();
    $("#plantseed_content").hide();
    $("#forest_content").hide();
    $("#contactus_content").hide();
    $("#TOU_content").hide();
    $("#tree_content").hide();
  });

  $("#totourguide").click(function() {
    $("#home_content").hide();
    $("#tourguide_content").show();
    $("#plantseed_content").hide();
    $("#forest_content").hide();
    $("#contactus_content").hide();
    $("#TOU_content").hide();
    $("#tree_content").hide();
  });

  $("#toplantseed").click(function() {
    $("#home_content").hide();
    $("#tourguide_content").hide();
    $("#plantseed_content").show();
    $("#forest_content").hide();
    $("#contactus_content").hide();
    $("#TOU_content").hide();
    $("#tree_content").hide();
  });

  $("#toforest").click(function() {
    $("#home_content").hide();
    $("#tourguide_content").hide();
    $("#plantseed_content").hide();
    $("#forest_content").show();
    $("#contactus_content").hide();
    $("#TOU_content").hide();
    $("#tree_content").hide();
  });
  
  $("#tocontactus").click(function() {
    $("#home_content").hide();
    $("#tourguide_content").hide();
    $("#plantseed_content").hide();
    $("#forest_content").hide();
    $("#contactus_content").show();
    $("#TOU_content").hide();
    $("#tree_content").hide();
  });
  
  $("#toTOU").click(function() {
    $("#home_content").hide();
    $("#tourguide_content").hide();
    $("#plantseed_content").hide();
    $("#forest_content").hide();
    $("#contactus_content").hide();
    $("#TOU_content").show();
    $("#tree_content").hide();
  });
  
  $(".totree").click(function() {
    //call to other function to generate tree using jquery ui
    
    $("#home_content").hide();
    $("#tourguide_content").hide();
    $("#plantseed_content").hide();
    $("#forest_content").hide();
    $("#contactus_content").hide();
    $("#TOU_content").hide();
    $("#tree_content").show();
  });

  $("#search").autocomplete({
    source: tags
  });

  // Tab-based paginator
  var $tabs = $(".tabpaginator").tabs({
    load:function() { // Slidedown effect as visual cue to the new content
<<<<<<< HEAD
	},
=======
  },
>>>>>>> 4a01c56f9f5fb99e1110c362257cf5a79b09f9f3
    select:function(event, ui) {
        // currenttab is the tab is currently opened. ui.index is the tab that is about to be opened
	    var currenttab = $tabs.tabs('option', 'selected');
	    if (ui.index == 0) { // 'Prev' tab
		   $tabs.tabs('select', currenttab-1);
		   return false;
	    }
	    if (ui.index == ($tabs.tabs("length")-1)) { // 'Next' tab
		   $tabs.tabs('select', currenttab+1);
		   return false;
	    }
        if (ui.index != currenttab) {
		   // Enable/disable the 'Prev' and 'Next' tabs according to the switching of tabs
	       if (currenttab == 1) $tabs.tabs("enable", 0);
		   if (currenttab == ($tabs.tabs("length")-2)) $tabs.tabs("enable", $tabs.tabs("length")-1);
		   if (ui.index == 1) $tabs.tabs("disable", 0);
		   if (ui.index == ($tabs.tabs("length")-2)) $tabs.tabs("disable", $tabs.tabs("length")-1);
		   //$(".accordion").hide(); // jQuery Tabs automatically caches content. So we hide old tabs to avoid the flashy effect
	    }
	    return true;
	}
  });
  // Make the initial landing tab as '1', and disable 'Prev' tab
  $tabs.tabs('select', 1);  $tabs.tabs("disable", 0);  

});
