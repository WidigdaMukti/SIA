<?php

namespace App\Filament\SiaAdmin\Resources\GuruStaffResource\Pages;

use App\Filament\SiaAdmin\Resources\GuruStaffResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGuruStaff extends EditRecord
{
    protected static string $resource = GuruStaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): ?string
    {
        return route('filament.siaAdmin.resources.guru-staffs.index');
    }
}
