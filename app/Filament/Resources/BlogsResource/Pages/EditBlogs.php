<?php

namespace App\Filament\Resources\BlogsResource\Pages;

use App\Filament\Resources\BlogsResource;
use Filament\Notifications\Notification;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlogs extends EditRecord
{
    protected static string $resource = BlogsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return BlogsResource::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()->title('Blog Updated Successfully')
            ->success()
            ->body('Your blog post has been updated and saved successfully.')
            ->duration('3000')
            ->send();
    }
}
