<?php

namespace App\Filament\SiaAdmin\Resources\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum PpdbStatus: string implements HasColor, HasIcon, HasLabel
{
    case Baru = 'baru';

    case Pending = 'pending';

    case Diterima = 'diterima';

    case Ditolak = 'ditolak';

    public function getLabel(): string
    {
        return match ($this) {
            self::Baru => 'Baru',
            self::Pending => 'Processing',
            self::Diterima => 'Diterima',
            self::Ditolak => 'Ditolak',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Baru => 'info',
            self::Pending => 'warning',
            self::Diterima => 'success',
            self::Ditolak => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Baru => 'heroicon-m-sparkles',
            self::Pending => 'heroicon-m-arrow-path',
            self::Diterima => 'heroicon-m-check-badge',
            self::Ditolak => 'heroicon-m-x-circle',
        };
    }
}
