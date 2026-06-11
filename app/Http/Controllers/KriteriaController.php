<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('kriteria.index', compact('kriterias'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required|string|max:100',
            'jenis'         => 'required|in:benefit,cost',
            'bobot'         => 'required|numeric|min:1|max:100',
        ]);

        Kriteria::create($request->all());

        return redirect()->route('kriteria.index')
                         ->with('success', 'Kriteria berhasil ditambahkan!');
    }

    public function edit(Kriteria $kriteria)
    {
        return view('kriteria.edit', compact('kriteria'));
    }

public function update(Request $request, Kriteria $kriteria)
{
    $validated = $request->validate([
        'nama_kriteria' => 'required|string|max:100',
        'jenis'         => 'required|in:benefit,cost',
        'bobot'         => 'required|numeric|min:1|max:100',
    ]);

    $kriteria->update($validated);

    return redirect()->route('kriteria.index')
                     ->with('success', 'Kriteria berhasil diperbarui!');
}
    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect()->route('kriteria.index')
                         ->with('success', 'Kriteria berhasil dihapus!');
    }
}
