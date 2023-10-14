<?php

namespace App\Filament\Resources\AreaBussResource\Pages;

use App\Filament\Resources\AreaBussResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAreaBuss extends EditRecord
{
    protected static string $resource = AreaBussResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
