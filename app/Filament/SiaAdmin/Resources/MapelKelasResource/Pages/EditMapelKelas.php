<?php

namespace App\Filament\SiaAdmin\Resources\MapelKelasResource\Pages;

use App\Filament\SiaAdmin\Resources\MapelKelasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMapelKelas extends EditRecord
{
    protected static string $resource = MapelKelasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
