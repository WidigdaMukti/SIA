// BAGIAN CARD
$(document).ready(function () {
    // link title
    $(".card-title").hover(
        function () {
            $(this).removeClass("text-black").addClass("text-green-1");
        },
        function () {
            $(this).removeClass("text-green-1").addClass("text-black");
        }
    );
    // link title
    // link image
    $(".img-link").hover(
        function () {
            $(this).find("img").css({
                transform: "scale(1.1)",
                transition: "transform .2s",
            });
        },
        function () {
            $(this).find("img").css({
                transform: "scale(1)",
                transition: "transform .2s",
            });
        }
    );
    // link image
});
// BAGIAN CARD
