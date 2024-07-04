<?php

namespace App\Http\Controllers;

use App\Models\JadwalMapel;
use App\Http\Requests\StoreJadwalMapelRequest;
use App\Http\Requests\UpdateJadwalMapelRequest;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalMapelController extends Controller
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
    public function store(StoreJadwalMapelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalMapel $jadwalMapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalMapel $jadwalMapel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJadwalMapelRequest $request, JadwalMapel $jadwalMapel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalMapel $jadwalMapel)
    {
        //
    }

    public function getJadwalMapelKelas(Request $request)
    {
       // Ambil jadwal mapel dengan relasi mapelKelas dan kelas yang aktif
        $jadwalMapel = JadwalMapel::whereHas('mapelKelas.kelas', function ($query) {
            $query->where('status', 1);
        })->with(['mapelKelas.kelas'])->get();

        if ($jadwalMapel->isEmpty()) {
            return response()->json(['message' => 'Data Jadwal Mapel tidak ditemukan'], 404);
        }

        // Mengelompokkan jadwal berdasarkan tingkat kelas
        $groupedJadwal = $jadwalMapel->groupBy(function($jadwal) {
            return $jadwal->mapelKelas->kelas->tingkat_kelas;
        });

        // Mengurutkan berdasarkan tingkat kelas dari satu sampai enam
        $orderedKeys = ['I / Satu', 'II / Dua', 'III / Tiga', 'IV / Empat',
                        'V / Lima', 'VI / Enam'];
        $sortedJadwal = collect($orderedKeys)->mapWithKeys(function ($key) use ($groupedJadwal) {
            return [$key => $groupedJadwal->get($key, collect())];
        });

        // Memformat data
        $formattedJadwal = $sortedJadwal->map(function($jadwalGroup, $tingkatKelas) {
            return [
                'tingkat_kelas' => $tingkatKelas,
                'jadwal' => $jadwalGroup->map(function($jadwal) {
                    return [
                        'id' => $jadwal->id,
                        'jam_mulai' => $jadwal->jam_mulai,
                        'jam_selesai' => $jadwal->jam_selesai,
                        'hari' => $jadwal->hari,
                        'mata_pelajaran' => $jadwal->mapelKelas->nama_mapel ?? 'Mapel Tidak Terdaftar',
                    ];
                })->toArray()
            ];
        })->map(function($group) {
            if (empty($group['jadwal'])) {
                return [
                    'tingkat_kelas' => $group['tingkat_kelas'],
                    'message' => 'Mapel di kelas ini tidak tersedia'
                ];
            }
            return $group;
        })->values();

        return response()->json($formattedJadwal, 200);
    }

    public function getJadwalMapelKelasBySiswa(User $user, Request $request)
    {
         // Ambil user yang sedang login
        $user = Auth::user();

        // Dapatkan data siswa dari user yang login
        $siswa = $user->siswa;

        // Ambil jadwal mapel berdasarkan kelas siswa yang sedang login
        $jadwalMapel = JadwalMapel::whereHas('mapelKelas.kelas', function ($query) use ($siswa) {
            $query->where('id', $siswa->kelas_id)->where('status', 1);
        })->with(['mapelKelas.kelas'])->get();

        if ($jadwalMapel->isEmpty()) {
            return response()->json(['message' => 'Data Jadwal Mapel tidak ditemukan'], 404);
        }

        // Memformat data sesuai dengan tingkat kelas siswa yang login
        $formattedJadwal = $jadwalMapel->groupBy(function ($item) {
            return $item->mapelKelas->kelas->tingkat_kelas;
        })->map(function ($jadwalPelajaran, $tingkatKelas) {
            return [
                'tingkat_kelas' => $tingkatKelas,
                'jadwal' => $jadwalPelajaran->map(function($jadwal) {
                    return [
                        'id' => $jadwal->id,
                        'jam_mulai' => $jadwal->jam_mulai,
                        'jam_selesai' => $jadwal->jam_selesai,
                        'hari' => $jadwal->hari,
                        'mata_pelajaran' => $jadwal->mapelKelas->nama_mapel ?? 'Mapel Tidak Terdaftar',
                    ];
                })->toArray()
            ];
        })->map(function($jadwalPelajaran) {
            if (empty($jadwalPelajaran['jadwal'])) {
                return [
                    'tingkat_kelas' => $jadwalPelajaran['tingkat_kelas'],
                    'message' => 'Mapel di kelas ini tidak tersedia'
                ];
            }
            return $jadwalPelajaran;
        })->values();

        return response()->json($formattedJadwal, 200);
    }
}
