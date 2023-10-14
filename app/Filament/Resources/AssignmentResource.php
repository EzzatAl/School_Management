<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssignmentResource\Pages;
use App\Filament\Resources\AssignmentResource\RelationManagers;
use App\Models\Assignment;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssignmentResource extends Resource
{
    protected static ?string $model = Assignment::class;

    protected static ?string $navigationGroup = 'System';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-list';

    public static function form(Form $form): Form
    {
        $currentYear = Carbon::now();
        return $form
            ->schema([
                Forms\Components\Select::make('subject_id')
                    ->relationship('subject','name')
                    ->required(),
                Forms\Components\Select::make('teacher_id')
                    ->relationship('teacher','full_name',function ($query)
                    {
                        $query->where('type','=','teacher');
                    })
                    ->required(),
                Forms\Components\Select::make('grade_id')
                    ->relationship('grade','Name')
                    ->required(),
                Forms\Components\TextInput::make('Name')
                    ->required(),
                Forms\Components\DatePicker::make('Date')
                    ->default($currentYear)
                    ->required(),
                Forms\Components\TextInput::make('Description')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subject.name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('teacher.full_name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('grade.name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')

                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->date(),
                Tables\Columns\TextColumn::make('description')
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
            'index' => Pages\ListAssignments::route('/'),
            'create' => Pages\CreateAssignment::route('/create'),
            'edit' => Pages\EditAssignment::route('/{record}/edit'),
        ];
    }
}
