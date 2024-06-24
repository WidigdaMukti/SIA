<?php

namespace App\Filament\SiaAdmin\Resources\ProgramResource\Pages;

use App\Filament\SiaAdmin\Resources\ProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProgram extends CreateRecord
{
    protected static string $resource = ProgramResource::class;

    protected function getRedirectUrl(): string
    {
        return route('filament.siaAdmin.resources.programs.index');
    }
}
