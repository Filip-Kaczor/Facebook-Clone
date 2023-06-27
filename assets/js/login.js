$(document).ready(function() {

    $("#registerShow").click(function() {
        history.pushState(null, null, "register");
        $("#login").slideUp("slow", function() {
            $("#register").slideDown("slow");
        });
    });

    $("#loginShow").click(function() {
        history.pushState(null, null, "login");
        $("#register").slideUp("slow", function() {
            $("#login").slideDown("slow");
        });
    });

    $("#loginShow2").click(function() {
        history.pushState(null, null, "login");
        $("#reset").slideUp("slow", function() {
            $("#login").slideDown("slow");
        });
    });

    $("#resetShow").click(function() {
        history.pushState(null, null, "reset");
        $("#login").slideUp("slow", function() {
            $("#reset").slideDown("slow");
        });
    });

});