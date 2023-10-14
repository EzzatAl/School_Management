<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkingDayResource\Pages;
use App\Filament\Resources\WorkingDayResource\RelationManagers;
use App\Filament\Resources\WorkingDayResource\Widgets\WorkingDayStatsOverview;
use App\Models\WorkingDay;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkingDayResource extends Resource
{
    protected static ?string $model = WorkingDay::class;

    protected static ?string $navigationGroup = 'System';

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('day')
                    ->required(),
                Forms\Components\TimePicker::make('StartFrom')
                    ->format('H:i')
                    ->required(),
                Forms\Components\TimePicker::make('EndIn')
                    ->format('H:i')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('day')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->date(),
                Tables\Columns\TextColumn::make('StartFrom')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('EndIn')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->dateTime(),
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
            WorkingDayStatsOverview::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWorkingDays::route('/'),
            'create' => Pages\CreateWorkingDay::route('/create'),
            'edit' => Pages\EditWorkingDay::route('/{record}/edit'),
        ];
    }
}
