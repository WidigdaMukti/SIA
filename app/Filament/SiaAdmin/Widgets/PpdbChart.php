<?php

namespace App\Filament\SiaAdmin\Widgets;

use App\Models\ppdb;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PpdbChart extends ChartWidget
{
    protected static ?string $heading = 'PPDB';

    protected static ?int $sort = 1;

    protected static ?string $pollingInterval = null;

    protected static bool $isLazy = false;

    protected function getData(): array
    {
        // Mengambil data pendaftaran siswa baru per tahun
        $enrollments = Ppdb::select(DB::raw('CAST(YEAR(created_at) AS UNSIGNED) as year'), DB::raw('COUNT(*) as total'))
                            ->groupBy('year')
                            ->orderBy('year')
                            ->get();

        // Membuat array label dari tahun pendaftaran
        $labels = $enrollments->pluck('year')->toArray();

        // Membuat array data dari jumlah pendaftar di setiap tahun
        $data = $enrollments->pluck('total')->toArray();

        // Menentukan warna dan deskripsi berdasarkan jumlah pendaftar
        $backgroundColors = [];
        $borderColors = [];
        $descriptions = [];

        foreach ($data as $total) {
            if ($total < 30) {
                $backgroundColors[] = 'rgba(255, 0, 0, 0.2)'; // Red
                $borderColors[] = 'rgba(255, 0, 0, 1)'; // Red
                $descriptions[] = 'Jumlah peserta didik kurang dari 30';
            } elseif ($total >= 30 && $total <= 35) {
                $backgroundColors[] = 'rgba(0, 128, 0, 0.2)'; // Green
                $borderColors[] = 'rgba(0, 128, 0, 1)'; // Green
                $descriptions[] = 'Jumlah peserta didik tepat 30';
            } else {
                $backgroundColors[] = 'rgba(255, 165, 0, 0.2)'; // Orange
                $borderColors[] = 'rgba(255, 165, 0, 1)'; // Orange
                $descriptions[] = 'Jumlah peserta didik lebih dari 30';
            }
        }

        // Mengembalikan data dalam format yang sesuai untuk chart
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Jumlah Pendaftar',
                    'data' => $data,
                    'backgroundColor' => $backgroundColors,
                    'borderColor' => $borderColors,
                    'fill' => false,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Mengganti dengan 'bar' agar warna latar belakang terlihat jelas
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                        'precision' => 0, // Ensure y-axis ticks are integers
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => false, // Menghilangkan checkbox (legend)
                ],
            ],
        ];
    }
}
