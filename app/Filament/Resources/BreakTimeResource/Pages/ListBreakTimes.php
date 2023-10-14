<?php

namespace App\Filament\Resources\BreakTimeResource\Pages;

use App\Filament\Resources\BreakTimeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBreakTimes extends ListRecords
{
    protected static string $resource = BreakTimeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
