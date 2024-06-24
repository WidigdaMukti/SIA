<?php

namespace App\Filament\SiaAdmin\Resources\PrestasiResource\Pages;

use App\Filament\SiaAdmin\Resources\PrestasiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePrestasi extends CreateRecord
{
    protected static string $resource = PrestasiResource::class;

    protected function getRedirectUrl(): string
    {
        return route('filament.siaAdmin.resources.prestasis.index');
    }
}
