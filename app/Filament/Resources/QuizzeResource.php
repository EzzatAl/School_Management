<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuizzeResource\Pages;
use App\Filament\Resources\QuizzeResource\RelationManagers;
use App\Models\Quizze;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuizzeResource extends Resource
{
    protected static ?string $model = Quizze::class;

    protected static ?string $navigationGroup = 'Quiz';

    protected static ?string $navigationIcon = 'heroicon-o-database';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('subject_id')
                    ->relationship('subject','name')
                    ->required(),
                Forms\Components\Select::make('teacher_id')
                    ->relationship('teacher','full_name',function ($query)
                    {
                        $query->where('type','=','teacher');
                    })
                    ->required(),
                Forms\Components\Select::make('grade_id')
                    ->relationship('Grade','name')
                    ->required(),
                Forms\Components\TextInput::make('Name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('Day')
                    ->required(),
                Forms\Components\Select::make('Type')
                    ->options([
                        'brainskills' => 'BrainSkills',
                        'quiz' => 'Quiz',
                    ])
                    ->required(),
                TextInput::make('Mark')
                    ->maxLength(3)
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subject.name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('teacher.full_name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('grade.name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Day')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->date(),
                Tables\Columns\TextColumn::make('Type')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Mark')
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
            'index' => Pages\ListQuizzes::route('/'),
            'create' => Pages\CreateQuizze::route('/create'),
            'edit' => Pages\EditQuizze::route('/{record}/edit'),
        ];
    }
}
