<?php

namespace App\Filament\SiaSiswa\Resources\RaportSiswaResource\Pages;

use App\Filament\SiaSiswa\Resources\RaportSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRaportSiswa extends ViewRecord
{
    protected static string $resource = RaportSiswaResource::class;

    protected static string $view = 'filament.resources.siaSiswa.raportSiswa.view';
}
