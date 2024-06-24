<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Http\Requests\StorePrestasiRequest;
use App\Http\Requests\UpdatePrestasiRequest;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Prestasi";
        $dataPrestasi = Prestasi::orderBy('created_at', 'desc')->paginate(6);

        // Konversi paragraf_1 dari setiap prestasi ke HTML
        $dataPrestasi->map(function ($prestasi) {
            $prestasi->paragraf_1 = convertMarkdownToHtml($prestasi->paragraf_1);
            return $prestasi;
        });

        return view('Prestasi', compact('title', 'dataPrestasi'));
    }

    public function indexContentPrestasi($id)
    {
        $title = "Prestasi";
        $prestasi = Prestasi::find($id);

        if ($prestasi) {
            // Konversi paragraf_1 dari prestasi ke HTML
            $prestasi->paragraf_1 = convertMarkdownToHtml($prestasi->paragraf_1);
        } else {
            // Tangani kasus jika prestasi tidak ditemukan
            return redirect()->route('prestasi')->with('error', 'prestasi tidak ditemukan.');
        }

        // Mengarahkan ke file blade card.blade.php di folder partials/card
        return view('content.Prestasi', compact('title', 'prestasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrestasiRequest $request)
    {
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Atur batas ukuran sesuai kebutuhan
        ]);

        // Ambil file dari request
        $file = $request->file('thumbnail');

        // Simpan file ke direktori 'public/img/prestasi'
        $path = $file->store('img/prestasi', 'public');

        // Buat instance prestasi baru dan simpan ke database
        $prestasi = new Prestasi();
        $prestasi->thumbnail = $path;
        $prestasi->save();

        // Redirect atau response sesuai kebutuhan aplikasi Anda
        return redirect()->route('filament.siaAdmin.resources.prestasis.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestasi $prestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestasi $prestasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrestasiRequest $request, Prestasi $prestasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestasi $prestasi)
    {
        //
    }
}
