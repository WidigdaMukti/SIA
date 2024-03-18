// ini untuk text link
$(document).ready(function () {
    $(".link-banner").hover(
        function () {
            $(this).removeClass("text-black").addClass("text-green-1");
        },
        function () {
            $(this).removeClass("text-green-1").addClass("text-black");
        }
    );
});
