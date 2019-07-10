$(document).ready(function(){
    $("a.navplayers").click(function(){
        $("div.teams").addClass("hide");
        $("div.players").removeClass("hide");
        $("div.staff").addClass("hide");
    });
    $("a.navstaff").click(function(){
        $("div.teams").addClass("hide");
        $("div.players").addClass("hide");
        $("div.staff").removeClass("hide");
    });
    $("a.navteams").click(function(){
        $("div.teams").removeClass("hide");
        $("div.players").addClass("hide");
        $("div.staff").addClass("hide");
    });
 });


jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
