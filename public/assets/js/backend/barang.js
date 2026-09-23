"use strict";

let fv, offCanvasEl;

document.addEventListener("DOMContentLoaded", function (e) {
    (function () {
        const formAddNewRecord = document.getElementById("form-add-new-record");

        setTimeout(() => {
            const newRecord = document.querySelector(".create-new"),
                offCanvasElement = document.querySelector("#add-new-record");

            // To open offCanvas, to add new record
            if (newRecord) {
                newRecord.addEventListener("click", function () {
                    offCanvasEl = new bootstrap.Offcanvas(offCanvasElement);
                    // Empty fields on offCanvas open
                    ((offCanvasElement.querySelector(".dt-full-name").value =
                        ""),
                        (offCanvasElement.querySelector(".dt-post").value = ""),
                        (offCanvasElement.querySelector(".dt-email").value =
                            ""),
                        (offCanvasElement.querySelector(".dt-date").value = ""),
                        (offCanvasElement.querySelector(".dt-salary").value =
                            ""));
                    // Open offCanvas with form
                    offCanvasEl.show();
                });
            }
        }, 200);

        // Form validation for Add new record
        fv = FormValidation.formValidation(formAddNewRecord, {
            fields: {
                basicFullname: {
                    validators: {
                        notEmpty: {
                            message: "The name is required",
                        },
                    },
                },
                basicPost: {
                    validators: {
                        notEmpty: {
                            message: "Post field is required",
                        },
                    },
                },
                basicEmail: {
                    validators: {
                        notEmpty: {
                            message: "The Email is required",
                        },
                        emailAddress: {
                            message: "The value is not a valid email address",
                        },
                    },
                },
                basicDate: {
                    validators: {
                        notEmpty: {
                            message: "Joining Date is required",
                        },
                        date: {
                            format: "MM/DD/YYYY",
                            message: "The value is not a valid date",
                        },
                    },
                },
                basicSalary: {
                    validators: {
                        notEmpty: {
                            message: "Basic Salary is required",
                        },
                    },
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    // Use this for enabling/changing valid/invalid class
                    // eleInvalidClass: '',
                    eleValidClass: "",
                    rowSelector: ".col-sm-12",
                }),
                submitButton: new FormValidation.plugins.SubmitButton(),
                // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                autoFocus: new FormValidation.plugins.AutoFocus(),
            },
            init: (instance) => {
                instance.on("plugins.message.placed", function (e) {
                    if (
                        e.element.parentElement.classList.contains(
                            "input-group",
                        )
                    ) {
                        e.element.parentElement.insertAdjacentElement(
                            "afterend",
                            e.messageElement,
                        );
                    }
                });
            },
        });

        // FlatPickr Initialization & Validation
        const flatpickrDate = document.querySelector('[name="basicDate"]');

        if (flatpickrDate) {
            flatpickrDate.flatpickr({
                enableTime: false,
                // See https://flatpickr.js.org/formatting/
                dateFormat: "m/d/Y",
                // After selecting a date, we need to revalidate the field
                onChange: function () {
                    fv.revalidateField("basicDate");
                },
            });
        }
    })();
});

// datatable (jquery)
$(function () {
    var dt_basic_table = $("#barangTable"),
        dt_basic;

    if (dt_basic_table.length) {
        var dataDummyBarang = [
            {
                id: 1,
                kode_barang: "BRG-001",
                nama: "Laptop ASUS VivoBook",
                kategori_id: "Elektronik",
                satuan: "Unit",
                harga_beli: 8500000,
                image: "laptop-asus.jpg",
            },
            {
                id: 2,
                kode_barang: "BRG-002",
                nama: "Buku Tulis Sinar Dunia 38 Lembar",
                kategori_id: "Alat Tulis",
                satuan: "Pack",
                harga_beli: 35000,
                image: "buku-tulis.jpg",
            },
            {
                id: 3,
                kode_barang: "BRG-003",
                nama: "Printer Epson L3210",
                kategori_id: "Peralatan Kantor",
                satuan: "Unit",
                harga_beli: 2400000,
                image: "printer-epson.jpg",
            },
            {
                id: 4,
                kode_barang: "BRG-004",
                nama: "Mouse Wireless Logitech",
                kategori_id: "Elektronik",
                satuan: "Pcs",
                harga_beli: 150000,
                image: "mouse-logitech.jpg",
            },
            {
                id: 5,
                kode_barang: "BRG-005",
                nama: "Kertas HVS A4 80gr PaperOne",
                kategori_id: "Peralatan Kantor",
                satuan: "Rim",
                harga_beli: 55000,
                image: "hvs-a4.jpg",
            },
        ];

        dt_basic = dt_basic_table.DataTable({
            // ajax: assetsPath + "json/table-datatable.json",
            data: dataDummyBarang,
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
                    className: "text-center",
                },
                {
                    data: "nama",
                    className: "text-center",
                },
                {
                    data: "kategori_id",
                    className: "text-center",
                },
                {
                    data: "satuan",
                    className: "text-center",
                },
                {
                    data: "harga_beli",
                    className: "text-center",
                },
                {
                    data: "image",
                    className: "text-center",
                },
                { data: "" },
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
                {
                    targets: -1,
                    data: null,
                    className: "text-center",
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        return `
                <div class="d-inline-flex gap-1">
                    <button type="button"
                        class="btn btn-sm btn-icon btn-text-secondary waves-effect"
                        title="Edit"
                        data-id="${row.id}">
                        <i class="ti ti-edit"></i>
                    </button>

                    <button type="button"
                        class="btn btn-sm btn-icon btn-text-danger waves-effect"
                        title="Hapus"
                        data-id="${row.id}">
                        <i class="ti ti-trash"></i>
                    </button>
                </div>
            `;
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
                zeroRecords: "Tidak ada data kategori ✨",
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
                {
                    text: '<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New Record</span>',
                    className:
                        "create-new btn btn-primary waves-effect waves-light",
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

    // Add New record
    // ? Remove/Update this code as per your requirements
    var count = 101;
    // On form submit, if form is valid
    fv.on("core.form.valid", function () {
        var $new_name = $(".add-new-record .dt-full-name").val(),
            $new_post = $(".add-new-record .dt-post").val(),
            $new_email = $(".add-new-record .dt-email").val(),
            $new_date = $(".add-new-record .dt-date").val(),
            $new_salary = $(".add-new-record .dt-salary").val();

        if ($new_name != "") {
            dt_basic.row
                .add({
                    id: count,
                    full_name: $new_name,
                    post: $new_post,
                    email: $new_email,
                    start_date: $new_date,
                    salary: "$" + $new_salary,
                    status: 5,
                })
                .draw();
            count++;

            // Hide offcanvas using javascript method
            offCanvasEl.hide();
        }
    });

    // Filter form control to default size
    // ? setTimeout used for multilingual table initialization
    setTimeout(() => {
        $(".dataTables_filter .form-control").removeClass("form-control-sm");
        $(".dataTables_length .form-select").removeClass("form-select-sm");
    }, 300);
});
