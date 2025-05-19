<?php

namespace App\Filament\Widgets;

use App\Models\Pelanggan;
use Filament\Widgets\BarChartWidget;

class PelangganStatistik extends BarChartWidget
{
    protected static ?string $heading = 'Statistik Pelanggan';
    protected static ?int $sort = 1;
    protected static string $color = 'primary';

    protected function getData(): array
    {
        $aktif = Pelanggan::where('status', 'aktif')->count();
        $tidakAktif = Pelanggan::where('status', 'tidak_aktif')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pelanggan',
                    'data' => [$aktif, $tidakAktif],
                    'backgroundColor' => ['#34D399', '#F87171'],
                ],
            ],
            'labels' => ['Aktif', 'Tidak Aktif'],
        ];
    }
}

