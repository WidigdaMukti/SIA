<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use App\Http\Requests\StoreEkstrakulikulerRequest;
use App\Http\Requests\UpdateEkstrakulikulerRequest;

class EkstrakulikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Ekstrakulikuler";
        $dataEkskul = Ekstrakulikuler::orderBy('created_at', 'desc')->paginate(6);

        // Konversi paragraf_1 dari setiap ekskul ke HTML
        $dataEkskul->map(function ($ekskul) {
            $ekskul->paragraf_1 = convertMarkdownToHtml($ekskul->paragraf_1);
            return $ekskul;
        });

        return view('Ekstrakulikuler', compact('title', 'dataEkskul'));
    }

    public function indexContentEkskul($id)
    {
        $title = "Ekstrakulikuler";
        $ekskul = Ekstrakulikuler::find($id);

        if ($ekskul) {
            // Konversi paragraf_1 dari ekskul ke HTML
            $ekskul->paragraf_1 = convertMarkdownToHtml($ekskul->paragraf_1);
        } else {
            // Tangani kasus jika ekskul tidak ditemukan
            return redirect()->route('ekskul')->with('error', 'ekstrakulikuler tidak ditemukan.');
        }

        // Mengarahkan ke file blade card.blade.php di folder partials/card
        return view('content.Ekstrakulikuler', compact('title', 'ekskul'));
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
    public function store(StoreEkstrakulikulerRequest $request)
    {
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Atur batas ukuran sesuai kebutuhan
        ]);

        // Ambil file dari request
        $file = $request->file('thumbnail');

        // Simpan file ke direktori 'public/img/ekskul'
        $path = $file->store('img/ekskul', 'public');

        // Buat instance ekskul baru dan simpan ke database
        $ekskul = new Ekstrakulikuler();
        $ekskul->thumbnail = $path;
        $ekskul->save();

        // Redirect atau response sesuai kebutuhan aplikasi Anda
        return redirect()->route('filament.siaAdmin.resources.ekstrakulikulers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ekstrakulikuler $ekstrakulikuler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ekstrakulikuler $ekstrakulikuler)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEkstrakulikulerRequest $request, Ekstrakulikuler $ekstrakulikuler)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ekstrakulikuler $ekstrakulikuler)
    {
        //
    }
}
