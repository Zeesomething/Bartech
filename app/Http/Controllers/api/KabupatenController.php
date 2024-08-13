<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Kabupaten;
use Illuminate\Http\Request;
use Validator;

class KabupatenController extends Controller
{
    public function index()
    {
        $kabupatens = Kabupaten::latest()->get();
        $res = [
            'success' => true,
            'message' => 'Daftar kabupaten',
            'data' => $kabupatens
        ];

        return response()->json($res, 200);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama_kabupaten' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak valid',
                'errors' => $validate->errors(),
            ], 422);
        }

        try {
            $kabupatens = new Kabupaten();
            $kabupatens->nama_kabupaten = $request->nama_kabupaten;
            $kabupatens->save();

            return response()->json([
                'success' => true,
                'message' => 'Data kabupaten berhasil ditambah',
                'data' => $kabupatens,
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
