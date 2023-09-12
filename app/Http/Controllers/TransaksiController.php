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
        $pesanan = Pesanan::all();
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
}
