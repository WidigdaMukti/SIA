<?php

namespace App\Filament\SiaAdmin\Resources\GaleriResource\Pages;

use App\Filament\SiaAdmin\Resources\GaleriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGaleri extends EditRecord
{
    protected static string $resource = GaleriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): ?string
    {
        return route('filament.siaAdmin.resources.galeris.index');
    }
}
