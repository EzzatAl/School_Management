<?php

namespace App\Filament\Resources\StudentQuizAnswerResource\Pages;

use App\Filament\Resources\StudentQuizAnswerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords; 

class ListStudentQuizAnswers extends ListRecords
{
    protected static string $resource = StudentQuizAnswerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
