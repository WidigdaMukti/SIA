<?php

namespace App\Http\Controllers;

use App\Models\RaportSiswa;
use App\Http\Requests\StoreRaportSiswaRequest;
use App\Http\Requests\UpdateRaportSiswaRequest;
use Illuminate\Support\Facades\Auth;

class RaportSiswaController extends Controller
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
    public function store(StoreRaportSiswaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RaportSiswa $raportSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RaportSiswa $raportSiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRaportSiswaRequest $request, RaportSiswa $raportSiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RaportSiswa $raportSiswa)
    {
        //
    }

    public function getRaportBySiswa()
    {
        // Dapatkan pengguna yang sedang login
        $user = Auth::user();

        // Ambil data raport berdasarkan NIK pengguna yang sedang login
        $raports = RaportSiswa::where('nik_siswa', $user->nik)->get();

        if($raports) {
            return response()->json($raports);
        } else {
            return response()->json(['message' => 'Raport tidak ditemukan / Access Failed.'], 405);
        }
    }

    public function getRaportBySiswaId($id)
    {
        // Dapatkan pengguna yang sedang login
        $user = Auth::user();

        // Ambil data raport berdasarkan ID raport dan NIK pengguna yang sedang login
        $raport = RaportSiswa::where('id', $id)->where('nik_siswa', $user->nik)->with('mapelRaport', 'ekskulRaport')->first();

        if ($raport) {
            // Format data sesuai urutan yang diinginkan
            $formattedRaport = [
                'id' => $raport->id,
                'nik_siswa' => $raport->nik_siswa,
                'nama_lengkap' => $raport->siswa->nama_lengkap,
                'tingkat_kelas' => $raport->siswa->kelas->tingkat_kelas,
                'semester' => $raport->siswa->kelas->semester,
                'mapelRaport' => $raport->mapelRaport,
                'ekskulRaport' => $raport->ekskulRaport,
                'sakit' => $raport->sakit,
                'izin' => $raport->izin,
                'tanpa_keterangan' => $raport->tanpa_keterangan,
                'catatan_wali_kelas' => $raport->catatan_wali_kelas,
            ];
        }

        if ($raport) {
            return response()->json($formattedRaport);
        } else {
            return response()->json(['message' => 'Raport tidak ditemukan / Access Failed.'], 405);
        }
    }
}
