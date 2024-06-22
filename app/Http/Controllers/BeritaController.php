<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Http\Requests\StoreBeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Beranda";
        $dataBerita = Berita::all();

        // Konversi paragraf_1 dari setiap berita ke HTML
        $dataBerita = $dataBerita->map(function ($berita) {
            $berita->paragraf_1 = convertMarkdownToHtml($berita->paragraf_1);
            return $berita;
        });

        return view('beranda', compact('title', 'dataBerita'));
    }

    public function indexContentBerita($id)
    {
        $title = "Informasi Terbaru";
        $berita = Berita::find($id);

        if ($berita) {
            // Konversi paragraf_1 dari berita ke HTML
            $berita->paragraf_1 = convertMarkdownToHtml($berita->paragraf_1);
        } else {
            // Tangani kasus jika berita tidak ditemukan
            return redirect()->route('beranda')->with('error', 'Berita tidak ditemukan.');
        }

        // Mengarahkan ke file blade card.blade.php di folder partials/card
        return view('card-content', compact('title', 'berita'));
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
    public function store(StoreBeritaRequest $request)
    {
        $request->validate([
            'gambar_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Atur batas ukuran sesuai kebutuhan
        ]);

        // Ambil file dari request
        $file = $request->file('gambar_thumbnail');

        // Simpan file ke direktori 'public/img/berita'
        $path = $file->store('img/berita', 'public');

        // Buat instance Berita baru dan simpan ke database
        $berita = new Berita();
        $berita->gambar_thumbnail = $path;
        $berita->save();

        // Redirect atau response sesuai kebutuhan aplikasi Anda
        return redirect()->route('filament.siaAdmin.resources.beritas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBeritaRequest $request, Berita $berita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        // Hapus file gambar jika ada sebelum menghapus dari database
        if ($berita->gambar_thumbnail) {
            Storage::disk('public')->delete($berita->gambar_thumbnail);
        }

        // Hapus berita dari database
        $berita->delete();

        // Redirect atau response sesuai kebutuhan aplikasi Anda
        return redirect()->route('filament.siaAdmin.resources.beritas.index');
    }
}
