<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilPanen;

class PanenController extends Controller
{
    public function index()
    {
        // Mengambil seluruh data dari tabel hasil_panens
        $dataPanen = HasilPanen::all();

        // Mengirim data ke View
        return view('panen.index', compact('dataPanen'));
    }

    public function create()
    {
        return view('panen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_komoditas' => 'required',
            'jumlah_kg' => 'required|numeric',
        ]);

        HasilPanen::create([
            'nama_komoditas' => $request->nama_komoditas,
            'jumlah_kg' => $request->jumlah_kg,
            'tanggal_panen' => $request->tanggal_panen,
        ]);

        return redirect('/data-panen');
    }
}