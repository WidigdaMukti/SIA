<?php

namespace App\Filament\SiaAdmin\Resources\KelasResource\Pages;

use App\Filament\SiaAdmin\Resources\KelasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKelas extends EditRecord
{
    protected static string $resource = KelasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
