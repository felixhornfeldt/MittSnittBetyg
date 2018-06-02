function display() {
    // console.log("In the doc");
    var startHold = document.querySelector(".ix_start_hold");
    var loginHold = document.querySelector(".ix_login_hold");
    var registerHold = document.querySelector(".ix_register_hold");
    $("#ix_form_button_login").click(function() {
        // console.log("Clicked log in button");
        $(startHold).fadeToggle(1000, function() {
            $(loginHold).fadeToggle(1000, function(){});
        });
    });
    $("#ix_form_button_register").click(function() {
        // console.log("Clicked register button");
        $(startHold).fadeToggle(1000, function() {
            $(registerHold).fadeToggle(1000, function(){});
        });
    });
    $("i.ix_register_back_b").click(function() {
        // console.log("Clicked back button");
        $(registerHold).fadeToggle(1000, function() {
            $(startHold).fadeToggle(1000, function(){});
        });
    });
    $("i.ix_login_back_b").click(function() {
        // console.log("Clicked back button");
        $(loginHold).fadeToggle(1000, function() {
            $(startHold).fadeToggle(1000, function(){});
        });
    });
}

$(function() {
    display();
})