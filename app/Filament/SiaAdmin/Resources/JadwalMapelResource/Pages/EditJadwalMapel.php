<?php

namespace App\Filament\SiaAdmin\Resources\JadwalMapelResource\Pages;

use App\Filament\SiaAdmin\Resources\JadwalMapelResource;
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
