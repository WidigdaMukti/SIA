<?php

namespace App\Http\Controllers;

use App\Models\AbsensiSiswa;
use App\Http\Requests\StoreAbsensiSiswaRequest;
use App\Http\Requests\UpdateAbsensiSiswaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AbsensiSiswaController extends Controller
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
    public function store(StoreAbsensiSiswaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AbsensiSiswa $absensiSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbsensiSiswa $absensiSiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsensiSiswaRequest $request, AbsensiSiswa $absensiSiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AbsensiSiswa $absensiSiswa)
    {
        //
    }

    public function getAbsensiSiswaByUser()
    {
        $user = Auth::user();

        $absensiSiswa = AbsensiSiswa::where('nik_siswa', $user->nik)->get();

        if ($absensiSiswa->isEmpty()) {
            return response()->json(['message' => 'Data tidak ditemukan'], 405);
        }

         // Memformat data absensi siswa
        $formattedAbsen = $absensiSiswa->map(function($absen) {
            return [
                'id' => $absen->id,
                'nik_siswa' => $absen->nik_siswa,
                'nama_lengkap' => $absen->absenSiswa->nama_lengkap,
                'kelas' => $absen->absenSiswa->kelas->tingkat_kelas,
                'semester' => $absen->absenSiswa->kelas->semester,
                'mapel' => $absen->mapel->nama_mapel ?? 'Mapel Tidak Terdaftar',
                'absen_kehadiran' => $absen->absenKehadiran ?? 'Absen Kehadiran Tidak Tersedia'
            ];
        });

        return response()->json($formattedAbsen, 200);
    }

    public function getAbsenBySiswaId($id)
    {
        $user = Auth::user();

        $absens = AbsensiSiswa::where('id', $id)->where('nik_siswa', $user->nik)->with('mapel')->first();

        if($absens) {
            $formattedAbsens = [
                'id' => $absens->id,
                'nik_siswa' => $absens->nik_siswa,
                'nama_lengkap' => $absens->absenSiswa->nama_lengkap,
                'kelas' => $absens->absenSiswa->kelas->tingkat_kelas,
                'semester' => $absens->absenSiswa->kelas->semester,
                'mapel' => $absens->mapel->nama_mapel ?? 'Mapel Tidak Terdaftar',
                'absen_kehadiran' => $absens->absenKehadiran ?? 'Absen Kehadiran Tidak Tersedia'
            ];
        }

        if($formattedAbsens) {
            return response()->json($formattedAbsens);
        } else {
            return response()->json(['message' => 'Data Absensi tidak ditemukan'], 405);
        }
    }
}
