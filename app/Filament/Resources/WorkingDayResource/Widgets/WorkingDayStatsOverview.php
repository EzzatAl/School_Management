<?php

namespace App\Filament\Resources\WorkingDayResource\Widgets;

use App\Models\WorkingDay;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class WorkingDayStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('All Working Day', WorkingDay::all()->count()),
        ];
    }
}
