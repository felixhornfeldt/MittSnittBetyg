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

function toogleChangeGradeElement() {
    $(".u_change_grade_close").click(function(){
        $(".u_change_grade_ctr").css("display", "none");
    });

    $(".u_manage_edit").click(function(){
        let uniqueId = $(this).attr("data-grade-btn-id");
        let editData = editGradeInfo(uniqueId);

        function editGradeInfo(id) {
            let gradeName = document.querySelector("[data-grade-name-id='"+id+"']").textContent;
            let gradeLetter = document.querySelector("[data-grade-letter-id='"+id+"']").textContent;
            let gradeValue = document.querySelector("[data-grade-value-id='"+id+"']").textContent;
            return [gradeName,gradeLetter,gradeValue];
        }

        console.log(editData);
        console.log(".value");
    });
}

$(function() {
    toogleClassProfileContent();
    toogleChangeGradeElement();
});