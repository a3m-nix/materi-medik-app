<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = \App\Models\Daftar::with('pasien')->latest()->paginate(50);
        return view('daftar_index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pasien'] = \App\Models\Pasien::pluck('nama', 'id');
        $data['poli'] = [
            'umum' => 'Umum',
            'gigi' => 'Gigi',
            'kandungan' => 'Kandungan',
            'anak' => 'Anak',
            'bedah' => 'Bedah',
        ];
        $data['model'] = new \App\Models\Daftar();
        $data['method'] = 'POST';
        $data['route'] = 'daftar.store';
        $data['namaTombol'] = 'SIMPAN';
        return view('daftar_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'tanggal_daftar' => 'required',
            'pasien_id' => 'required',
            'poli' => 'required',
            'keluhan' => 'required',
        ]);
        $model = new \App\Models\Daftar();
        $model->fill($requestData);
        $model->status_daftar = 'baru';
        $model->save();
        flash('Data berhasil disimpan')->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['daftar'] = \App\Models\Daftar::findOrFail($id);
        return view('daftar_show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'tindakan' => 'required',
            'diagnosis' => 'required',
        ]);
        $daftar = \App\Models\Daftar::findOrFail($id);
        $daftar->fill($requestData);
        $daftar->status_daftar = 'selesai';
        $daftar->save();
        flash('Data berhasil disimpan')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $daftar = \App\Models\Daftar::findOrFail($id);
        $daftar->delete();
        flash('Data berhasil dihapus');
        return back();
    }
}
