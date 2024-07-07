<?php

namespace App\Filament\SiaAdmin\Resources\MapelKelasResource\Pages;

use App\Filament\SiaAdmin\Resources\MapelKelasResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMapelKelas extends CreateRecord
{
    protected static string $resource = MapelKelasResource::class;

    protected function getRedirectUrl(): string
    {
        return route('filament.siaAdmin.resources.mapel-kelas.index');
    }
}
