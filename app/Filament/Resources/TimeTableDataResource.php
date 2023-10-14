<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimeTableDataResource\Pages;
use App\Filament\Resources\TimeTableDataResource\RelationManagers;
use App\Models\TimeTableData;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TimeTableDataResource extends Resource
{
    protected static ?string $model = TimeTableData::class;

    protected static ?string $navigationGroup = 'System';

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('timetables_id')
                    ->relationship('timetables','semester')
                    ->required(),
                Forms\Components\Select::make('subject_id')
                    ->relationship('subject','name')
                    ->required(),
                Forms\Components\Select::make('teacher_id')
                    ->relationship('teacher','full_name',function ($query)
                    {
                        $query->where('type','=','teacher');
                    })
                    ->required(),
                Forms\Components\Select::make('day')
                    ->options([
                        'Sunday'=>'Sunday',
                        'Monday'=>'Monday',
                        'Tuesday'=> 'Tuesday',
                        'Wednesday'=>'Wednesday',
                        'Thursday'=>'Thursday'
                    ])
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
                Tables\Columns\TextColumn::make('timetables.semester')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subject.name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('teacher.full_name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('day')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
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
            'index' => Pages\ListTimeTableData::route('/'),
            'create' => Pages\CreateTimeTableData::route('/create'),
            'edit' => Pages\EditTimeTableData::route('/{record}/edit'),
        ];
    }
}
