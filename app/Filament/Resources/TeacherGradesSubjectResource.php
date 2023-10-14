<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherGradesSubjectResource\Pages;
use App\Filament\Resources\TeacherGradesSubjectResource\RelationManagers;
use App\Models\TeacherGradesSubject;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeacherGradesSubjectResource extends Resource
{
    protected static ?string $model = TeacherGradesSubject::class;

    protected static ?string $navigationGroup = 'Class';

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('teacher_id')
                    ->relationship('teacher','full_name',function ($query)
                    {
                        $query->where('type','=','teacher');
                    })
                    ->required(),
                Forms\Components\Select::make('subject_id')
                    ->relationship('subject','name')
                    ->required(),
                Forms\Components\Select::make('grade_id')
                    ->relationship('grade','name')
                    ->required(),
                Forms\Components\Select::make('division_id')
                    ->relationship('division','name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('teacher.full_name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subject.name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('grade.name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('division.name')
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
            'index' => Pages\ListTeacherGradesSubjects::route('/'),
            'create' => Pages\CreateTeacherGradesSubject::route('/create'),
            'edit' => Pages\EditTeacherGradesSubject::route('/{record}/edit'),
        ];
    }
}
