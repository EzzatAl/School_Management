<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BreakTimeResource\Pages;
use App\Filament\Resources\BreakTimeResource\RelationManagers;
use App\Models\BreakTime;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BreakTimeResource extends Resource
{
    protected static ?string $model = BreakTime::class;

    protected static ?string $navigationGroup = 'System';

    protected static ?string $navigationIcon = 'heroicon-o-clock';

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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBreakTimes::route('/'),
            'create' => Pages\CreateBreakTime::route('/create'),
            'edit' => Pages\EditBreakTime::route('/{record}/edit'),
        ];
    }
}
