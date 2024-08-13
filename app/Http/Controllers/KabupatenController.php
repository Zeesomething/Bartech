<?php
namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;
use PDF;

class KabupatenController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $kabupaten = Kabupaten::all();
        return view('kabupaten.index', compact('kabupaten'));
    }

    public function create()
    {
        return view('kabupaten.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kabupaten' => 'required|unique:kabupatens|max:100',
        ]);

        $kabupaten = Kabupaten::create($request->all());
        return redirect()->route('kabupaten.index')->with('success', 'Kabupaten berhasil ditambahkan.');
    }

    public function edit(Kabupaten $kabupaten)
    {
        return view('kabupaten.edit', compact('kabupaten'));
    }

    public function update(Request $request, Kabupaten $kabupaten)
    {
        $request->validate([
            'nama_kabupaten' => 'required|unique:kabupatens,nama_kabupaten,' . $kabupaten->id_kabupaten . '|max:100',
        ]);

        $kabupaten->update($request->all());
        return redirect()->route('kabupaten.index')->with('success', 'Kabupaten berhasil diupdate.');
    }

    public function destroy(Kabupaten $kabupaten)
    {
        $kabupaten->delete();
        return redirect()->route('kabupaten.index')->with('success', 'Kabupaten berhasil dihapus.');
    }

    public function report()
    {
        $kabupatens = Kabupaten::all();
        $pdf = PDF::loadView('kabupaten.report', compact('kabupatens'));
        return $pdf->download('laporan_kabupaten.pdf');
    }
}
