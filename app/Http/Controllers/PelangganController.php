<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::latest()->paginate(10);
        return view('pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'nik'            => 'required|string|unique:pelanggans|max:16',
            'no_telepon'     => 'required|string|max:15',
            'email'          => 'nullable|email',
            'alamat'         => 'required|string',
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')
                         ->with('success', 'Data pelanggan berhasil ditambahkan!');
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'nik'            => 'required|string|max:16|unique:pelanggans,nik,' . $pelanggan->id,
            'no_telepon'     => 'required|string|max:15',
            'email'          => 'nullable|email',
            'alamat'         => 'required|string',
        ]);

        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index')
                         ->with('success', 'Data pelanggan berhasil diperbarui!');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')
                         ->with('success', 'Data pelanggan berhasil dihapus!');
    }
}
