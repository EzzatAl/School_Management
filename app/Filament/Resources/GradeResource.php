<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GradeResource\Pages;
use App\Filament\Resources\GradeResource\RelationManagers;
use App\Filament\Resources\GradeResource\Widgets\GradeStatsOverview;
use App\Models\Grade;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GradeResource extends Resource
{
    protected static ?string $model = Grade::class;

    protected static ?string $navigationGroup = 'Class';

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Forms\Components\Select::make('division_id')
                    ->relationship('division','name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('division.name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
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

    public static function getWidgets(): array
    {
        return[
            GradeStatsOverview::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGrades::route('/'),
            'create' => Pages\CreateGrade::route('/create'),
            'edit' => Pages\EditGrade::route('/{record}/edit'),
        ];
    }
}
