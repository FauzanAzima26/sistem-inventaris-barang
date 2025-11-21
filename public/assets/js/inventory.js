$(document).ready(function () {
    var url = $("#inventoryTable").data("url");
    var table = $("#inventoryTable").DataTable({
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
            {
                data: "barang.nama", // relasi barang
                className: "text-center",
            },
            { data: "stok", className: "text-center" },
            { data: "barang.satuan", className: "text-center" },
            {
                data: "id",
                render: (data, type, row) => {
                    return `
                        <div style="display: flex; flex-direction: column; align-items: center; gap: 4px;">
                            <div style="display: flex; justify-content: center; gap: 4px;">
                                <a class="btn btn-primary btn-sm editBtn" data-id="${row.id}">
                                    <i class="ti ti-pencil"></i>
                                </a>
                                <a class="btn btn-danger btn-sm deleteBtn" data-id="${row.id}">
                                    <i class="ti ti-trash"></i>
                                </a>
                            </div>
                            <div style="display: flex; justify-content: center;">
                                <a class="btn btn-warning btn-sm viewBtn" data-id="${row.id}">
                                    <i class="ti ti-eye"></i>
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
    $("#addInventory").on("click", function () {
        $("#inventoryForm")[0].reset(); // reset form
        $("#inventoryId").val(""); // hapus ID
        $("#inventoryModal .modal-title").text("Tambah inventory");
        $("#imagePreview").remove();
        $("#inventoryModal").modal("show"); // tampilkan modal
    });

    // ===== EDIT / OPEN MODAL =====
    $(document).on("click", ".editBtn", function () {
        var id = $(this).data("id");
        $.get("/inventory/" + id, function (res) {
            var data = res.data ? res.data[0] : res;
            $("#inventoryId").val(data.id);
            $("#barang_id").val(data.barang_id);
            $("#stok").val(data.stok);

            $("#inventoryModal .modal-title").text("Edit inventory");
            $("#inventoryModal").modal("show");
        });
    });

    // ===== STORE / UPDATE FORM =====
    $("#inventoryForm").on("submit", function (e) {
        e.preventDefault();
        var id = $("#inventoryId").val();
        var formData = new FormData($("#inventoryForm")[0]);
        var ajaxUrl = id ? "/inventory/" + id : "/inventory"; // url update jika ada id
        var ajaxType = id ? "POST" : "POST"; // Laravel bisa tetap POST, gunakan _method PATCH
        if (id) formData.append("_method", "PATCH"); // pakai patch untuk update di Laravel

        $.ajax({
            url: ajaxUrl,
            type: ajaxType,
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                $("#inventoryModal").modal("hide");
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
                url: "/inventory/" + id,
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
