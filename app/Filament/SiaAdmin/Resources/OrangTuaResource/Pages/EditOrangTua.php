<?php

namespace App\Filament\SiaAdmin\Resources\OrangTuaResource\Pages;

use App\Filament\SiaAdmin\Resources\OrangTuaResource;
use App\Models\OrangTua;
use App\Models\Siswa;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditOrangTua extends EditRecord
{
    protected static string $resource = OrangTuaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return route('filament.siaAdmin.resources.orang-tuas.index');
    }
}
