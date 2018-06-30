function toogleClassProfileContent() {
    $(".u_header_profile_logo_ctr").click(function() {
        $(".u_header_profile_content_ctr").toggleClass("transition-toggle");  
        $(".fa-times").toggleClass("fa-times-rotate-open");   
    });

    $(".fa-times").click(function() {
        $(".u_header_profile_content_ctr").toggleClass("transition-toggle"); 
        $(".fa-times").toggleClass("fa-times-rotate-open");
    });
}

$(function() {
    toogleClassProfileContent();
});