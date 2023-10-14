<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentQuizAnswerResource\Pages;
use App\Filament\Resources\StudentQuizAnswerResource\RelationManagers;
use App\Models\StudentQuizAnswer;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentQuizAnswerResource extends Resource
{
    protected static ?string $model = StudentQuizAnswer::class;

    protected static ?string $navigationGroup = 'Quiz';

    protected static ?string $navigationIcon = 'heroicon-o-database';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                    ->relationship('student','id',function ($query)
                    {
                        $query->where('type','=','student');
                    })
                    ->required(),
                Forms\Components\Select::make('quiz_questions_id')
                    ->relationship('quiz_questions','id')
                    ->required(),
                Forms\Components\Select::make('quizzes_question_answer_id')
                    ->relationship('QuizzesQuestionAnswer','Answer')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.full_name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quiz_questions.Questions')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quizzes_question_answer_id')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
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
            'index' => Pages\ListStudentQuizAnswers::route('/'),
            'create' => Pages\CreateStudentQuizAnswer::route('/create'),
            'edit' => Pages\EditStudentQuizAnswer::route('/{record}/edit'),
        ];
    }
}
