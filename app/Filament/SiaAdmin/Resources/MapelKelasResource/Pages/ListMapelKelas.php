<?php

namespace App\Filament\SiaAdmin\Resources\MapelKelasResource\Pages;

use App\Filament\SiaAdmin\Resources\MapelKelasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMapelKelas extends ListRecords
{
    protected static string $resource = MapelKelasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
