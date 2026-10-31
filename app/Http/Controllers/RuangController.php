<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function daftar()
    {
        $ruang = Ruang::orderByDesc('kode_ruang')->get();
        return view('ruang.daftar', compact('ruang'));
    }

    public function index()
    {
        return view('ruang.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_ruang' => 'required|max:50',
            'nama_ruang' => 'required|max:100',
            'no_gedung'  => 'required|max:50',
            'kapasitas'  => 'required|integer|min:1',
        ]);

        $fasilitas_array = [];
        if ($request->has('proyektor')) {
            $fasilitas_array[] = 'Proyektor';
        }
        if ($request->has('pc')) {
            $fasilitas_array[] = 'PC';
        }

        $fasilitas = implode(', ', $fasilitas_array);
        if (empty($fasilitas)) {
            $fasilitas = 'Tidak ada';
        }

        $data['fasilitas'] = $fasilitas;

        Ruang::create($data);

        return redirect()->route('ruang.daftar')->with('success', 'Data Berhasil disimpan!');
    }

    public function edit(Ruang $ruang)
    {
        return view('ruang.edit', compact('ruang'));
    }

    public function update(Request $request, Ruang $ruang)
    {
        $data = $request->validate([
            'kode_ruang' => 'required|max:50',
            'nama_ruang' => 'required|max:100',
            'no_gedung'  => 'required|max:50',
            'kapasitas'  => 'required|integer|min:1',
        ]);

        $fasilitas_array = [];
        if ($request->has('proyektor')) {
            $fasilitas_array[] = 'Proyektor';
        }
        if ($request->has('pc')) {
            $fasilitas_array[] = 'PC';
        }

        $fasilitas = implode(', ', $fasilitas_array);
        if (empty($fasilitas)) {
            $fasilitas = 'Tidak ada';
        }

        $data['fasilitas'] = $fasilitas;

        $ruang->update($data);

        return redirect()->route('ruang.daftar')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Ruang $ruang)
    {
        $ruang->delete();
        return redirect()->route('ruang.daftar')->with('success', 'Data berhasil dihapus!');
    }
}