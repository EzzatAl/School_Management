<?php

namespace App\Filament\Resources\StudentMarkResource\Pages;

use App\Filament\Resources\StudentMarkResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentMark extends EditRecord
{
    protected static string $resource = StudentMarkResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
