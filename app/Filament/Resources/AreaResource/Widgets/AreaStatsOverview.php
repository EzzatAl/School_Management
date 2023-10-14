<?php

namespace App\Filament\Resources\AreaResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Area;

class AreaStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('All Area', Area::all()->count()),

        ];
    }
}
