<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HolidayResource\Pages;
use App\Filament\Resources\HolidayResource\RelationManagers;
use App\Filament\Resources\HolidayResource\Widgets\HolidayStatsOverview;
use App\Models\Holiday;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HolidayResource extends Resource
{
    protected static ?string $model = Holiday::class;

    protected static ?string $navigationGroup = 'System';

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        $currentYear = Carbon::now();
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('HolidayDate')
                    ->required(),
                Forms\Components\DatePicker::make('year')
                    ->default($currentYear)
                    ->required(),
                Forms\Components\Toggle::make('IsGeneral')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('HolidayDate')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->date(),
                Tables\Columns\TextColumn::make('year')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->date(),
                Tables\Columns\IconColumn::make('IsGeneral')
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

    public static function getWidgets(): array
    {
        return[
            HolidayStatsOverview::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHolidays::route('/'),
            'create' => Pages\CreateHoliday::route('/create'),
            'edit' => Pages\EditHoliday::route('/{record}/edit'),
        ];
    }
}
