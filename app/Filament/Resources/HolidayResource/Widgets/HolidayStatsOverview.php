<?php

namespace App\Filament\Resources\HolidayResource\Widgets;

use App\Models\Holiday;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class HolidayStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('All Holiday', Holiday::all()->count()),
        ];
    }
}
