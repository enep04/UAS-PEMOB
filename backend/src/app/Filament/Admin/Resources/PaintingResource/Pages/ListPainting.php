<?php

namespace App\Filament\Admin\Resources\PaintingResource\Pages;

use App\Filament\Admin\Resources\PaintingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPainting extends ListRecords
{
    protected static string $resource = PaintingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
