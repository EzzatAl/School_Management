<?php

namespace App\Filament\Resources\WorkingDayResource\Pages;

use App\Filament\Resources\WorkingDayResource;
use App\Filament\Resources\WorkingDayResource\Widgets\WorkingDayStatsOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorkingDays extends ListRecords
{
    protected static string $resource = WorkingDayResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return[
            WorkingDayStatsOverview::class,
        ];
    }
}
