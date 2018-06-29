function toogleClassProfileContent() {
    $(".u_header_profile_logo_ctr").click(function() {
        $(".u_header_profile_content_ctr").toggleClass("transition-toggle");     
    });
}

$(function() {
    toogleClassProfileContent();
});