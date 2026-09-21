"use strict";

let fv, offCanvasEl;

// datatable (jquery)
$(function () {
    var dt_basic_table = $("#stokMenipisTable"),
        dt_basic;

    if (dt_basic_table.length) {
        var dataDummy = [
            {
                kode_barang: "BRG-001",
                nama: "Kertas HVS A4 80gr Sinar Dunia",
                stok: 3,
                kategori: { nama: "Alat Tulis Kantor" },
                status: "Stok Menipis",
            },
            {
                kode_barang: "BRG-002",
                nama: "Tinta Printer Epson Black T6641",
                stok: 0,
                kategori: { nama: "Tinta & Toner" },
                status: "Habis",
            },
            {
                kode_barang: "BRG-005",
                nama: "Mouse Wireless Logitech M170",
                stok: 2,
                kategori: { nama: "Elektronik Kantor" },
                status: "Stok Menipis",
            },
            {
                kode_barang: "BRG-012",
                nama: "Baterai ABC Alkaline AA (Isi 4)",
                stok: 5,
                kategori: { nama: "Perkakas & Baterai" },
                status: "Stok Menipis",
            },
            {
                kode_barang: "BRG-019",
                nama: "Map Folder Snelhechter Plastik Biru",
                stok: 1,
                kategori: { nama: "Alat Tulis Kantor" },
                status: "Stok Menipis",
            },
            {
                kode_barang: "BRG-024",
                nama: "Kabel HDMI To VGA Adapter v1.4",
                stok: 2,
                kategori: { nama: "Elektronik Kantor" },
                status: "Stok Menipis",
            },
            {
                kode_barang: "BRG-031",
                nama: "Solasi Bening Benz Tape 2 Inch",
                stok: 4,
                kategori: { nama: "Alat Tulis Kantor" },
                status: "Stok Menipis",
            },
            {
                kode_barang: "BRG-035",
                nama: "Lampu LED Philips 12 Watt Cool Daylight",
                stok: 0,
                kategori: { nama: "Perkakas & Baterai" },
                status: "Habis",
            },
            {
                kode_barang: "BRG-042",
                nama: "Flashdisk Sandisk Cruzer Blade 32GB",
                stok: 1,
                kategori: { nama: "Elektronik Kantor" },
                status: "Stok Menipis",
            },
            {
                kode_barang: "BRG-050",
                nama: "Isi Staples Max No. 10 (Kecil)",
                stok: 3,
                kategori: { nama: "Alat Tulis Kantor" },
                status: "Stok Menipis",
            },
        ];

        dt_basic = dt_basic_table.DataTable({
            // ajax: assetsPath + "json/table-datatable.json",
            data: dataDummy,
            columns: [
                {
                    data: null,
                    defaultContent: "",
                    className: "control",
                    orderable: false,
                    searchable: false,
                },
                { data: "" },
                {
                    data: null,
                    render: (data, type, row, meta) => meta.row + 1,
                    className: "text-center",
                },
                {
                    data: "kode_barang",
                    className: "text-center fw-medium",
                },
                {
                    data: "nama",
                    className: "text-start",
                },
                {
                    data: "stok",
                    className: "text-center fw-bold",
                    render: (data) => data + " Pcs",
                },
                {
                    data: "kategori",
                    render: (data, type, row) =>
                        row.kategori ? row.kategori.nama : "-",
                    className: "text-center",
                },
                {
                    data: "status",
                    className: "text-center",
                    render: function (data) {
                        return (
                            '<span class="badge bg-label-danger">' +
                            (data ? data : "Stok Menipis") +
                            "</span>"
                        );
                    },
                },
            ],
            columnDefs: [
                {
                    // For Responsive
                    data: null,
                    defaultContent: "",
                    className: "control",
                    orderable: false,
                    searchable: false,
                    responsivePriority: 2,
                    targets: 0,
                    render: function (data, type, full, meta) {
                        return "";
                    },
                },
                {
                    // For Checkboxes
                    data: null,
                    defaultContent: "",
                    targets: 1,
                    orderable: false,
                    searchable: false,
                    responsivePriority: 3,
                    checkboxes: true,
                    render: function () {
                        return '<input type="checkbox" class="dt-checkboxes form-check-input">';
                    },
                    checkboxes: {
                        selectAllRender:
                            '<input type="checkbox" class="form-check-input">',
                    },
                },
            ],
            order: [[2, "asc"]],
            dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-6 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end mt-n6 mt-md-0"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 5,
            lengthMenu: [5, 10, 25, 50, 75, 100],
            language: {
                paginate: {
                    next: '<i class="ti ti-chevron-right ti-sm"></i>',
                    previous: '<i class="ti ti-chevron-left ti-sm"></i>',
                },
                zeroRecords: "Tidak ada data stok menipis ✨",
            },
            buttons: [
                {
                    extend: "collection",
                    className:
                        "btn btn-label-primary dropdown-toggle me-4 waves-effect waves-light border-none",
                    text: '<i class="ti ti-file-export ti-xs me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span>',
                    buttons: [
                        {
                            extend: "print",
                            text: '<i class="ti ti-printer me-1" ></i>Print',
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7],
                                // prevent avatar to be display
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = "";
                                        $.each(el, function (index, item) {
                                            if (
                                                item.classList !== undefined &&
                                                item.classList.contains(
                                                    "user-name",
                                                )
                                            ) {
                                                result =
                                                    result +
                                                    item.lastChild.firstChild
                                                        .textContent;
                                            } else if (
                                                item.innerText === undefined
                                            ) {
                                                result =
                                                    result + item.textContent;
                                            } else
                                                result =
                                                    result + item.innerText;
                                        });
                                        return result;
                                    },
                                },
                            },
                            customize: function (win) {
                                //customize print view for dark
                                $(win.document.body)
                                    .css("color", config.colors.headingColor)
                                    .css(
                                        "border-color",
                                        config.colors.borderColor,
                                    )
                                    .css(
                                        "background-color",
                                        config.colors.bodyBg,
                                    );
                                $(win.document.body)
                                    .find("table")
                                    .addClass("compact")
                                    .css("color", "inherit")
                                    .css("border-color", "inherit")
                                    .css("background-color", "inherit");
                            },
                        },
                        {
                            extend: "csv",
                            text: '<i class="ti ti-file-text me-1" ></i>Csv',
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7],
                                // prevent avatar to be display
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = "";
                                        $.each(el, function (index, item) {
                                            if (
                                                item.classList !== undefined &&
                                                item.classList.contains(
                                                    "user-name",
                                                )
                                            ) {
                                                result =
                                                    result +
                                                    item.lastChild.firstChild
                                                        .textContent;
                                            } else if (
                                                item.innerText === undefined
                                            ) {
                                                result =
                                                    result + item.textContent;
                                            } else
                                                result =
                                                    result + item.innerText;
                                        });
                                        return result;
                                    },
                                },
                            },
                        },
                        {
                            extend: "excel",
                            text: '<i class="ti ti-file-spreadsheet me-1"></i>Excel',
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7],
                                // prevent avatar to be display
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = "";
                                        $.each(el, function (index, item) {
                                            if (
                                                item.classList !== undefined &&
                                                item.classList.contains(
                                                    "user-name",
                                                )
                                            ) {
                                                result =
                                                    result +
                                                    item.lastChild.firstChild
                                                        .textContent;
                                            } else if (
                                                item.innerText === undefined
                                            ) {
                                                result =
                                                    result + item.textContent;
                                            } else
                                                result =
                                                    result + item.innerText;
                                        });
                                        return result;
                                    },
                                },
                            },
                        },
                        {
                            extend: "pdf",
                            text: '<i class="ti ti-file-description me-1"></i>Pdf',
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7],
                                // prevent avatar to be display
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = "";
                                        $.each(el, function (index, item) {
                                            if (
                                                item.classList !== undefined &&
                                                item.classList.contains(
                                                    "user-name",
                                                )
                                            ) {
                                                result =
                                                    result +
                                                    item.lastChild.firstChild
                                                        .textContent;
                                            } else if (
                                                item.innerText === undefined
                                            ) {
                                                result =
                                                    result + item.textContent;
                                            } else
                                                result =
                                                    result + item.innerText;
                                        });
                                        return result;
                                    },
                                },
                            },
                        },
                        {
                            extend: "copy",
                            text: '<i class="ti ti-copy me-1" ></i>Copy',
                            className: "dropdown-item",
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7],
                                // prevent avatar to be display
                                format: {
                                    body: function (inner, coldex, rowdex) {
                                        if (inner.length <= 0) return inner;
                                        var el = $.parseHTML(inner);
                                        var result = "";
                                        $.each(el, function (index, item) {
                                            if (
                                                item.classList !== undefined &&
                                                item.classList.contains(
                                                    "user-name",
                                                )
                                            ) {
                                                result =
                                                    result +
                                                    item.lastChild.firstChild
                                                        .textContent;
                                            } else if (
                                                item.innerText === undefined
                                            ) {
                                                result =
                                                    result + item.textContent;
                                            } else
                                                result =
                                                    result + item.innerText;
                                        });
                                        return result;
                                    },
                                },
                            },
                        },
                    ],
                },
            ],
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return "Details of " + data["full_name"];
                        },
                    }),
                    type: "column",
                    renderer: function (api, rowIdx, columns) {
                        var data = $.map(columns, function (col, i) {
                            return col.title !== "" // ? Do not show row in modal popup if title is blank (for check box)
                                ? '<tr data-dt-row="' +
                                      col.rowIndex +
                                      '" data-dt-column="' +
                                      col.columnIndex +
                                      '">' +
                                      "<td>" +
                                      col.title +
                                      ":" +
                                      "</td> " +
                                      "<td>" +
                                      col.data +
                                      "</td>" +
                                      "</tr>"
                                : "";
                        }).join("");

                        return data
                            ? $('<table class="table"/><tbody />').append(data)
                            : false;
                    },
                },
            },
            initComplete: function (settings, json) {
                $(".card-header").after('<hr class="my-0">');
            },
        });
        $("div.head-label").html(
            '<h5 class="card-title mb-0">DataTable with Buttons</h5>',
        );
    }

    // Filter form control to default size
    // ? setTimeout used for multilingual table initialization
    setTimeout(() => {
        $(".dataTables_filter .form-control").removeClass("form-control-sm");
        $(".dataTables_length .form-select").removeClass("form-select-sm");
    }, 300);
});
