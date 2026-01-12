<?php

namespace App\Filament\SiaAdmin\Resources\JadwalMapelResource\Pages;

use App\Filament\SiaAdmin\Resources\JadwalMapelResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJadwalMapel extends CreateRecord
{
    protected static string $resource = JadwalMapelResource::class;
    
    protected function getRedirectUrl(): string
    {
        return route('filament.siaAdmin.resources.jadwal-mapels.index');
    }
}
