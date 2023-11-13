<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class LaporanPasienController extends Controller
{
    public function index(Request $request)
    {
        $pasien = Pasien::query();
        if ($request->filled('tanggal_mulai')) {
            $pasien->whereDate('created_at', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_akhir')) {
            $pasien->whereDate('created_at', '<=', $request->tanggal_akhir);
        }

        if ($request->filled('jenis_kelamin') && $request->jenis_kelamin != 'semua') {
            $pasien->where('jenis_kelamin', $request->jenis_kelamin);
        }
        $data['models'] = $pasien->latest()->get();
        return view('laporan_pasien_index', $data);
    }

    public function create()
    {
        return view('laporan_pasien_form');
    }
}
