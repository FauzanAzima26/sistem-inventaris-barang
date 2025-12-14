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
});
