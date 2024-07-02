<?php

namespace App\Filament\SiaSiswa\Resources\JadwalMapelResource\Pages;

use App\Filament\SiaSiswa\Resources\JadwalMapelResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

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
        return [
            "Semua Kelas" => Tab::make(),
            "Kelas 1" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->whereHas('mapelKelas', function ($query) {
                        $query->whereHas('kelas', function ($query) {
                            $query->where('tingkat_kelas', 'I / Satu');
                        });
                    });
                }),
            "Kelas 2" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->whereHas('mapelKelas', function ($query) {
                        $query->whereHas('kelas', function ($query) {
                            $query->where('tingkat_kelas', 'II / Dua');
                        });
                    });
                }),
            "Kelas 3" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->whereHas('mapelKelas', function ($query) {
                        $query->whereHas('kelas', function ($query) {
                            $query->where('tingkat_kelas', 'III / Tiga');
                        });
                    });
                }),
            "Kelas 4" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->whereHas('mapelKelas', function ($query) {
                        $query->whereHas('kelas', function ($query) {
                            $query->where('tingkat_kelas', 'IV / Empat');
                        });
                    });
                }),
            "Kelas 5" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->whereHas('mapelKelas', function ($query) {
                        $query->whereHas('kelas', function ($query) {
                            $query->where('tingkat_kelas', 'V / Lima');
                        });
                    });
                }),
            "Kelas 6" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->whereHas('mapelKelas', function ($query) {
                        $query->whereHas('kelas', function ($query) {
                            $query->where('tingkat_kelas', 'VI / Enam');
                        });
                    });
                }),
        ];
    }
}
