<?php

namespace App\Filament\SiaSiswa\Resources\NilaiResource\Pages;

use App\Filament\SiaSiswa\Resources\NilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNilai extends EditRecord
{
    protected static string $resource = NilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
