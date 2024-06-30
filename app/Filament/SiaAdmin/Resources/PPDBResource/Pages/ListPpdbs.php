<?php

namespace App\Filament\SiaAdmin\Resources\PpdbResource\Pages;

use App\Filament\SiaAdmin\Resources\PpdbResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPpdbs extends ListRecords
{
    protected static string $resource = PpdbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
