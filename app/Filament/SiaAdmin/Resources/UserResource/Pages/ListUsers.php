<?php

namespace App\Filament\SiaAdmin\Resources\UserResource\Pages;

use App\Filament\SiaAdmin\Resources\UserResource;
use Filament\Actions;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Resources\Components\Tab as ComponentsTab;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab as ListRecordsTab;
use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Semua Role' => ListRecordsTab::make(),
            'Admin' => ListRecordsTab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('role_id', 1);
                }),
            'Guru' => ListRecordsTab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('role_id', 2);
                }),
            'Siswa' => ListRecordsTab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('role_id', 3);
                })
        ];
    }
}
