<?php

namespace App\Filament\SiaAdmin\Resources\PrestasiResource\Pages;

use App\Filament\SiaAdmin\Resources\PrestasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPrestasi extends EditRecord
{
    protected static string $resource = PrestasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): ?string
    {
        return route('filament.siaAdmin.resources.prestasis.index');
    }
}
