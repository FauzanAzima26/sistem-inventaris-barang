$(document).ready(function () {
    // Ambil URL AJAX dari data-url table
    var url = $("#barangTable").data("url");
    var table = $("#barangTable").DataTable({
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
            { data: "kode_barang", className: "text-center" },
            { data: "nama", className: "text-center" },
            {
                data: "kategori",
                render: (data, type, row) =>
                    row.kategori ? row.kategori.nama : "-",
                className: "text-center",
            },
            {
                data: "harga",
                render: $.fn.dataTable.render.number(",", ".", 0, "Rp"),
                className: "text-center",
            },
            { data: "jumlah_barang", className: "text-center" },
            { data: "satuan", className: "text-center" },
            {
                data: "image",
                render: function (data, type, row) {
                    var imgUrl = data
                        ? "/images/" + data
                        : "/images/default.jpg";
                    return `<img src="${imgUrl}" alt="${row.nama}" width="100" height="100">`;
                },
                className: "text-center",
            },
            {
                data: "id",
                render: (data, type, row) => {
                    return `
                    <a href="#" class="btn btn-primary btn-sm editBtn" data-id="${row.id}"><i class="ti ti-pencil"></i></a>
                    <a href="#" class="btn btn-danger btn-sm deleteBtn" data-id="${row.id}"><i class="ti ti-trash"></i></a>
                    <a href="#" class="btn btn-warning btn-sm viewBtn" data-id="${row.id}"><i class="ti ti-eye"></i></a>
                `;
                },
                className: "text-center",
            },
        ],
    });

    // ===== CREATE / OPEN MODAL =====
    $("#addBarang").on("click", function () {
        $("#barangForm")[0].reset(); // reset form
        $("#barangId").val(""); // hapus ID
        $("#barangModal .modal-title").text("Tambah Barang");
        $("#barangModal").modal("show"); // tampilkan modal
    });

    // ===== STORE / SUBMIT FORM =====
    $("#barangForm").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData($("#barangForm")[0]);

        $.ajax({
            url: "/barang", // resource route store
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                $("#barangModal").modal("hide"); // tutup modal
                table.ajax.reload(); // reload DataTable
                alert("Data berhasil disimpan!");
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    // Validasi gagal
                    var errors = xhr.responseJSON.errors;
                    var errorMessages = "";
                    $.each(errors, function (key, value) {
                        errorMessages += value + "\n";
                    });
                    alert(errorMessages);
                } else {
                    alert("Terjadi kesalahan: " + xhr.responseText);
                }
            },
        });
    });
});
