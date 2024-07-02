<?php

namespace App\Filament\SiaGuru\Resources\AbsensiSiswaResource\Pages;

use App\Filament\SiaGuru\Resources\AbsensiSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAbsensiSiswa extends CreateRecord
{
    protected static string $resource = AbsensiSiswaResource::class;

    protected function getRedirectUrl(): string
    {
        return route('filament.siaGuru.resources.absensi-siswas.index');
    }
}
