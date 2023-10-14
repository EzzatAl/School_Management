<?php

namespace App\Filament\Resources\BreakTimeResource\Pages;

use App\Filament\Resources\BreakTimeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBreakTime extends EditRecord
{
    protected static string $resource = BreakTimeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
