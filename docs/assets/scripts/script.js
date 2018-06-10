// function for displaying and not displaying different elements
function a() {
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

// function for user spin transforming to user content
function b() {
    if (document.querySelectorAll(".u_ctr").length > 0) {
        const delay500 = 500;
        // function for displaying spinner
        setTimeout($(".u_spin_ctr").fadeToggle(delay500, function(){}), delay500);
        // function for displaying user content
        const spinTime = Math.floor(Math.random() * (4000 - 1500 + 1) + 1500);
        setTimeout(c, spinTime);
        function c() {
            $(".u_spin_ctr").fadeToggle(delay500, function() {
                $(".u_content_ctr").fadeToggle(delay500, function(){});
            });
        }
    }
}

$(function() {
    a();
    b();
})