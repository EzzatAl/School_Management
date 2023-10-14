<?php

namespace App\Filament\Resources\TimeTableDataResource\Pages;

use App\Filament\Resources\TimeTableDataResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTimeTableData extends ListRecords
{
    protected static string $resource = TimeTableDataResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
