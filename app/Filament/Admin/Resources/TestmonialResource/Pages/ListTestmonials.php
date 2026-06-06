<?php

namespace App\Filament\Admin\Resources\TestmonialResource\Pages;

use App\Filament\Admin\Resources\TestmonialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTestmonials extends ListRecords
{
    protected static string $resource = TestmonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
