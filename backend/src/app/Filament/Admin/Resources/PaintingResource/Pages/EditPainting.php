<?php

namespace App\Filament\Admin\Resources\PaintingResource\Pages;

use App\Filament\Admin\Resources\PaintingResource;
use App\Filament\Admin\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPainting extends EditRecord
{
    protected static string $resource = PaintingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
