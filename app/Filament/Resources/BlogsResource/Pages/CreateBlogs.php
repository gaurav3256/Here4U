<?php

namespace App\Filament\Resources\BlogsResource\Pages;

use App\Filament\Resources\BlogsResource;
use Filament\Notifications\Notification;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogs extends CreateRecord
{
    protected static string $resource = BlogsResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->user()->id;

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return BlogsResource::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()->title('Blog Created Successfully')
            ->success()
            ->body('Your blog post has been created and published successfully.')
            ->duration('3000')
            ->send();
    }
}
