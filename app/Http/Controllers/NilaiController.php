<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Http\Requests\StoreNilaiRequest;
use App\Http\Requests\UpdateNilaiRequest;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
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
    public function store(StoreNilaiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNilaiRequest $request, Nilai $nilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nilai $nilai)
    {
        //
    }

    public function getNilaiBySiswa()
    {
        $user = Auth::user();

        $nilai = Nilai::where('nik_siswa', $user->nik)->get();

        $formattedNilai = $nilai->map(function ($nilis) {
            return [
                'id' => $nilis->id,
                'nik_siswa' => $nilis->nik_siswa,
                'nama_lengkap' => $nilis->siswa->nama_lengkap,
                'tingkat_kelas' => $nilis->siswa->kelas->tingkat_kelas,
                'semester' => $nilis->siswa->kelas->semester,
                'mapel' => $nilis->mapel->nama_mapel ?? 'Mapel tidak tersedia',
                'kkm' => $nilis->kkm,
                'nilai_uh1' => $nilis->nilai_uh1,
                'nilai_uh2' => $nilis->nilai_uh2,
                'nilai_uh3' => $nilis->nilai_uh3,
                'nilai_tgs_1' => $nilis->nilai_tgs_1,
                'nilai_tgs_2' => $nilis->nilai_tgs_2,
                'nilai_tgs_3' => $nilis->nilai_tgs_3,
                'nilai_uts' => $nilis->nilai_uts,
                'nilai_uas' => $nilis->nilai_uas,
                'rata_rata' => $nilis->rata_rata
            ];
        });

        if($nilai) {
            return response()->json($formattedNilai, 200);
        } else {
            return response()->json(['message' => 'Data Nilai tidak ditemukan'], 405);
        }
    }

    public function getNilaiBySiswaId($id)
    {
        $user = Auth::user();

        $nilai = Nilai::where('id', $id)->where('nik_siswa', $user->nik)->with('mapel')->first();

        if($nilai) {
            $formattedNilai = [
                'id' => $nilai->id,
                'nik_siswa' => $nilai->nik_siswa,
                'nama_lengkap' => $nilai->siswa->nama_lengkap,
                'tingkat_kelas' => $nilai->siswa->kelas->tingkat_kelas,
                'semester' => $nilai->siswa->kelas->semester,
                'mapel' => $nilai->mapel->nama_mapel  ?? 'Mapel Tidak Terdaftar',
                'kkm' => $nilai->kkm,
                'nilai_uh1' => $nilai->nilai_uh1,
                'nilai_uh2' => $nilai->nilai_uh2,
                'nilai_uh3' => $nilai->nilai_uh3,
                'nilai_tgs_1' => $nilai->nilai_tgs_1,
                'nilai_tgs_2' => $nilai->nilai_tgs_2,
                'nilai_tgs_3' => $nilai->nilai_tgs_3,
                'nilai_uts' => $nilai->nilai_uts,
                'nilai_uas' => $nilai->nilai_uas,
                'rata_rata' => $nilai->rata_rata
            ];
        }

        if ($nilai) {
            return response()->json($formattedNilai);
        } else {
            return response()->json(['message' => 'Data Nilai tidak ditemukan'], 405);
        }
    }
}
