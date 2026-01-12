<?php

namespace App\Filament\SiaAdmin\Resources\OrangTuaResource\Pages;

use App\Filament\SiaAdmin\Resources\OrangTuaResource;
use App\Models\OrangTua;
use App\Models\Siswa;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateOrangTua extends CreateRecord
{
    protected static string $resource = OrangTuaResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $existingUser = Siswa::where('nik_siswa', $data['nik_siswa'])->first();
        
        if ($existingUser) {
            OrangTua::where('nik_siswa', $data['nik_siswa'])->delete();
        }
        
        return OrangTua::create($data);
    }

    protected function getRedirectUrl(): string
    {
        return route('filament.siaAdmin.resources.orang-tuas.index');
    }
}
