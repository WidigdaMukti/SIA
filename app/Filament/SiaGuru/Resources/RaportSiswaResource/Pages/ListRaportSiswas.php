<?php

namespace App\Filament\SiaGuru\Resources\RaportSiswaResource\Pages;

use App\Filament\SiaGuru\Resources\RaportSiswaResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListRaportSiswas extends ListRecords
{
    protected static string $resource = RaportSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            "Semua Kelas" => Tab::make('Semua Kelas'),
            "Kelas 1" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->whereHas('siswa', function ($query) {
                        $query->whereHas('kelas', function ($query) {
                            $query->where('tingkat_kelas', 'I / Satu');
                        });
                    });
                }),
            "Kelas 2" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->whereHas('siswa', function ($query) {
                        $query->whereHas('kelas', function ($query) {
                            $query->where('tingkat_kelas', 'II / Dua');
                        });
                    });
                }),
            "Kelas 3" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->whereHas('siswa', function ($query) {
                        $query->whereHas('kelas', function ($query) {
                            $query->where('tingkat_kelas', 'III / Tiga');
                        });
                    });
                }),
            "Kelas 4" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->whereHas('siswa', function ($query) {
                        $query->whereHas('kelas', function ($query) {
                            $query->where('tingkat_kelas', 'IV / Empat');
                        });
                    });
                }),
            "Kelas 5" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->whereHas('siswa', function ($query) {
                        $query->whereHas('kelas', function ($query) {
                            $query->where('tingkat_kelas', 'V / Lima');
                        });
                    });
                }),
            "Kelas 6" => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->whereHas('siswa', function ($query) {
                        $query->whereHas('kelas', function ($query) {
                            $query->where('tingkat_kelas', 'VI / Enam');
                        });
                    });
                }),
        ];
    }
}
