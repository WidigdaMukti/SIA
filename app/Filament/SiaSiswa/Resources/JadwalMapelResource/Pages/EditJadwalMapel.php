<?php

namespace App\Filament\SiaSiswa\Resources\JadwalMapelResource\Pages;

use App\Filament\SiaSiswa\Resources\JadwalMapelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJadwalMapel extends EditRecord
{
    protected static string $resource = JadwalMapelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
