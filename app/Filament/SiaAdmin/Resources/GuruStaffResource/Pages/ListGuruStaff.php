<?php

namespace App\Filament\SiaAdmin\Resources\GuruStaffResource\Pages;

use App\Filament\SiaAdmin\Resources\GuruStaffResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGuruStaff extends ListRecords
{
    protected static string $resource = GuruStaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
