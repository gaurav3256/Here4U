<?php

namespace App\Filament\Resources\MediaResource\Pages;

use App\Filament\Resources\MediaResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditMedia extends EditRecord
{
    protected static string $resource = MediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return MediaResource::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()->title('Media Updated Successfully')
            ->success()
            ->body('Your media has been updated and saved successfully.')
            ->duration('3000')
            ->send();
    }
}
