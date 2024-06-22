<?php

namespace App\Filament\SiaAdmin\Resources\AdminGuruResource\Pages;

use App\Filament\SiaAdmin\Resources\AdminGuruResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdminGurus extends ListRecords
{
    protected static string $resource = AdminGuruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    // public function getTabs(): array
    // {
    //     return [
    //         "Guru Kelas" =>
    //     ];
    // }
}
