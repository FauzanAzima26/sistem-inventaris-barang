$(document).ready(function () {
    let url = $("#userTable").data("url");

    $("#userTable").DataTable({
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
            { data: "name" },
            { data: "email" },
            {
                data: "role",
                className: "text-center",
                render: function (data) {
                    return `<span class="badge bg-info">${data}</span>`;
                },
            },
            {
                data: "created_at",
                className: "text-center",
                render: function (data) {
                    return data.substring(0, 10);
                },
            },
            {
                data: "id",
                className: "text-center",
                render: function (data) {
                    return `
                        <button class="btn btn-primary btn-sm editBtn" data-id="${data}">
                            <i class="ti ti-pencil"></i>
                        </button>
                        <button class="btn btn-danger btn-sm deleteBtn" data-id="${data}">
                            <i class="ti ti-trash"></i>
                        </button>
                    `;
                },
            },
        ],
    });

    $("#addUser").on("click", function () {
        $("#userForm")[0].reset();
        $("#userId").val("");
        $("#userModal .modal-title").text("Tambah User");
        $("#userModal").modal("show");
    });

    // ===== EDIT / OPEN MODAL =====
    $(document).on("click", ".editBtn", function () {
        var id = $(this).data("id");

        $.get("/managemen-user/" + id, function (res) {
            let data = res.data; // ⬅️ LANGSUNG OBJECT

            $("#userId").val(data.id);
            $("#name").val(data.name);
            $("#email").val(data.email);
            $("#role").val(data.role);

            $("#userModal .modal-title").text("Edit User");
            $("#userModal").modal("show");
        });
    });

    // ===== STORE / UPDATE USER =====
    $("#userForm").on("submit", function (e) {
        e.preventDefault();

        let id = $("#userId").val();
        let url = id ? `/managemen-user/${id}` : `/managemen-user`;
        let method = "POST";

        let data = $(this).serialize();

        if (id) {
            data += "&_method=PUT"; // Laravel update
        }

        $.ajax({
            url: url,
            type: method,
            data: data,
            success: function (res) {
                $("#userModal").modal("hide");
                $("#userTable").DataTable().ajax.reload(null, false);

                alert(res.message || "User berhasil disimpan");
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let msg = "";
                    $.each(xhr.responseJSON.errors, function (key, val) {
                        msg += val + "\n";
                    });
                    alert(msg);
                } else {
                    console.error(xhr.responseText);
                    alert("Terjadi kesalahan");
                }
            },
        });
    });

    $(document).on("click", ".deleteBtn", function () {
        let id = $(this).data("id");

        if (!confirm("Yakin ingin menghapus user ini?")) return;

        $.ajax({
            url: "/managemen-user/" + id,
            type: "DELETE",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (res) {
                $("#userTable").DataTable().ajax.reload();
                alert(res.message);
            },
            error: function (xhr) {
                alert(xhr.responseJSON?.message || "Gagal menghapus user");
            },
        });
    });

    // ===== Baru saja dihapus =====

    // Saat tombol "Baru Saja Dihapus" diklik, buka modal & ambil data
    $("#btnSampahUser").on("click", function () {
        $("#modalSampahUser").modal("show");
        fetchSampahUser();
    });

    function fetchSampahUser() {
        $.ajax({
            url: "/managemen-user/sampah",
            type: "GET",
            success: function (res) {
                let tbody = "";

                if (res.data && res.data.length > 0) {
                    res.data.forEach(function (item) {
                        tbody += `
                        <tr>
                            <td>${item.name}</td>
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
                        <td colspan="2" class="text-center">
                            Tidak ada user sampah
                        </td>
                    </tr>
                `;
                }

                // ✅ ID TABEL HARUS SESUAI
                $("#tableSampahUser tbody").html(tbody);
            },
            error: function () {
                alert("Gagal mengambil data sampah");
            },
        });
    }

    // Restore
    $(document).on("click", ".restore-btn", function () {
        let id = $(this).data("id");

        $.ajax({
            url: `/managemen-user/${id}/restore`,
            type: "POST",
            success: function (res) {
                alert(res.message);

                // refresh tabel sampah
                fetchSampahUser();

                // 🔥 refresh tabel barang utama
                $("#userTable").DataTable().ajax.reload(null, false);

                // optional: tutup modal
                $("#modalSampahUser").modal("hide");
            },
        });
    });

    // Force Delete
    $(document).on("click", ".delete-btn", function () {
        if (!confirm("Apakah yakin ingin menghapus permanen?")) return;

        let id = $(this).data("id");

        $.ajax({
            url: `/managemen-user/${id}/force-delete`,
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
                fetchSampahUser();
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
