$(document).ready(function () {
    $("#filter button").click(function () {
        var ccy = $(this, "#filter button").val();
        var range = $("#reportrange span").text().split(' - ');
        $.ajax({
            type: "GET",
            url: "get_rate.php",
            data: {
                ccy: ccy,
                range: range
            },
            success: function (data) {
                document.getElementById('rate').innerHTML = data;
                history.pushState(null, '', this.url);
                drawChart(); // area_chart.js
            }
        });
    });
});