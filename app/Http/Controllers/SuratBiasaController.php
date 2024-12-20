<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratBiasa;

class SuratBiasaController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan input pencarian, filter, dan sort
        $search = $request->input('search');
        $sort = $request->input('sort', 'asc'); // Default sorting adalah ascending
        $column = $request->input('column', 'tanggal_masuk'); // Default sorting column
    
        // Query untuk memfilter dan mengurutkan data surat
        $surats = SuratBiasa::when($search, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                // Pencarian pada semua atribut
                $query->where('nomor_surat', 'like', "%{$search}%")
                      ->orWhere('pengirim', 'like', "%{$search}%")
                      ->orWhere('perihal', 'like', "%{$search}%")
                      ->orWhere('bendel', 'like', "%{$search}%")
                      ->orWhere('kepada', 'like', "%{$search}%")
                      ->orWhere('disposisi', 'like', "%{$search}%")
                      ->orWhere('tindak_lanjut', 'like', "%{$search}%")
                      ->orWhere('tanggal_masuk', 'like', "%{$search}%")
                      ->orWhere('tanggal_keluar', 'like', "%{$search}%")
                      ->orWhere('tanggal_penyelesaian', 'like', "%{$search}%");
            });
        })
        ->orderBy($column, $sort) // Sorting dinamis berdasarkan kolom dan arah
        ->paginate(10)
        ->appends(['search' => $search, 'sort' => $sort, 'column' => $column]); // Menyimpan parameter ke link pagination
    
        // Mengirimkan data ke view
        return view('surat_biasa.index', compact('surats', 'search', 'sort', 'column'));
    }    

    public function create()
    {
        return view('surat_biasa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_masuk' => 'required|date',
            'no_reg' => 'required|string',
            'bendel' => 'required|string',
            'pengirim' => 'required|string',
            'nomor_surat' => 'required|string',
            'perihal' => 'required|string',
            'kepada' => 'required|string',
            'tanggal_keluar' => 'nullable|date',
            'disposisi' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
            'tanggal_penyelesaian' => 'nullable|date',
        ]);

        SuratBiasa::create($request->all());

        return redirect('/surat_biasa')->with('status', 'Berhasil menambahkan surat!');
    }

    public function edit($id)
    {
        $surat = SuratBiasa::findOrFail($id);
        return view('surat_biasa.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_masuk' => 'required|date',
            'no_reg' => 'required|string',
            'bendel' => 'required|string',
            'pengirim' => 'required|string',
            'nomor_surat' => 'required|string',
            'perihal' => 'required|string',
            'kepada' => 'required|string',
            'tanggal_keluar' => 'nullable|date',
            'disposisi' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
            'tanggal_penyelesaian' => 'nullable|date',
        ]);

        $surat = SuratBiasa::findOrFail($id);
        $surat->update($request->all());

        return redirect('/surat_biasa')->with('status', 'Berhasil mengubah surat!');
    }

    public function destroy($id)
    {
        SuratBiasa::findOrFail($id)->delete();
        return redirect('/surat_biasa')->with('status', 'Berhasil menghapus surat!');
    }
}
