<?php

namespace App\Filament\SiaSiswa\Resources\AbsenSiswaResource\Pages;

use App\Filament\SiaSiswa\Resources\AbsenSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAbsenSiswas extends ListRecords
{
    protected static string $resource = AbsenSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
