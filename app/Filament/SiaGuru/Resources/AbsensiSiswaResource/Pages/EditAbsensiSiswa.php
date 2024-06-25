<?php

namespace App\Filament\SiaGuru\Resources\AbsensiSiswaResource\Pages;

use App\Filament\SiaGuru\Resources\AbsensiSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAbsensiSiswa extends EditRecord
{
    protected static string $resource = AbsensiSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
