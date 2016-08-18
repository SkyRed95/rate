$(document).ready(function () {
    $("#auth").click(function () {
        $.ajax({
            type: "POST",
            url: "auth.php",
            success: function () {
                $.getScript('js/get.js');
            },
            statusCode: {
                401: function () {
                    alert("401 Unauthorized");
                }
            }
        });
    });
});