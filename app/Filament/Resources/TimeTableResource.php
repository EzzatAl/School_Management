<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimeTableResource\Pages;
use App\Filament\Resources\TimeTableResource\RelationManagers;
use App\Models\TimeTable;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TimeTableResource extends Resource
{
    protected static ?string $model = TimeTable::class;

    protected static ?string $navigationGroup = 'System';

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('grade_id')
                    ->relationship('grade','name')
                    ->required(),
                Forms\Components\DatePicker::make('Year')
                    ->required(),
                Forms\Components\Select::make('semester')
                    ->options([
                        'chapter_One'=>'chapter_One',
                        'chapter_Two'=>'chapter_Two',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('grade.name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Year')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('semester')
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
            'index' => Pages\ListTimeTables::route('/'),
            'create' => Pages\CreateTimeTable::route('/create'),
            'edit' => Pages\EditTimeTable::route('/{record}/edit'),
        ];
    }
}
