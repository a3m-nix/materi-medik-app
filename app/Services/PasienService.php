<?php

namespace App\Services;

use App\Models\Pasien;

class PasienService
{
    public function store($pasienId, $value): Pasien
    {
        if ($pasienId == 10) {
            throw new \Exception("Error Processing Request", 1);
        }
        return Pasien::create($value);
    }

    public function findById($pasienId): Pasien
    {
        $pasien = Pasien::find($pasienId);
        if ($pasien == null) {
            throw new \Exception("Error Processing Request", 1);
        }
        return $pasien;
    }
}
