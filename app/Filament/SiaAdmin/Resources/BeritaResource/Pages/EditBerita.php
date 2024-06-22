<?php

namespace App\Filament\SiaAdmin\Resources\BeritaResource\Pages;

use App\Filament\SiaAdmin\Resources\BeritaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBerita extends EditRecord
{
    protected static string $resource = BeritaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): ?string
    {
        return route('filament.siaAdmin.resources.beritas.index');
    }
}
