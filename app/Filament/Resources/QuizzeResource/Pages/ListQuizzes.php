<?php

namespace App\Filament\Resources\QuizzeResource\Pages;

use App\Filament\Resources\QuizzeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQuizzes extends ListRecords
{
    protected static string $resource = QuizzeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
