<?php

namespace App\Http\Controllers;

use App\Services\PasienService;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth.admin')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = \App\Models\Pasien::latest()->paginate(50);
        if (request()->wantsJson()) {
            return response()->json($models);
        }
        return view('pasien_index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['model'] = new \App\Models\Pasien();
        $data['method'] = 'POST';
        $data['route'] = 'pasien.store';
        $data['namaTombol'] = 'SIMPAN';
        return view('pasien_form', $data);
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
            'no_pasien' => 'required|unique:pasiens,no_pasien',
            'nama' => 'required',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        $pathFoto = null;
        if ($request->hasFile('foto')) {
            $pathFoto = $request->file('foto')->store('public');
        }
        $model = new \App\Models\Pasien($requestData);
        $model->foto = $pathFoto;
        $model->save();
        if (request()->wantsJson()) {
            return response()->json($model);
        }
        flash('Data sudah disimpan')->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PasienService $pasienService, $id)
    {

        try {
            $model = $pasienService->findById($id);
        } catch (\Exception $ex) {
            abort(404, 'Data tidak ada');
        }
        return view('pasien_show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['model'] = \App\Models\Pasien::findOrFail($id);
        $data['method'] = 'PUT';
        $data['route'] = ['pasien.update', $id];
        $data['namaTombol'] = 'UPDATE';
        return view('pasien_form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'no_pasien' => 'required|unique:pasiens,no_pasien,' . $id,
            'nama' => 'required',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        //cari data yang akan diubah
        $model = \App\Models\Pasien::findOrFail($id);
        //isi data model dengan data yang akan diupdate
        $model->fill($requestData);
        if ($request->hasFile('foto')) {
            //hapus foto lama
            \Storage::delete($model->foto);
            $pathFoto = $request->file('foto')->store('public');
            $model->foto = $pathFoto;
        }
        $model->save();
        flash('Data sudah disimpan')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = \App\Models\Pasien::findOrFail($id);
        if ($pasien->daftar->count() >= 1) {
            flash('Data tidak bisa dihapus karena sudah ada transaksi')->error();
            return back();
        }
        flash('Data sudah dihapus')->success();
        return back();
    }
}
