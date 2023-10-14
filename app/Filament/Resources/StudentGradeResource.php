<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentGradeResource\Pages;
use App\Filament\Resources\StudentGradeResource\RelationManagers;
use App\Models\StudentGrade;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentGradeResource extends Resource
{
    protected static ?string $model = StudentGrade::class;

    protected static ?string $navigationGroup = 'Class';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('student_id')
                    ->relationship('student', 'full_name', function ($query) {
                        $query->where('type', '=', 'student');
                    })
                    ->required(),
                Forms\Components\Select::make('grade_id')
                    ->relationship('grade','name')
                    ->required(),
                Forms\Components\Select::make('division_id')
                    ->relationship('division','name')
                    ->required(),
                Forms\Components\DatePicker::make('year')
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
                Tables\Columns\TextColumn::make('grade.name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('division.name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('year')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->date(),
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
            'index' => Pages\ListStudentGrades::route('/'),
            'create' => Pages\CreateStudentGrade::route('/create'),
            'edit' => Pages\EditStudentGrade::route('/{record}/edit'),
        ];
    }
}
