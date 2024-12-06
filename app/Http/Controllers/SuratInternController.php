<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratIntern;

class SuratInternController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'asc'); // Default sorting adalah ascending
        $column = $request->input('column', 'tanggal_masuk'); // Default column sorting
    
        $surats = SuratIntern::when($search, function ($query, $search) {
            // Pencarian pada semua kolom
            return $query->where(function ($query) use ($search) {
                $query->where('nomor_surat', 'like', "%{$search}%")
                      ->orWhere('perihal', 'like', "%{$search}%")
                      ->orWhere('dari', 'like', "%{$search}%")
                      ->orWhere('bendel', 'like', "%{$search}%")
                      ->orWhere('bagian', 'like', "%{$search}%")
                      ->orWhere('masuk_ke', 'like', "%{$search}%")
                      ->orWhere('tanggal_kembali', 'like', "%{$search}%")
                      ->orWhere('tanggal_masuk', 'like', "%{$search}%");
            });
        })
        ->orderBy($column, $sort) // Sorting dinamis berdasarkan kolom dan arah
        ->paginate(10)
        ->appends(['search' => $search, 'sort' => $sort, 'column' => $column]); // Menambahkan parameter ke pagination link
    
        return view('surat_intern.index', compact('surats', 'search', 'sort', 'column'));
    }
    

    public function create()
    {
        return view('surat_intern.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_masuk' => 'required|date',
            'bagian' => 'required|string',
            'dari' => 'required|string',
            'bendel' => 'required|string',
            'nomor_surat' => 'required|string',
            'perihal' => 'required|string',
            'masuk_ke' => 'required|string',
            'tanggal_kembali' => 'nullable|date',
        ]);

        SuratIntern::create($request->all());

        return redirect('/surat_intern')->with('status', 'Berhasil menambahkan surat intern!');
    }

    public function edit($id)
    {
        $surat = SuratIntern::findOrFail($id);
        return view('surat_intern.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_masuk' => 'required|date',
            'bagian' => 'required|string',
            'dari' => 'required|string',
            'bendel' => 'required|string',
            'nomor_surat' => 'required|string',
            'perihal' => 'required|string',
            'masuk_ke' => 'required|string',
            'tanggal_kembali' => 'nullable|date',
        ]);

        $surat = SuratIntern::findOrFail($id);
        $surat->update($request->all());

        return redirect('/surat_intern')->with('status', 'Berhasil mengubah surat intern!');
    }

    public function destroy($id)
    {
        SuratIntern::findOrFail($id)->delete();
        return redirect('/surat_intern')->with('status', 'Berhasil menghapus surat intern!');
    }
}
