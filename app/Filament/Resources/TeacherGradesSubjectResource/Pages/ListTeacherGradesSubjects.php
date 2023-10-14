<?php

namespace App\Filament\Resources\TeacherGradesSubjectResource\Pages;

use App\Filament\Resources\TeacherGradesSubjectResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeacherGradesSubjects extends ListRecords
{
    protected static string $resource = TeacherGradesSubjectResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
