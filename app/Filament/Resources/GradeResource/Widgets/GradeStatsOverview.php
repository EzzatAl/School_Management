<?php

namespace App\Filament\Resources\GradeResource\Widgets;

use App\Models\Grade;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class GradeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('All Grades', Grade::all()->count()),
        ];
    }
}
