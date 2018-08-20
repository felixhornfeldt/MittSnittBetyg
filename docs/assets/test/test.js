function toogleClassProfileContent() {
    $(".header_profile_logo_ctr").click(function() {
        $(".header_profile_content_ctr").toggleClass("transition-toggle");  
        $(".u_header_profile_content_close").toggleClass("fa-times-rotate-open");   
    });

    $(".header_profile_content_close").click(function() {
        $(".header_profile_content_ctr").toggleClass("transition-toggle"); 
        $(".header_profile_content_close").toggleClass("fa-times-rotate-open");
    });
}



$(function() {
    toogleClassProfileContent();
});