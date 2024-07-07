<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreSiswaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaRequest $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        //
    }

    public function getDataSiswa()
    {
        $user = Auth::user();

        $siswa = Siswa::where('nik_siswa', $user->nik)->get();

        $formattedSiswa = $siswa->map(function ($siswa) {
            return [
                'nik_siswa' => $siswa->nik_siswa,
                'nisn' => $siswa->nisn,
                'nama_lengkap' => $siswa->nama_lengkap,
                'tingkat_kelas' => $siswa->kelas->tingkat_kelas ?? 'Kelas Tidak Tersedia'
            ];
        });
        if ($siswa) {
            return response()->json($formattedSiswa, 200);
        } else {
            return response()->json(['message' => 'Data Siswa Tidak Ditemukan']);
        }
    }
}
