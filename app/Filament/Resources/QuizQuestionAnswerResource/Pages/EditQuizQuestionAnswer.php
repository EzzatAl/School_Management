<?php

namespace App\Filament\Resources\QuizQuestionAnswerResource\Pages;

use App\Filament\Resources\QuizQuestionAnswerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuizQuestionAnswer extends EditRecord
{
    protected static string $resource = QuizQuestionAnswerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
