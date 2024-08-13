<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatans = Kecamatan::latest()->get();
        return response()->json([
            'success' => true,
            'message' => 'Daftar kecamatan',
            'data' => $kecamatans,
        ], 200);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama_kecamatan' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak valid',
                'errors' => $validate->errors(),
            ], 422);
        }

        try {
            $kecamatan = new Kecamatan();
            $kecamatan->nama_kecamatan = $request->nama_kecamatan;
            $kecamatan->id_kabupaten = $request->id_kabupaten;
            $kecamatan->save();

            return response()->json([
                'success' => true,
                'message' => 'Data kecamatan berhasil ditambah',
                'data' => $kecamatans,
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan',
                'data' => $e->getMessage(),
            ], 500);
        }
    }

}
