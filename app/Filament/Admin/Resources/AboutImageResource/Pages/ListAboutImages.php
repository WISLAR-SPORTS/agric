<?php

namespace App\Filament\Admin\Resources\AboutImageResource\Pages;

use App\Filament\Admin\Resources\AboutImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutImages extends ListRecords
{
    protected static string $resource = AboutImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
