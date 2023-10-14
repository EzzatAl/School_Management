<?php

namespace App\Filament\Resources\WorkingDayResource\Pages;

use App\Filament\Resources\WorkingDayResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkingDay extends EditRecord
{
    protected static string $resource = WorkingDayResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
