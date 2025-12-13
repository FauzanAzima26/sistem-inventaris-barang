$(document).ready(function () {
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
            { data: "satuan", className: "text-center" },
            {
                data: "harga_beli",
                render: $.fn.dataTable.render.number(",", ".", 0, "Rp"),
                className: "text-center",
            },
            {
                data: "image",
                render: function (data, type, row) {
                    var imgUrl = data
                        ? "/storage/images/" + data
                        : "/storage/images/default.jpg";
                    return `<img src="${imgUrl}" alt="${row.nama}" width="100" height="100">`;
                },
                className: "text-center",
            },
            {
                data: "id",
                render: (data, type, row) => {
                    // Jika editor, jangan tampilkan tombol apa pun
                    if (USER_ROLE === "editor") {
                        return "-"; // tampil tanda strip atau kosong
                    }

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
                        </div>
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
        $("#imagePreview").remove();
        $("#barangModal").modal("show"); // tampilkan modal
    });

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
    $("#barangForm").on("submit", function (e) {
        e.preventDefault();
        var id = $("#barangId").val();
        var formData = new FormData($("#barangForm")[0]);
        var ajaxUrl = id ? "/barang/" + id : "/barang"; // url update jika ada id
        var ajaxType = id ? "POST" : "POST"; // Laravel bisa tetap POST, gunakan _method PATCH
        if (id) formData.append("_method", "PATCH"); // pakai patch untuk update di Laravel

        $.ajax({
            url: ajaxUrl,
            type: ajaxType,
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                $("#barangModal").modal("hide");
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

    // ===== DELETE =====
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

    // ===== Baru saja dihapus =====

    // Saat tombol "Baru Saja Dihapus" diklik, buka modal & ambil data
    $("#btnSampahBarang").on("click", function () {
        $("#modalSampahBarang").modal("show");
        fetchSampahBarang();
    });

    function fetchSampahBarang() {
        $.ajax({
            url: "/barang/sampah",
            type: "GET",
            success: function (res) {
                let tbody = "";

                if (res.data && res.data.length > 0) {
                    res.data.forEach(function (item) {
                        let tanggalHapus = item.deleted_at
                            ? new Date(item.deleted_at).toLocaleString("id-ID")
                            : "-";

                        let userHapus = item.deleted_by
                            ? item.deleted_by.name
                            : "-";

                        tbody += `
                        <tr>
                            <td>${item.nama}</td>
                            <td>${tanggalHapus}</td>
                            <td>${userHapus}</td>
                            <td class="text-center">
                                <button class="btn btn-success btn-sm restore-btn" data-id="${item.id}">
                                    Restore
                                </button>
                                <button class="btn btn-danger btn-sm delete-btn" data-id="${item.id}">
                                    Hapus Permanen
                                </button>
                            </td>
                        </tr>
                    `;
                    });
                } else {
                    tbody = `
                    <tr>
                        <td colspan="4" class="text-center">
                            Tidak ada barang sampah
                        </td>
                    </tr>
                `;
                }

                $("#tableSampahBarang tbody").html(tbody);
            },
        });
    }

    // Restore
    $(document).on("click", ".restore-btn", function () {
        let id = $(this).data("id");

        $.ajax({
            url: `/barang/${id}/restore`,
            type: "POST",
            success: function (res) {
                alert(res.message);

                // refresh tabel sampah
                fetchSampahBarang();

                // 🔥 refresh tabel barang utama
                table.ajax.reload(null, false);

                // optional: tutup modal
                $("#modalSampahBarang").modal("hide");
            },
        });
    });

    // Force Delete
    $(document).on("click", ".delete-btn", function () {
        if (!confirm("Apakah yakin ingin menghapus permanen?")) return;

        let id = $(this).data("id");

        $.ajax({
            url: `/barang/${id}/force-delete`,
            type: "POST",
            data: {
                _method: "DELETE",
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (res) {
                if (res.success === false) {
                    alert(res.message);
                    return;
                }

                alert(res.message);
                fetchSampahBarang();
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    alert(xhr.responseJSON.message);
                } else {
                    alert("Terjadi kesalahan");
                }
            },
        });
    });
});
