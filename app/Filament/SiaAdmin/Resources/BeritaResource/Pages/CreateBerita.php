<?php

namespace App\Filament\SiaAdmin\Resources\BeritaResource\Pages;

use App\Filament\SiaAdmin\Resources\BeritaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBerita extends CreateRecord
{
    protected static string $resource = BeritaResource::class;

    protected function getRedirectUrl(): string
    {
        return route('filament.siaAdmin.resources.beritas.index');
    }
}
