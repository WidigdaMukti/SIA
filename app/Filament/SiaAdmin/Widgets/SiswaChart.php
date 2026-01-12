<?php

namespace App\Filament\SiaAdmin\Widgets;

use App\Models\Kelas;
use Filament\Widgets\ChartWidget;

class SiswaChart extends ChartWidget
{
    protected static ?string $heading = 'Jumlah Siswa';

    protected static ?int $sort = 1;

    protected static ?string $pollingInterval = null;

    protected static bool $isLazy = false;

    protected function getData(): array
    {
        // Mengambil data kelas beserta jumlah siswa di setiap kelas yang memiliki status user 1 dan role siswa
        $classes = Kelas::with(['siswa' => function ($query) {
            $query->activeUserWithRole();
        }])->get();

        // Mengelompokkan data berdasarkan tingkat kelas
        $groupedData = $classes->groupBy('tingkat_kelas')->map(function ($class) {
            return $class->sum(function ($kelas) {
                return $kelas->siswa->count();
            });
        });

        // Daftar tingkat kelas dalam urutan yang diinginkan
        $orderedTingkatKelas = [
            'I / Satu',
            'II / Dua',
            'III / Tiga',
            'IV / Empat',
            'V / Lima',
            'VI / Enam',
        ];

        // Membuat array label dan data dalam urutan yang diinginkan
        $labels = [];
        $data = [];

        foreach ($orderedTingkatKelas as $tingkat) {
            $labels[] = $tingkat;
            $data[] = $groupedData->get($tingkat, 0);  // Jika tidak ada data, default ke 0
        }

        // Mengembalikan data dalam format yang sesuai untuk chart
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Jumlah Siswa',
                    'data' => $data,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
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
        ];
    }
}
