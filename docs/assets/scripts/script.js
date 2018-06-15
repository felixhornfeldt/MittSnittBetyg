// function for displaying and not displaying different elements
function homeDisplayToggle() {
    const startHold = document.querySelector(".ix_start_hold");
    const loginHold = document.querySelector(".ix_login_hold");
    const signupHold = document.querySelector(".ix_signup_hold");
    $("#ix_form_btn_login").click(function() {
        $(startHold).fadeToggle(1000, function() {
            $(loginHold).fadeToggle(1000, function(){});
        });
    });
    $("i.ix_login_back_b").click(function() {
        $(loginHold).fadeToggle(1000, function() {
            $(startHold).fadeToggle(1000, function(){});
        });
    });
    $("#ix_form_btn_signup").click(function() {
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
function spinTransform() {
    if (document.querySelectorAll(".u_ctr").length > 0) {
        const delay500 = 500;
        setTimeout($(".u_spin_ctr").fadeToggle(delay500, function(){}), delay500);
        const spinTime = Math.floor(Math.random() * (4000 - 1500 + 1) + 1500);
        setTimeout(displayUserContent, spinTime);
        function displayUserContent() {
            $(".u_spin_ctr").fadeToggle(delay500, function() {
                $(".u_content_ctr").fadeToggle(1250, function(){});
            });
        }
    }
}

function slideManageGradeCtr() {
    $(".u_grade_hold_ctr").click(function(){
        let manageCtrId = $(this).attr("data-grade-id");
        if (document.querySelectorAll(".slide_down").length > 0) {
            let ctrSlideDownId = $(".slide_down").attr("id");
            slideCtr(ctrSlideDownId);
            if (ctrSlideDownId !== manageCtrId) {
                slideCtr(manageCtrId);
            } 
        } else {
            slideCtr(manageCtrId);
        }
        function slideCtr(ctrId) {
            $("#"+ctrId+"").slideToggle(750, function(){});
            $("#"+ctrId+"").toggleClass("slide_down");
        }
    });
}

function displayDeleteForm() {
    $("i.u_manage_delete").click(function(){
        let deleteFormId = "#"+$(this).attr("data-delete-id")+"";
        fadeDeleteForm(true, deleteFormId);
    });
    $(document).click(function(){
        if (document.querySelectorAll(".show_delete_form").length > 0) {
            fadeDeleteForm(false, ".show_delete_form");
        }
    });
    function fadeDeleteForm(boo, id) {
        if (boo) {
            $(id).fadeIn(750, function(){
                $(id).toggleClass("show_delete_form");
            });
        } else {
            $(id).fadeOut(750, function(){
                $(id).toggleClass("show_delete_form");
            });
        }
    }
}

function displayNewGradeForm() {
    $(".u_new_grade_btn").click(function(){
        let newGradeFormBox = document.querySelector(".u_new_grade_form_box");
        $(newGradeFormBox).slideToggle(1500, function(){});
    });
}

$(function() {
    homeDisplayToggle();
    spinTransform();
    slideManageGradeCtr();
    displayDeleteForm();
    displayNewGradeForm();
})