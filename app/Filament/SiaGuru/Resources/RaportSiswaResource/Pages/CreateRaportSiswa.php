<?php

namespace App\Filament\SiaGuru\Resources\RaportSiswaResource\Pages;

use App\Filament\SiaGuru\Resources\RaportSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRaportSiswa extends CreateRecord
{
    protected static string $resource = RaportSiswaResource::class;

    protected function getRedirectUrl(): string
    {
        return route('filament.siaGuru.resources.raport-siswas.index');
    }
}
