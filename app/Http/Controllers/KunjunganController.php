<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class KunjunganController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            //new Middleware('permission:manage kunjungan', except: ['destroy']),
            //new Middleware('permission:delete kunjungan', only: ['destroy']),
        ];
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $kunjungans = kunjungan::when($search, function ($query, $search) {
            $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('kode_tamu', 'like', '%' . $search . '%')
                    ->orWhere('kontak', 'like', '%' . $search . '%');
        })->orderBy('kode_tamu', 'desc')->paginate()->withQueryString();

        return view('kunjungan.index', compact('kunjungans'));
    }

    public function create()
    {
        $kunjungan = new kunjungan();

        return view('kunjungan.create', compact('kunjungan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'instansi' => 'string|max:255',
            'keperluan' => 'string',
        ]);
        Kunjungan::create([
            'tanggal' => $request->tanggal,
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'instansi' => $request->instansi,
            'keperluan' => $request->keperluan,
        ]);
        return redirect()->route('kunjungan.index')->with('success', 'Kunjungan berhasil dicatat!');
    }

    public function show(Kunjungan $kunjungan)
    {
        return view('kunjungan.show', compact('kunjungan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kunjungan $kunjungan)
    {
        return view('kunjungan.edit', compact('kunjungan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kunjungan $kunjungan)
    {
        $validated = $request->validate([
        'tanggal' => 'required|date',
        'nama' => 'required|string|max:255',
        'kontak' => 'required|string|max:255',
        'instansi' => 'required|string|max:255',
        'keperluan' => 'required|string',
    ]);

    $kunjungan->update($validated);


return redirect()->route('kunjungan.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kunjungan = Kunjungan::findOrFail($id);
        $kunjungan->delete();

        return redirect()->route('kunjungan.index')->with('success', 'Data Kunjungan berhasil dihapus.');
    }
}
