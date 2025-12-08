$(document).ready(function () {
    var url = $("#kategoriTable").data("url");
    var table = $("#kategoriTable").DataTable({
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
            {
                data: "uuid",
                render: (data, type, row) => {
                    return `
                        <div style="display: flex; flex-direction: column; align-items: center; gap: 4px;">
                            <div style="display: flex; justify-content: center; gap: 4px;">
                                <a class="btn btn-primary btn-sm editBtn" data-id="${row.uuid}">
                                    <i class="ti ti-pencil"></i>
                                </a>
                                <a class="btn btn-danger btn-sm deleteBtn" data-id="${row.uuid}">
                                    <i class="ti ti-trash"></i>
                                </a>
                            </div>
                        </div>
                    `;
                },
                className: "text-center",
            },
        ],
    });

    // ===== CREATE / OPEN MODAL =====
    $("#addKategori").on("click", function () {
        $("#kategoriForm")[0].reset(); // reset form
        $("#kategoriId").val(""); // hapus ID
        $("#kategoriModal .modal-title").text("Tambah kategori");
        $("#kategoriModal").modal("show"); // tampilkan modal
    });

    // ===== EDIT / OPEN MODAL =====
    $(document).on("click", ".editBtn", function () {
        var id = $(this).data("id");
        $.get("/kategori/" + id, function (res) {
            var data = res.data ? res.data[0] : res;
            $("#kategoriId").val(data.uuid);
            $("#nama").val(data.nama);

            $("#kategoriModal .modal-title").text("Edit kategori");
            $("#kategoriModal").modal("show");
        });
    });

    // ===== STORE / UPDATE FORM =====
    $("#kategoriForm").on("submit", function (e) {
        e.preventDefault();
        var id = $("#kategoriId").val();
        var formData = new FormData($("#kategoriForm")[0]);
        var ajaxUrl = id ? "/kategori/" + id : "/kategori"; // url update jika ada id
        var ajaxType = "POST";
        if (id) formData.append("_method", "PATCH"); // pakai patch untuk update di Laravel

        $.ajax({
            url: ajaxUrl,
            type: ajaxType,
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                $("#kategoriModal").modal("hide");
                table.ajax.reload();
                alert("Data berhasil disimpan!");
            },
            error: function (xhr) {
                if (xhr.status === 422) {
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

    $(document).on("click", ".deleteBtn", function (e) {
        e.preventDefault();
        var id = $(this).data("id");

        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            $.ajax({
                url: "/kategori/" + id,
                type: "POST",
                data: {
                    _method: "DELETE",
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (res) {
                    table.ajax.reload();
                    alert(res.message || "Data berhasil dihapus");
                },
                error: function (xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseText);
                },
            });
        }
    });
});
