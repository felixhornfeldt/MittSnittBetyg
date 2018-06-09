function display() {
    var startHold = document.querySelector(".ix_start_hold");
    var loginHold = document.querySelector(".ix_login_hold");
    var signupHold = document.querySelector(".ix_signup_hold");
    $("#ix_form_button_login").click(function() {
        $(startHold).fadeToggle(1000, function() {
            $(loginHold).fadeToggle(1000, function(){});
        });
    });
    $("i.ix_login_back_b").click(function() {
        $(loginHold).fadeToggle(1000, function() {
            $(startHold).fadeToggle(1000, function(){});
        });
    });
    $("#ix_form_button_signup").click(function() {
        $(startHold).slideToggle(1000, function() {
            $(signupHold).slideToggle(1500, function(){});
        });
    });
    $("i.ix_signup_back_b").click(function() {
        $(signupHold).slideToggle(1500, function() {
            $(startHold).slideToggle(1000, function(){});
        });
    });
}

$(function() {
    display();
})