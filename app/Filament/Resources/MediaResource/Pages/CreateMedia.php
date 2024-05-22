<?php

namespace App\Filament\Resources\MediaResource\Pages;

use App\Filament\Resources\MediaResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateMedia extends CreateRecord
{
    protected static string $resource = MediaResource::class;

    protected function getRedirectUrl(): string
    {
        return MediaResource::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Media Uploaded Successfully')
            ->body('Your media has been uploaded successfully.')
            ->success()
            ->icon('heroicon-o-check-circle')
            ->duration('3000')
            ->send();
    }
}
