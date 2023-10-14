<?php

namespace App\Filament\Resources\TimeTableResource\Pages;

use App\Filament\Resources\TimeTableResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTimeTable extends EditRecord
{
    protected static string $resource = TimeTableResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
