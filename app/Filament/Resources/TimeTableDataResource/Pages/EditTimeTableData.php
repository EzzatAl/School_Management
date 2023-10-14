<?php

namespace App\Filament\Resources\TimeTableDataResource\Pages;

use App\Filament\Resources\TimeTableDataResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTimeTableData extends EditRecord
{
    protected static string $resource = TimeTableDataResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
