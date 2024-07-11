<?php

namespace App\Filament\SiaAdmin\Widgets;

use App\Models\AdminGuru;
use App\Models\Siswa;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static bool $isLazy = false;

    protected static ?string $pollingInterval = null;

    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        $totalUserAktif = User::where('status', 1)->count();
        $totalTenagaTenDik = AdminGuru::whereHas('user', function ($query) {
            $query->where('status', 1)->whereIn('role_id', [1, 2]);
        })->count();
        $totalSiswaAktif = Siswa::whereHas('user', function ($query) {
            $query->where('status', 1)->where('role_id', 3);
        })->count();

        return [
            Stat::make('Total User SIA Aktif', $totalUserAktif)
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('info')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('Total Tenaga TenDik Aktif', $totalTenagaTenDik)
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('Total Siswa Aktif', $totalSiswaAktif)
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
        ];
    }
}
