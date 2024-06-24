<?php

namespace App\Filament\SiaAdmin\Resources\EkstrakulikulerResource\Pages;

use App\Filament\SiaAdmin\Resources\EkstrakulikulerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEkstrakulikuler extends CreateRecord
{
    protected static string $resource = EkstrakulikulerResource::class;

    protected function getRedirectUrl(): string
    {
        return route('filament.siaAdmin.resources.ekstrakulikulers.index');
    }
}
