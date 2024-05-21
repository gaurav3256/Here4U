<?php

namespace App\Filament\Resources\CollectionResource\Pages;

use App\Filament\Resources\CollectionResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditCollection extends EditRecord
{
    protected static string $resource = CollectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return CollectionResource::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()->title('Collection Updated Successfully')
            ->success()
            ->body('Your collection has been updated and saved successfully.')
            ->duration('3000')
            ->send();
    }
}
