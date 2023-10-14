<?php

namespace App\Filament\Resources\HolidayResource\Pages;

use App\Filament\Resources\HolidayResource;
use App\Filament\Resources\HolidayResource\Widgets\HolidayStatsOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHolidays extends ListRecords
{
    protected static string $resource = HolidayResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return[
          HolidayStatsOverview::class,
        ];
    }
}
