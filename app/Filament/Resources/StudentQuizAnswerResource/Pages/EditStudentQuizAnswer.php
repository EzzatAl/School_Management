<?php

namespace App\Filament\Resources\StudentQuizAnswerResource\Pages;

use App\Filament\Resources\StudentQuizAnswerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentQuizAnswer extends EditRecord
{
    protected static string $resource = StudentQuizAnswerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
