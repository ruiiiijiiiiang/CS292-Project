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

  $(".loadmorepaginator").click(function() {
        alert("shit went down!");
    $.ajax({
      url:$(this).attr("href"), 
      data:{startingfrom:accordioncount, recordcount:2}, success:function(html) {
        $(".accordion").append(html);
        $(".accordion").accordion("destroy");
        $(".accordion").accordion();
        var newcount = $(".accordion").children(".accordioncontent").length;
        if ((newcount - accordioncount) <= 0) return;
        $(".accordion").accordion("option", "active", accordioncount);
        if ((newcount - accordioncount) < 2) $(this).hide();
        accordioncount = newcount;			  
      }
    });
    return false;
  });

});
