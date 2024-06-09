<?php

namespace App\Filament\SiaAdmin\Resources\TahunAkademikResource\Pages;

use App\Filament\SiaAdmin\Resources\TahunAkademikResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTahunAkademik extends EditRecord
{
    protected static string $resource = TahunAkademikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
