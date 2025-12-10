$(document).ready(function () {
    let table = $("#kategoriTable").DataTable({
        ajax: "/api/laporan-transaksi",
        processing: true,
        columns: [
            { data: "kode_transaksi" },
            {
                data: "tgl_transaksi",
                render: function (data) {
                    return data?.substring(0, 10);
                },
            },
            { data: "jenis_transaksi" },
            { data: "total_item" },

            // TOTAL NILAI TRANSAKSI
            {
                data: "total_nilai",
                render: function (value) {
                    value = Number(value) || 0; // pastikan angka
                    return "Rp " + value.toLocaleString("id-ID");
                },
            },

            // Aksi
            {
                data: null,
                render: function (data, type, row) {
                    return `
            <button class="btn btn-warning btn-sm viewBtn" data-id="${row.uuid}">
                <i class="ti ti-eye"></i>
            </button>

            <button class="btn btn-danger btn-sm"
                onclick="window.open('/laporan-transaksi/${row.uuid}/pdf', '_blank')">
                <i class="ti ti-download"></i>
            </button>
            `;
                },
            },
        ],
    });
});

$(document).on("click", ".viewBtn", function () {
    let id = $(this).data("id");

    $.ajax({
        url: "/laporan-transaksi/" + id,
        type: "GET",
        success: function (res) {
            // --- FLEXIBLE HANDLING ---
            let data = res.data ?? res; // jika res.data ada → pakai, jika tidak → pakai res langsung

            if (!data.items) {
                console.error(
                    "❌ ERROR: items tidak ditemukan di respons.",
                    data
                );
                alert("Format data dari server tidak sesuai (items tidak ada)");
                return;
            }

            // === Header Detail ===
            $("#detail_no").text(data.kode_transaksi);
            $("#detail_tanggal").text(data.tgl_transaksi);
            $("#detail_jenis").text(data.jenis_transaksi);
            $("#detail_keterangan").text(data.keterangan);
            $("#detail_total").text(
                "Rp " + Number(data.total_nilai).toLocaleString("id-ID")
            );

            // === Items ===
            let rows = "";
            data.items.forEach((item, i) => {
                rows += `
        <tr>
            <td class="text-center">${i + 1}</td>
            <td>${item.barang.nama}</td>
            <td class="text-center">${item.barang.kode_barang}</td>
            <td class="text-center">${item.jumlah}</td>

            <td class="text-end">
                Rp ${Number(item.harga_satuan).toLocaleString("id-ID")}
            </td>

            <td class="text-end">
                Rp ${Number(item.subtotal).toLocaleString("id-ID")}
            </td>
        </tr>
    `;
            });

            $("#detailItemTable tbody").html(rows);

            $("#detailModal").modal("show");
        },
    });
});
