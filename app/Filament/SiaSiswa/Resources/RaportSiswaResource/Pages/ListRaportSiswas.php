<?php

namespace App\Filament\SiaSiswa\Resources\RaportSiswaResource\Pages;

use App\Filament\SiaSiswa\Resources\RaportSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRaportSiswas extends ListRecords
{
    protected static string $resource = RaportSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
