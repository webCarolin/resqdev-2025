<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Donasi;
use App\Models\Donatur;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Donasi Terkumpul', 'Rp ' . number_format(Donasi::sum('jumlah_donasi'), 0, ',', '.'))
                ->description('Seluruh donasi yang masuk')
                ->color('success'),

            Card::make('Donasi Terbesar', 'Rp ' . number_format(Donasi::max('jumlah_donasi'), 0, ',', '.'))
                ->description('Nilai donasi tertinggi')
                ->color('warning'),

            Card::make('Jumlah Donatur', Donatur::count())
                ->description('Orang yang sudah berdonasi')
                ->color('info'),
        ];
    }
}
