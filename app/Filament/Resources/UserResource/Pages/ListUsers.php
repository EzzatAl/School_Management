<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Imports\UsersImport;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\UserResource;
use App\Filament\Resources\UserResource\Widgets\UserStatsOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms\Components\ButtonComponent;
use Filament\Forms\Components\Button;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return[
            UserStatsOverview::class,
        ];
    }
    use WithFileUploads;
    public $importFile;

    public static function importUsers($importFile)
    {
        Excel::import(new UsersImport, $importFile->temporaryFilePath);

        // Optionally, you can perform additional actions after the import

        return redirect()->route('filament.dashboard');
    }
    public function fields()
    {
        return [
            // ...

            FileUpload::make('Import File')
                ->acceptedFileTypes(['.xlsx', '.xls'])
                ->rules('nullable|file|mimes:xlsx,xls')
                ->store(function ($importFile) {
                    $this->importFile = $importFile;
                }),

            // ...
        ];
    }
    public function configure()
    {
        $this->form
            ->addComponent([
                \Filament\Forms\Components\Component::make('import_button')
                    ->component('button')
                    ->buttonType('primary')
                    ->text('Import Users')
                    ->wire('click', 'importUsers')
                    ->disabled(function () {
                        return $this->isCreating();
                    })
                    ->icon('heroicon-o-upload'),
            ]);
    }
    
}

