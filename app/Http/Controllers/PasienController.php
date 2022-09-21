<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = request('q');
        if ($q == '') {
            $models = \App\Models\Pasien::latest()->paginate(50);
        } else {
            $models = \App\Models\Pasien::where('nama', 'like', '%' . $q . '%')->paginate(50);
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
        ]);
        \App\Models\Pasien::create($requestData);
        flash('Data sudah disimpan')->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'no_pasien' => 'required|unique:pasiens,no_pasien',
            'nama' => 'required',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
        ]);
        \App\Models\Pasien::create($requestData);
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
        //
    }
}
