// function for displaying and not displaying different elements
function homeDisplayToggle() {
    const startHold = document.querySelector(".ix_start_hold"),
        loginHold = document.querySelector(".ix_login_hold"),
        signupHold = document.querySelector(".ix_signup_hold");
        
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

function toogleClassProfileContent() {
    $(".header_profile_logo_ctr").click(function() {
        $(".header_profile_content_ctr").toggleClass("transition-toggle");  
        $(".u_header_profile_content_close").toggleClass("fa-times-rotate-open");   
    });

    $(".u_header_profile_content_close").click(function() {
        $(".header_profile_content_ctr").toggleClass("transition-toggle"); 
        $(".u_header_profile_content_close").toggleClass("fa-times-rotate-open");
    });
}

function toogleChangeGradeElement() {
    $(".u_change_grade_close").click(function(){
        $(".u_change_grade_ctr").fadeToggle(750, function(){
            $(".u_change_grade_content_ctr").css("display", "none");
        });
    });

    $(".u_manage_edit").click(function(){
        $(".u_change_grade_ctr").css("display", "grid");

        $(".u_change_grade_content_ctr").fadeToggle(750, function(){
            $(".u_change_grade_content_ctr").css("display", "grid");
        });

        let uniqueId = $(this).attr("data-grade-btn-id");
        let editData = editGradeInfo(uniqueId);

        function editGradeInfo(id) {
            let gradeName = document.querySelector("[data-grade-name-id='"+id+"']").textContent,
                gradeLetter = document.querySelector("[data-grade-letter-id='"+id+"']").textContent,
                gradeValue = document.querySelector("[data-grade-value-id='"+id+"']").textContent,
                gradeArr = [gradeName,gradeLetter,gradeValue];
            return gradeArr;
        }

        $("#ucgctfikn").val(editData[0]);
        $("#ucgctfib").val(editData[1]);
        $("#ucgctfikp").val(editData[2]);
        $("#change_grade_id_input").val(uniqueId);

        let changeGradePara = document.querySelectorAll(".u_change_grade_ct_form_sp");
        for (let i = 0; i < changeGradePara.length; i++) {
            $(changeGradePara[i]).attr("data-og-value", editData[i]);
            changeGradePara[i].textContent = "Tidigare: "+editData[i];
            $(changeGradePara[i]).css("display", "none");
        }
    });
}

function inputChangeFunc() {
    $(".u_change_grade_ct_form_input").on("input", function(){
        let ucgParaEl = "#"+$(this).attr("data-para-id")+"";
        let gradeOgValue = $(ucgParaEl).attr("data-og-value");
        if (this.value.toUpperCase() === gradeOgValue) {
            $(ucgParaEl).css("display", "none");
        } else {
            $(ucgParaEl).css("display", "block");
        }
    });
}

function inputValueController() {
    $("#ucgctfikp").on("input", function(){
        if (this.value >= 999) {
            this.value = 999;
        }
    });
    $("#ucgctfib").on("input", function(){
        this.value = this.value.toUpperCase();
        const accValues = "ABCDEF";
        if (this.value.length > 1) {
            if (accValues.includes(this.value[0])) {
                this.value = this.value[0];
            } else {
                this.value = "";
            }
        } else {
            if (!accValues.includes(this.value[0])) {
                this.value = "";
            }
        }
    });
}

function inputOgValuesToggle() {
    $(".u_change_grade_ct_re_btn").click(function(){
        let inputs = document.querySelectorAll(".u_change_grade_ct_form_input");
        let inputOgValueParas = document.querySelectorAll(".u_change_grade_ct_form_sp");
        for (let i = 0; i < inputs.length; i++) {
            let ogValue = $(inputOgValueParas[i]).attr("data-og-value");
            $(inputs[i]).val(ogValue);
            $(inputOgValueParas[i]).css("display", "none");
        }
    });
}

$(function() {
    homeDisplayToggle();
    spinTransform();
    slideManageGradeCtr();
    displayDeleteForm();
    displayNewGradeForm();
    toogleClassProfileContent();
    toogleChangeGradeElement();
    inputChangeFunc();
    inputOgValuesToggle();
    inputValueController()
});