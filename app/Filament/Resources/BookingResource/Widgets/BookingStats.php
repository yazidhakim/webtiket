<?php

namespace App\Filament\Resources\BookingResource\Widgets;

use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BookingStats extends BaseWidget
{
    protected function getStats(): array
    {
        $totalTransactions = Booking::count();
        $approvedTransactions = Booking::where('is_paid', true)->count();
        $totalRevenue = Booking::where('is_paid', true)->sum('total_amount');

        return [
            Stat::make('Total Transaksi', $totalTransactions)
                ->description('Semua transaksi')
                ->icon('heroicon-o-currency-dollar'),

            Stat::make('Transaksi Disetujui', $approvedTransactions)
                ->description('Transaksi yang disetujui')
                ->icon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Total Pendapatan', 'IDR ' . number_format($totalRevenue))
                ->description('Pendapatan dari transaksi yang disetujui')
                ->icon('heroicon-o-check-circle')
                ->color('success'),
        ];
    }
}
