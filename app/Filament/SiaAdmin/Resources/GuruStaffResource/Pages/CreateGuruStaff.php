<?php

namespace App\Filament\SiaAdmin\Resources\GuruStaffResource\Pages;

use App\Filament\SiaAdmin\Resources\GuruStaffResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGuruStaff extends CreateRecord
{
    protected static string $resource = GuruStaffResource::class;

    protected function getRedirectUrl(): string
    {
        return route('filament.siaAdmin.resources.guru-staffs.index');
    }
}
