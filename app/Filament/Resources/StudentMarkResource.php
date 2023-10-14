<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentMarkResource\Pages;
use App\Filament\Resources\StudentMarkResource\RelationManagers;
use App\Models\StudentMark;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentMarkResource extends Resource
{
    protected static ?string $model = StudentMark::class;

    protected static ?string $navigationGroup = 'Quiz';

    protected static ?string $navigationIcon = 'heroicon-o-badge-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                    ->relationship('student','id')
                    ->required(),
                Forms\Components\Select::make('subject_id')
                    ->relationship('subject','id')
                    ->required(),
                Forms\Components\TextInput::make('mark')
                    ->maxLength(3)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student_id')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subject.name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mark')
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
            'index' => Pages\ListStudentMarks::route('/'),
            'create' => Pages\CreateStudentMark::route('/create'),
            'edit' => Pages\EditStudentMark::route('/{record}/edit'),
        ];
    }
}
