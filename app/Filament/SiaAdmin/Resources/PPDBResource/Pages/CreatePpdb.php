<?php

namespace App\Filament\SiaAdmin\Resources\PpdbResource\Pages;

use App\Filament\SiaAdmin\Resources\PpdbResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePpdb extends CreateRecord
{
    protected static string $resource = PpdbResource::class;

    protected function getRedirectUrl(): string
    {
        return route('filament.siaAdmin.resources.ppdbs.index');
    }
}
