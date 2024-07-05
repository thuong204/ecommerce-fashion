$(document).ready(function() {
    $('.toggleSubMenu').click(function(e) {
        e.preventDefault(); // Prevent the default behavior of the link
        $(this).next('.sub').slideToggle();
    });
});
