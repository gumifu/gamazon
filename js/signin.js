$(function() {
    $(".balloon").after().hide();
    $("#btn").click(function() {
    $(".balloon").toggleClass("open").slideToggle("normal", function() {
        $("body,html").scrollTop();
      });
    });
  });