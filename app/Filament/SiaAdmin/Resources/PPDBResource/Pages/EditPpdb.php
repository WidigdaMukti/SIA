<?php

namespace App\Filament\SiaAdmin\Resources\PpdbResource\Pages;

use App\Filament\SiaAdmin\Resources\PpdbResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPpdb extends EditRecord
{
    protected static string $resource = PpdbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): ?string
    {
        return route('filament.siaAdmin.resources.ppdbs.index');
    }
}
