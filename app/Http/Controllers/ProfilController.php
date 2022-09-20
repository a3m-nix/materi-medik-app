<?php

namespace App\Http\Controllers;

class ProfilController extends Controller
{
    public function index()
    {
        return "halo, saya adalah fungsi index dalam ProfilController.";
    }

    public function create()
    {
        return "halo, saya adalah fungsi CREATE dalam ProfilController.";
    }

    public function edit($nama, $id)
    {
        return "Halo, nama saya $nama $id";
    }
}
