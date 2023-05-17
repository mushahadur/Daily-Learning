$(document).ready(function () {
    $("#range_DA").ionRangeSlider({
        skin: "round",
        type: "double",
        grid: !0,
        min: 0,
        max: 1e2,
        from: 0,
        to: 100,
        onFinish: function (data) {},
    }),
        $("#range_DR").ionRangeSlider({
            skin: "round",
            type: "double",
            grid: !0,
            min: 0,
            max: 1e2,
            from: 0,
            to: 100,
        });
    let my_range = $("#range_DA").data("ionRangeSlider");
});
