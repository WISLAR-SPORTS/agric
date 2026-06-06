<?php

namespace App\Filament\Admin\Resources\FarmerResource\Pages;

use App\Filament\Admin\Resources\FarmerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFarmers extends ListRecords
{
    protected static string $resource = FarmerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
