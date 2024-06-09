<?php

namespace App\Filament\SiaAdmin\Resources\JadwalMapelResource\Pages;

use App\Filament\SiaAdmin\Resources\JadwalMapelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJadwalMapels extends ListRecords
{
    protected static string $resource = JadwalMapelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
