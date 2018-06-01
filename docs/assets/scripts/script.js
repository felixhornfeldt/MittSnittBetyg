function display() {
    console.log("In the doc");
    var startHold = document.querySelector(".ix_start_hold");
    $("#ix_form_button_login").click(function() {
        console.log("Clicked button");
        $(startHold).fadeToggle(1000, function() {
            $(".ix_login_hold").fadeToggle(1000, function(){});
        });
    });
}

$(function() {
    display();
})