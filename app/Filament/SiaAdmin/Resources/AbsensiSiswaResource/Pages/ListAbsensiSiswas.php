<?php

namespace App\Filament\SiaAdmin\Resources\AbsensiSiswaResource\Pages;

use App\Filament\SiaAdmin\Resources\AbsensiSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAbsensiSiswas extends ListRecords
{
    protected static string $resource = AbsensiSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
