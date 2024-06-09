<?php

namespace App\Filament\SiaAdmin\Resources\NilaiResource\Pages;

use App\Filament\SiaAdmin\Resources\NilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNilais extends ListRecords
{
    protected static string $resource = NilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
