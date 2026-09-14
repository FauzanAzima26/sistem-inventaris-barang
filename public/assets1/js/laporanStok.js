$(document).ready(function () {
    let table = $("#kategoriTable").DataTable({
        processing: true,
        serverSide: false, // karena datanya dari array, bukan paginate DB
        ajax: {
            url: "/laporan-stok/data",
            type: "GET",
            dataSrc: "data"
        },
        columns: [
            { data: "kode_barang", className: "text-center" },
            { data: "nama_barang" },
            { data: "kategori", className: "text-center" },

            {   // FORMAT RUPIAH
                data: "harga_satuan",
                className: "text-end",
                render: function (data) {
                    return "Rp " + Number(data).toLocaleString("id-ID");
                }
            },

            { data: "stok_masuk", className: "text-center" },
            { data: "stok_keluar", className: "text-center" },

            {
                data: "stok_akhir",
                className: "text-center fw-bold",
            },

            { data: "satuan", className: "text-center" },

            {   // TOMBOL AKSI
                data: null,
                className: "text-center",
                render: function () {
                    return `
                        <button class="btn btn-sm btn-info btn-detail">
                            Detail
                        </button>
                    `;
                }
            }
        ]
    });
});
