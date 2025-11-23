$(document).ready(function () {
    var url = $("#transaksiTable").data("url");
    var table = $("#transaksiTable").DataTable({
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
            { data: "kode_transaksi", className: "text-center" },
            {
                data: "tgl_transaksi",
                render: function (data) {
                    return data?.substring(0, 10);
                },
            },
            { data: "jenis_transaksi", className: "text-center" },
            { data: "total_item", className: "text-center" },
            { data: "keterangan" },

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
    $("#addTransaksi").on("click", function () {
        $("#transaksiForm")[0].reset(); // reset form
        $("#transaksiId").val(""); // hapus ID
        $("#transaksiModal .modal-title").text("Tambah Barang");
        $("#transaksiPreview").remove();
        $("#transaksiModal").modal("show"); // tampilkan modal
    });

    // Hitung subtotal otomatis
    function hitungSubtotal(row) {
        let jumlah = parseFloat(row.find('input[name="jumlah[]"]').val()) || 0;
        let harga =
            parseFloat(row.find('input[name="harga_satuan[]"]').val()) || 0;
        let subtotal = jumlah * harga;

        row.find('input[name="subtotal[]"]').val(subtotal);
    }

    // Event ketika user mengetik jumlah atau harga
    $(document).on(
        "input",
        'input[name="jumlah[]"], input[name="harga_satuan[]"]',
        function () {
            let row = $(this).closest(".item-row");
            hitungSubtotal(row);
        }
    );

    // ===== EDIT / OPEN MODAL =====
    $(document).on("click", ".editBtn", function () {
        var id = $(this).data("id");
        $.get("/barang/" + id, function (res) {
            var data = res.data ? res.data[0] : res;
            $("#barangId").val(data.id);
            $("#nama").val(data.nama);
            $("#kode_barang").val(data.kode_barang);
            $("#kategori_id").val(data.kategori_id);
            $("#harga_beli").val(data.harga_beli);
            $("#satuan").val(data.satuan);

            // Preview gambar
            if (data.image) {
                if ($("#imagePreview").length === 0) {
                    $("#image").after(
                        `<img id="imagePreview" src="/storage/images/${data.image}" class="img-thumbnail mt-2" width="100">`
                    );
                } else {
                    $("#imagePreview").attr(
                        "src",
                        "/storage/images/" + data.image
                    );
                }
            }

            $("#barangModal .modal-title").text("Edit Barang");
            $("#barangModal").modal("show");
        });
    });

    // ===== STORE / UPDATE FORM =====
    $("#transaksiForm").on("submit", function (e) {
        e.preventDefault();
        var id = $("#transaksiId").val();
        var formData = new FormData($("#transaksiForm")[0]);
        var ajaxUrl = id ? "/transaksi/" + id : "/transaksi"; // url update jika ada id
        var ajaxType = "POST"; // Laravel bisa tetap POST, gunakan _method PATCH
        if (id) formData.append("_method", "PATCH"); // pakai patch untuk update di Laravel

        $.ajax({
            url: ajaxUrl,
            type: ajaxType,
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                $("#transaksiModal").modal("hide");
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
                url: "/barang/" + id,
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
