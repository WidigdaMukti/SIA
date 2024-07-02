<?php

namespace App\Filament\SiaSiswa\Resources\RaportSiswaResource\Pages;

use App\Filament\SiaSiswa\Resources\RaportSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRaportSiswa extends EditRecord
{
    protected static string $resource = RaportSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
