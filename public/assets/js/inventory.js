$(document).ready(function () {
    var url = $("#inventoryTable").data("url");

    $("#inventoryTable").DataTable({
        scrollX: true,
        processing: true,
        serverSide: false,
        ajax: {
            url: url,
            type: "GET",
        },
        columns: [
            {
                data: null,
                render: (data, type, row, meta) => meta.row + 1,
                className: "text-center",
            },
            { data: "nama", className: "text-center" },
            { data: "stok", className: "text-center" },
            { data: "satuan", className: "text-center" },
        ],
    });
});
