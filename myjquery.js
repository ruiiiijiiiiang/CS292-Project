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

  $("#logo").click(function() {
    $("#home_content").show();
    $("#tourguide_content").hide();
    $("#plantseed_content").hide();
    $("#forest_content").hide();
    $("#contactus_content").hide();
    $("#TOU_content").hide();
    $("#tree_content").hide();
  });

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


  $("#search").autocomplete({
    source:tags
  });
});
