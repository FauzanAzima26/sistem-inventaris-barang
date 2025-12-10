<?php

namespace App\Http\Controllers\backend;

use Mpdf\Mpdf;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\TransaksiItem;
use App\Http\Controllers\Controller;

class laporanStokController extends Controller
{
    public function index()
    {
        return view('backend.laporan.stok');
    }

    /**
     * FUNCTION: Generate Data Stok (DIPAKAI GETDATA & PDF)
     */
    private function getStokArray()
    {
        $barang = Barang::with('kategori')->get();
        $result = [];

        foreach ($barang as $b) {
            $stokMasuk = TransaksiItem::where('barang_id', $b->id)
                ->whereHas(
                    'header',
                    fn($q) =>
                    $q->where('jenis_transaksi', 'masuk')
                )
                ->sum('jumlah');

            $stokKeluar = TransaksiItem::where('barang_id', $b->id)
                ->whereHas(
                    'header',
                    fn($q) =>
                    $q->where('jenis_transaksi', 'keluar')
                )
                ->sum('jumlah');

            $result[] = [
                'kode_barang'  => $b->kode_barang,
                'nama_barang'  => $b->nama,
                'kategori'     => $b->kategori->nama ?? '-',
                'harga_satuan' => $b->harga_beli ?? 0,
                'stok_masuk'   => $stokMasuk,
                'stok_keluar'  => $stokKeluar,
                'stok_akhir'   => max(0, $stokMasuk - $stokKeluar),
                'satuan'       => $b->satuan ?? '-',
            ];
        }

        return $result;
    }

    /**
     * API JSON untuk DataTable
     */
    public function getData()
    {
        return response()->json([
            'data' => $this->getStokArray()
        ]);
    }

    /**
     * EXPORT PDF menggunakan mPDF
     */
    public function exportPdf()
    {
        $data = $this->getStokArray();

        if (empty($data)) {
            return back()->with('error', 'Data stok kosong!');
        }

        $html = view('backend.laporan.stok_pdf', compact('data'))->render();

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4-L',
            'default_font' => 'dejavusans',
            'margin_top' => 10,
            'margin_bottom' => 10,
        ]);

        $mpdf->WriteHTML($html);

        return $mpdf->Output('laporan_stok.pdf', 'I');
    }
}
