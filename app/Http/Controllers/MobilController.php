<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mobil;
class MobilController extends Controller
{
    public function index(Request $request)
    {
        $query = Mobil::latest();

        if ($request->has('merk') && $request->merk != '') {
            $query->where('merk', $request->merk);
        }

        $mobils = $query->paginate(10)->withQueryString();
        return view('mobil.index', compact('mobils'));
    }
    public function create()
    {
        return view('mobil.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_mobil'      => 'required|string|max:100',
            'merk'            => 'required|string|max:100',
            'nomor_plat'      => 'required|string|unique:mobils',
            'tahun'           => 'required|integer',
            'kapasitas'       => 'required|integer',
            'harga_sewa'      => 'required|numeric',
            'status'          => 'required|in:tersedia,disewa,tidak_tersedia',
            'jenis_kendaraan' => 'required|in:mobil_penumpang,pickup,truck,minibus,suv',
            'transmisi'       => 'required|in:manual,otomatis',
            'jenis_bbm'       => 'required|in:bensin,solar,listrik,hybrid',
            'kondisi'         => 'required|in:sangat_baik,baik,cukup,kurang',
        ]);
        Mobil::create($request->all());
        return redirect()->route('mobil.index')
                         ->with('success', 'Data mobil berhasil ditambahkan!');
    }
    public function edit(Mobil $mobil)
    {
        return view('mobil.edit', compact('mobil'));
    }
    public function update(Request $request, Mobil $mobil)
    {
        $request->validate([
            'nama_mobil'      => 'required|string|max:100',
            'merk'            => 'required|string|max:100',
            'nomor_plat'      => 'required|string|unique:mobils,nomor_plat,' . $mobil->id,
            'tahun'           => 'required|integer',
            'kapasitas'       => 'required|integer',
            'harga_sewa'      => 'required|numeric',
            'status'          => 'required|in:tersedia,disewa,tidak_tersedia',
            'jenis_kendaraan' => 'required|in:mobil_penumpang,pickup,truck,minibus,suv',
            'transmisi'       => 'required|in:manual,otomatis',
            'jenis_bbm'       => 'required|in:bensin,solar,listrik,hybrid',
            'kondisi'         => 'required|in:sangat_baik,baik,cukup,kurang',
        ]);
        $mobil->update($request->all());
        return redirect()->route('mobil.index')
                         ->with('success', 'Data mobil berhasil diperbarui!');
    }
    public function destroy(Mobil $mobil)
    {
        $mobil->delete();
        return redirect()->route('mobil.index')
                         ->with('success', 'Data mobil berhasil dihapus!');
    }
}
