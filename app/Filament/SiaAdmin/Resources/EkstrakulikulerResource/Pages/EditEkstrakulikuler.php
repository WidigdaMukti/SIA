<?php

namespace App\Filament\SiaAdmin\Resources\EkstrakulikulerResource\Pages;

use App\Filament\SiaAdmin\Resources\EkstrakulikulerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEkstrakulikuler extends EditRecord
{
    protected static string $resource = EkstrakulikulerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): ?string
    {
        return route('filament.siaAdmin.resources.ekstrakulikulers.index');
    }
}
