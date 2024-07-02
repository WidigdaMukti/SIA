<?php

namespace App\Filament\SiaSiswa\Resources\NilaiResource\Pages;

use App\Filament\SiaSiswa\Resources\NilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewNilai extends ViewRecord
{
    protected static string $resource = NilaiResource::class;

    protected static string $view = 'filament.resources.siaSiswa.nilaiSiswa.view';
}
