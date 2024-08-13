<?php
namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use PDF;

class KecamatanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $kecamatan = Kecamatan::with('kabupaten')->get();
        return view('kecamatan.index', compact('kecamatan'));
    }

    public function create()
    {
        $kabupaten = Kabupaten::all();
        return view('kecamatan.create', compact('kabupaten'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kecamatan' => 'required|string',
            'id_kabupaten' => 'required|exists:kabupatens,id',
        ]);

        $existingKecamatan = Kecamatan::where('nama_kecamatan', $request->nama_kecamatan)
            ->where('id_kabupaten', $request->id_kabupaten)
            ->first();

        if ($existingKecamatan) {
            return redirect()->back()->withErrors(['duplikasi' => 'Duplikasi data kecamatan pada kabupaten yang sama.'])->withInput();
        }

        $kecamatan = Kecamatan::create($request->all());
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kabupaten = Kabupaten::all();
        $kecamatan = Kecamatan::findOrFail($id);
        return view('kecamatan.edit', compact('kecamatan', 'kabupaten'));
    }

    public function update(Request $request, Kecamatan $kecamatan)
    {
        $request->validate([
            'nama_kecamatan' => 'required|max:100',
            'id_kabupaten' => 'required|exists:kabupatens,id',
        ]);

        $existingKecamatan = Kecamatan::where('nama_kecamatan', $request->nama_kecamatan)
            ->where('id_kabupaten', $request->id_kabupaten)
            ->where('id', '!=', $kecamatan->id)
            ->first();

        if ($existingKecamatan) {
            return redirect()->back()->withErrors(['duplikasi' => 'Duplikasi data kecamatan pada kabupaten yang sama.'])->withInput();
        }

        $kecamatan->update($request->all());
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil diupdate.');
    }

    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil dihapus.');
    }

    // public function report()
    // {
    //     $kecamatan = Kecamatan::with('kabupaten')->get();
    //     $pdf = PDF::loadView('kecamatan.report', compact('kecamatans'));
    //     return $pdf->download('laporan_kecamatan.pdf');
    // }
}
