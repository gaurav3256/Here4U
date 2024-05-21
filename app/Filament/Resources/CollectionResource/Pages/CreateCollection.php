<?php

namespace App\Filament\Resources\CollectionResource\Pages;

use App\Filament\Resources\CollectionResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateCollection extends CreateRecord
{
    protected static string $resource = CollectionResource::class;

    protected function getRedirectUrl(): string
    {
        return CollectionResource::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()->title('Collection Created Successfully')
            ->success()
            ->body('Your collection has been created successfully.')
            ->duration('3000')
            ->send();
    }
}
