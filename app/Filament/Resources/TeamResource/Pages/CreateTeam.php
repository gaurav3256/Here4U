<?php

namespace App\Filament\Resources\TeamResource\Pages;

use App\Filament\Resources\TeamResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateTeam extends CreateRecord
{
    protected static string $resource = TeamResource::class;

    protected function getRedirectUrl(): string
    {
        return TeamResource::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Member Created Successfully')
            ->body('New team member has been created and saved successfully.')
            ->success()
            ->icon('heroicon-o-check-circle')
            ->duration('3000')
            ->send();
    }
}
