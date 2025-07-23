<?php

namespace App\Filament\Admin\Resources\BencanaResource\Pages;

use App\Filament\Admin\Resources\BencanaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBencanas extends ListRecords
{
    protected static string $resource = BencanaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
