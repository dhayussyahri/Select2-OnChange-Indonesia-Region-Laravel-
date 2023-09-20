<?php

namespace App\Http\Controllers;

use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\Regencie;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $province = Province::all();
        return view('index', compact('province'), [
            'title' => 'Select2 Onchange'
        ]);
    }

    public function getDataKotaByProfinsi(string $id)
    {
        $kota = Regencie::where('province_id', $id)->get();

        return response()->json($kota);
    }

    public function getDataKelurahanByKota(string $id)
    {
        $kelurahan = District::where('regency_id', $id)->get();

        return response()->json($kelurahan);
    }

    public function getDataKecamatanByKelurahan(string $id)
    {
        $kecamatan = Village::where('district_id', $id)->get();

        return response()->json($kecamatan);
    }
}
