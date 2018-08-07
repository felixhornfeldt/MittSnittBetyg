function toogleClassProfileContent() {
    $(".u_header_profile_logo_ctr").click(function() {
        $(".u_header_profile_content_ctr").toggleClass("transition-toggle");  
        $(".u_header_profile_content_close").toggleClass("fa-times-rotate-open");   
    });

    $(".u_header_profile_content_close").click(function() {
        $(".u_header_profile_content_ctr").toggleClass("transition-toggle"); 
        $(".u_header_profile_content_close").toggleClass("fa-times-rotate-open");
    });
}

// NEW

function toogleChangeGradeElement() {
    $(".u_change_grade_close").click(function(){
        $(".u_change_grade_ctr").css("display", "none");
    });

    $(".u_manage_edit").click(function(){
        $(".u_change_grade_ctr").css("display", "grid");
        let uniqueId = $(this).attr("data-grade-btn-id");
        console.log(uniqueId);
        let editData = editGradeInfo(uniqueId);

        function editGradeInfo(id) {
            let gradeName = document.querySelector("[data-grade-name-id='"+id+"']").textContent;
            let gradeLetter = document.querySelector("[data-grade-letter-id='"+id+"']").textContent;
            let gradeValue = document.querySelector("[data-grade-value-id='"+id+"']").textContent;
            let gradeArr = [gradeName,gradeLetter,gradeValue];
            return gradeArr;
        }

        console.log(editData);
        console.log(editData[0]);
        console.log(".value");

        $("#ucgctfikn").value(editData[0]);
    });
}

$(function() {
    toogleClassProfileContent();
    toogleChangeGradeElement();
});