<?php

namespace App\Filament\SiaSiswa\Resources\JadwalMapelResource\Pages;

use App\Filament\SiaSiswa\Resources\JadwalMapelResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ListJadwalMapels extends ListRecords
{
    protected static string $resource = JadwalMapelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Mendapatkan siswa terkait dengan user yang sedang login
        $siswa = $user->siswa;

        // Mendapatkan tingkat kelas dari siswa yang sedang login
        $tingkatKelas = $siswa->kelas->tingkat_kelas;

        // Menambahkan tab untuk kelas yang sesuai dengan tingkat kelas siswa
        $tabs["Kelas " . $tingkatKelas] = Tab::make()->modifyQueryUsing(function (Builder $query) use ($tingkatKelas) {
            return $query->whereHas('mapelKelas', function ($query) use ($tingkatKelas) {
                $query->whereHas('kelas', function ($query) use ($tingkatKelas) {
                    $query->where('tingkat_kelas', $tingkatKelas);
                });
            });
        });

        return $tabs;
    }

}
