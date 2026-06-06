<?php

namespace App\Filament\Admin\Resources\TestmonialResource\Pages;

use App\Filament\Admin\Resources\TestmonialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTestmonial extends EditRecord
{
    protected static string $resource = TestmonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
