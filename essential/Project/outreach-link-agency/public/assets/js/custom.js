$(document).ready(function () {
    var table = $("#data-table").DataTable({
        language: {
            search: "<i class='fa fa-search search-icon'></i>",
            lengthMenu: "_MENU_ ",
            paginate: {
                first: '<i class="fa fa-angle-double-left"></i>',
                last: '<i class="fa fa-angle-double-right"></i>',
                previous: '<i class="fa fa-angle-left"></i>',
                next: '<i class="fa fa-angle-right"></i>',
            },
        },
        // oLanguage: {
        //     sLengthMenu: "_MENU_",
        //     sInfo: "Showing _TOTAL_ results ",
        // },
        dom: "Blfrtip",
        buttons: ["copy", "csv", "excel", "pdf", "print"],
        order: [],
    });

    $(".delete-confirm").click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete ${name}?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });

    $(".accept-confirm").click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Are you sure you want to accept this order?`,
            text: "If you accept this, it will be marked as completed.",
            icon: "success",
            buttons: true,
            dangerMode: true,
        }).then((willAccept) => {
            if (willAccept) {
                form.submit();
            }
        });
    });

    table.on("click", ".edit-explore-header", function () {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        var item = $(this).data("item");
        $.get("explore_header/" + item + "/edit", function (data) {
            var action = "explore_header/" + data.id + "/update";
            $("#editForm").attr("action", action);
            var myModal = new bootstrap.Modal(
                document.getElementById("editModal")
            );
            $("#exploreHeaderTitleEdit").val(data.title);
            $("#exploreHeaderDescriptionEdit").val(data.description);
            myModal.show();
        });
    });

    table.on("click", ".edit-explore-sub-header", function () {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        var item = $(this).data("item");
        $.get("explore_sub_header/" + item + "/edit", function (data) {
            var action = "explore_sub_header/" + data.id + "/update";
            $("#editForm").attr("action", action);
            var myModal = new bootstrap.Modal(
                document.getElementById("editModal")
            );
            $("#exploreHeaderTitleEdit").val(data.title);
            $("#exploreHeaderDetailsEdit").val(data.description);
            myModal.show();
        });
    });

    table.on("click", ".edit-explore-category", function () {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        var item = $(this).data("item");

        $.get("explore_category/" + item + "/edit", function (data) {
            var action = "explore_category/" + data.id + "/update";
            $("#editForm").attr("action", action);
            var myModal = new bootstrap.Modal(
                document.getElementById("editModal")
            );
            $("#exploreCategoryNameEdit").val(data.name);
            myModal.show();
        });
    });

    // Edit Explore Publication type
    table.on("click", ".edit-explore-publication", function () {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        var item = $(this).data("item");

        $.get("explore_publication_type/" + item + "/edit", function (data) {
            var action = "explore_publication_type/" + data.id + "/update";
            $("#editForm").attr("action", action);
            var myModal = new bootstrap.Modal(
                document.getElementById("editModal")
            );
            $("#explorePublicationNameEdit").val(data.name);
            myModal.show();
        });
    });

    // Edit Explore Hyperlink Type
    table.on("click", ".edit-explore-hyperlink", function () {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        var item = $(this).data("item");

        $.get("explore_hyperlink_type/" + item + "/edit", function (data) {
            var action = "explore_hyperlink_type/" + data.id + "/update";
            $("#editForm").attr("action", action);
            var myModal = new bootstrap.Modal(
                document.getElementById("editModal")
            );
            $("#exploreHyperlinkNameEdit").val(data.name);
            myModal.show();
        });
    });

    table.on("click", ".edit-explore-service", function () {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        var item = $(this).data("item");
        $.get("service_type/" + item + "/edit", function (data) {
            var action = "service_type/" + data.id + "/update";
            $("#editForm").attr("action", action);
            var myModal = new bootstrap.Modal(
                document.getElementById("editModal")
            );
            $("#explorServicePriceEdit").val(data.price);
            myModal.show();
        });
    });
    table.on("click", ".edit-explore-service-content-word-length", function () {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        var item = $(this).data("item");
        $.get(
            "service_buy_content_word_length/" + item + "/edit",
            function (data) {
                var action =
                    "service_buy_content_word_length/" + data.id + "/update";
                $("#editForm").attr("action", action);
                var myModal = new bootstrap.Modal(
                    document.getElementById("editModal")
                );
                $(".word-length").text(data.length);
                $("#explorServiceContentPriceEdit").val(data.price);
                myModal.show();
            }
        );
    });

    // Show package plan details
    table.on("click", ".show-package-details", function () {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        var item = $(this).data("item");
        $.get("package/" + item, function (data) {
            var myModal = new bootstrap.Modal(
                document.getElementById("packageShowModal")
            );
            $(".package-name").text(data.name);
            $(".package-price").text(data.price);
            $(".package-description").html(data.description);
            let url = "package/" + data.id + "/edit";
            $(".package-edit-btn").html(
                '<a href="' +
                    url +
                    '" class="btn btn-otr-primary text-white"> <i class="bx bx-edit"></i> Edit Package </a>'
            );
            myModal.show();
        });
    });

    // Show subscribe plan details
    table.on("click", ".show-subscription-plan-details", function () {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        var item = $(this).data("item");
        $.get("subscription-plan/" + item, function (data) {
            var myModal = new bootstrap.Modal(
                document.getElementById("subcriptionShowModal")
            );
            $(".subscription-name").text(data.name);
            $(".subscription-price").text(data.price);
            $(".subscription-description").html(data.description);
            $(".subscription-validity").html(data.validity);
            let url = "subscription-plan/" + data.id + "/edit";
            $(".subscription-plan-edit-btn").html(
                '<a href="' +
                    url +
                    '" class="btn btn-otr-primary text-white"> <i class="bx bx-edit"></i> Edit subscription plan </a>'
            );
            myModal.show();
        });
    });

    // ck-editor js code
    ClassicEditor.create(document.querySelector("#editor")).catch((error) => {
        console.error(error);
    });

    $(".publication-type-input").select2({
        placeholder: "Choose a publication type",
        allowClear: true,
    });

    $(".hyperlinks-type-input").select2({
        placeholder: "Choose a hyperlink type",
        allowClear: true,
    });
});
