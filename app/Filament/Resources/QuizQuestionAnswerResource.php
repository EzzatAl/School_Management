<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuizQuestionAnswerResource\Pages;
use App\Filament\Resources\QuizQuestionAnswerResource\RelationManagers;
use App\Models\QuizQuestionAnswer;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuizQuestionAnswerResource extends Resource
{
    protected static ?string $model = QuizQuestionAnswer::class;

    protected static ?string $navigationGroup = 'Quiz';

    protected static ?string $navigationIcon = 'heroicon-o-check-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('QuizQuestion_id')
                    ->relationship('QuizQuestion','Questions')
                        ->required(),
                Forms\Components\TextInput::make('Answer')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('IsRightAnswer')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('QuizQuestion.Questions')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Answer')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('IsRightAnswer')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuizQuestionAnswers::route('/'),
            'create' => Pages\CreateQuizQuestionAnswer::route('/create'),
            'edit' => Pages\EditQuizQuestionAnswer::route('/{record}/edit'),
        ];
    }
}
