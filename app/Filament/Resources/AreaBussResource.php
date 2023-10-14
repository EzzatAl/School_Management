<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AreaBussResource\Pages;
use App\Filament\Resources\AreaBussResource\RelationManagers;
use App\Models\AreaBuss;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AreaBussResource extends Resource
{
    protected static ?string $model = AreaBuss::class;

    protected static ?string $navigationGroup = 'Area';

    protected static ?string $navigationIcon = 'heroicon-o-location-marker';

    public static function form(Form $form): Form
    {
        return $form 
            ->schema([
                Forms\Components\Select::make('area_id')
                    ->relationship('area','name')
                    ->required(),
                Forms\Components\TimePicker::make('TimeMorningArrived')
                    ->required()
                    ->format('H:i'),
                Forms\Components\TimePicker::make('TimeAfterNoonArrived')
                    ->required()
                    ->format('H:i'),

                Forms\Components\Select::make('Type')
                    ->options([
                        'inexam' => 'InExam',
                        'normal' => 'Normal'
                    ])
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('area.name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('TimeMorningArrived')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->date(),
                Tables\Columns\TextColumn::make('TimeAfterNoonArrived')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->date(),
                Tables\Columns\TextColumn::make('Type')
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
            'index' => Pages\ListAreaBusses::route('/'),
            'create' => Pages\CreateAreaBuss::route('/create'),
            'edit' => Pages\EditAreaBuss::route('/{record}/edit'),
        ];
    }
}
