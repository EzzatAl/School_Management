<?php

namespace App\Filament\Resources\QuizQuestionResource\Pages;

use App\Filament\Resources\QuizQuestionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuizQuestion extends EditRecord
{
    protected static string $resource = QuizQuestionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
