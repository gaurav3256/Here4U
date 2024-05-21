<?php

namespace App\Filament\Resources\MediaResource\Pages;

use App\Filament\Resources\MediaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListMedia extends ListRecords
{
    protected static string $resource = MediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Upload')
                ->icon('heroicon-o-arrow-up-tray'),
        ];
    }
    protected function getTableQuery(): ?Builder
    {
        return parent::getTableQuery()->orderByDesc('id');
    }
}
