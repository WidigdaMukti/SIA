<?php

namespace App\Filament\SiaAdmin\Resources\GaleriResource\Pages;

use App\Filament\SiaAdmin\Resources\GaleriResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGaleri extends CreateRecord
{
    protected static string $resource = GaleriResource::class;

    protected function getRedirectUrl(): string
    {
        return route('filament.siaAdmin.resources.galeris.index');
    }
}
