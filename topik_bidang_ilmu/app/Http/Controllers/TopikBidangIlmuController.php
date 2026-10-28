<?php

namespace App\Http\Controllers;

use App\Models\TopikBidangIlmu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TopikBidangIlmuController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
        // Lindungi dengan auth, KECUALI index, create, dan store (biar publik bisa isi data)
        new Middleware('auth', except: ['index', 'create', 'store']),
        ];
    }

    //Read
    public function index()
    {
        $topik_bidang_ilmu = TopikBidangIlmu::all();
        return view('topik.index', compact('topik_bidang_ilmu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('topik.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
        'Rumpun_Ilmu' => 'required',
        'Pengelolaan_Taksonomi_Topik_Riset' => 'required',
        'Deskripsi_Fokus' => 'required',
        'Kata_Kunci_Penelitian' => 'required',
        ]);

        TopikBidangIlmu::create($request->all());

        return redirect()->route('topik.index')->with('success', 'Data topik berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topik = TopikBidangIlmu::findOrFail($id);
        return view('topik.edit', compact('topik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'Rumpun_Ilmu' => 'required',
        'Pengelolaan_Taksonomi_Topik_Riset' => 'required',
        'Deskripsi_Fokus' => 'required',
        'Kata_Kunci_Penelitian' => 'required',
        ]);

        $topik = TopikBidangIlmu::findOrFail($id);
        $topik->update($request->all());

        return redirect()->route('topik.index')->with('success', 'Data topik berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $topik = TopikBidangIlmu::findOrFail($id);
        $topik->delete();

        return redirect()->route('topik.index')->with('success', 'Data topik berhasil dihapus!');
    }
}