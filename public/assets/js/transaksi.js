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

    // Tambah item baru
    $("#addItem").click(function () {
        // clone baris pertama item-row
        let template = $(".item-row").first().clone();

        // reset isi
        template.find("select").val("");
        template.find("input").val("");

        $("#itemWrapper").append(template);
    });

    // Hapus baris item
    $(document).on("click", ".removeItem", function () {
        if ($(".item-row").length > 1) {
            $(this).closest(".item-row").remove();
        }
    });

    // ===== EDIT / OPEN MODAL =====
    $(document).on("click", ".editBtn", function () {
        let id = $(this).data("id");

        $.get("/transaksi/" + id, function (res) {
            console.log("RAW:", res);

            // Jika API mengembalikan {data: {...}}
            let data = res.data ?? res;

            // Pastikan items tidak undefined
            let items = data.items ?? [];

            // ==== Isi header ====
            $("#transaksiId").val(data.id);
            $("#jenis_transaksi").val(data.jenis_transaksi);
            $("#tgl_transaksi").val(data.tgl_transaksi?.substring(0, 10));
            $("#keterangan").val(data.keterangan);

            // ==== Bersihkan item lama ====
            $("#itemWrapper").empty();

            // ==== Generate item ====
            items.forEach((item) => {
                $("#itemWrapper").append(`
                <div class="item-row mb-3 p-3 border rounded">
                    <div class="row g-2">

                        <div class="col-md-4">
                            <label>Barang</label>
                            <select name="barang_id[]" class="form-control" required>
                                <option value="">-- Pilih Barang --</option>
                                ${window.allBarangs
                                    .map(
                                        (b) =>
                                            `<option value="${b.id}" ${
                                                b.id == item.barang_id
                                                    ? "selected"
                                                    : ""
                                            }>${b.nama}</option>`
                                    )
                                    .join("")}
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah[]" value="${
                                item.jumlah
                            }" class="form-control" required>
                        </div>

                        <div class="col-md-3">
                            <label>Harga Satuan</label>
                            <input type="number" name="harga_satuan[]" value="${
                                item.harga_satuan
                            }" class="form-control" required>
                        </div>

                        <div class="col-md-3 d-flex align-items-end">
                            <button type="button" class="btn btn-danger btn-sm removeItem">
                                <i class="ti ti-input-x"></i>
                            </button>
                        </div>

                    </div>
                </div>
            `);
            });

            // ==== Tampilkan modal ====
            $("#transaksiModal .modal-title").text("Edit Transaksi");
            $("#transaksiModal").modal("show"); // Bootstrap 4

            // Jika Bootstrap 5:
            // new bootstrap.Modal(document.getElementById('transaksiModal')).show();
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

    // ===== VIEW DETAIL =====
    $(document).on("click", ".viewBtn", function () {
        let id = $(this).data("id");

        $.get("/transaksi/" + id, function (res) {
            let data = res.data;

            // Isi informasi header
            $("#detail_kode").text(data.kode_transaksi);
            $("#detail_jenis").text(data.jenis_transaksi);
            $("#detail_tanggal").text(data.tgl_transaksi.substring(0, 10));
            $("#detail_keterangan").text(data.keterangan);

            // Bersihkan item sebelumnya
            $("#detailItemWrapper").empty();

            // Loop items
            data.items.forEach((item) => {
                $("#detailItemWrapper").append(`
                <div class="item-row mb-3 p-3 border rounded">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <label>Barang</label>
                            <div>${item.barang?.nama ?? "-"}</div>
                        </div>
                        <div class="col-md-2">
                            <label>Jumlah</label>
                            <div>${item.jumlah}</div>
                        </div>
                        <div class="col-md-3">
                            <label>Harga Satuan</label>
                            <div>Rp ${new Intl.NumberFormat("id-ID").format(
                                item.harga_satuan
                            )}</div>
                        </div>
                        <div class="col-md-3">
                            <label>Subtotal</label>
                            <div>Rp ${new Intl.NumberFormat("id-ID").format(
                                item.subtotal
                            )}</div>
                        </div>
                    </div>
                </div>
            `);
            });

            // Tampilkan modal
            $("#detailModal").modal("show");
        });
    });

    $(document).on("click", ".deleteBtn", function (e) {
        e.preventDefault();
        var id = $(this).data("id");

        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            $.ajax({
                url: "/transaksi/" + id,
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
