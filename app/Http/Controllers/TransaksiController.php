<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaction::all();
        $pesanan = Pesanan::where('status', '!=', 'success')->get();
        return view('admin.transaksi.index', [
            'transaksi' => $transaksi,
            'pesanan' => $pesanan,
            'title' => 'Transaksi'
        ]);
    }
    public function update(Request $request, string $id)
    {
        $transaksi = Transaction::findOrFail($id);
        $transaksi->update([
            'status' => $request->status
        ]);
        return redirect()->back()->with('success', 'Status transaksi berhasil diubah');
    }
    public function store(Request $request)
    {
        try {

            $transaksi = new Transaction;
            $transaksi->pesanan_id = $request->pesanan_id;
            $transaksi->total_bayar = $request->total_bayar;
            $transaksi->jumlah_bayar = $request->jumlah_bayar;
            $transaksi->kembalian = $request->kembalian;
            $transaksi->status = $request->status;
            $transaksi->save();
            return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan');
        } catch (\Throwable $th) {
            // tampilkan error
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
