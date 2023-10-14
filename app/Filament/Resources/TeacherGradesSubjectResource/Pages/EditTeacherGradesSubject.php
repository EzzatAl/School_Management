<?php

namespace App\Filament\Resources\TeacherGradesSubjectResource\Pages;

use App\Filament\Resources\TeacherGradesSubjectResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeacherGradesSubject extends EditRecord
{
    protected static string $resource = TeacherGradesSubjectResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
