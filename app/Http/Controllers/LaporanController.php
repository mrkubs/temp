<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetails;
use App\Models\Transaction;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function pesanan(Request $request)
    {
        if (isset($request->bulan)) {
            $pesanan = PesananDetails::whereMonth('created_at', $request->bulan)
                ->whereYear('created_at', $request->tahun)->get();
            $bulantahun = date('F', mktime(0, 0, 0, $request->bulan, 10)) . " " .  $request->tahun;
            return view('admin.laporan.pesanan', compact('pesanan', 'bulantahun'));
        }
    }
    public function transaksi(Request $request)
    {
        if (isset($request->bulan)) {
            $transaksi = Transaction::whereMonth('created_at', $request->bulan)
                ->whereYear('created_at', $request->tahun)->get();
            $bulantahun = date('F', mktime(0, 0, 0, $request->bulan, 10)) . " " .  $request->tahun;
            return view('admin.laporan.transaksi', compact('transaksi', 'bulantahun'));
        }
    }
}
