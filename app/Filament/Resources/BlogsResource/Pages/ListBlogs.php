<?php

namespace App\Filament\Resources\BlogsResource\Pages;

use App\Filament\Resources\BlogsResource;
use App\Models\Blog;
use Filament\Resources\Components\Tab;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListBlogs extends ListRecords
{
    protected static string $resource = BlogsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): ?Builder
    {
        return parent::getTableQuery()->orderByDesc('id');
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All Blogs')
                ->icon('heroicon-m-user-group'),
            'me' => Tab::make('My Blogs')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('user_id', auth()->user()->id))
                ->icon('heroicon-m-user')
                ->badge(Blog::query()->where('user_id', auth()->user()->id)->count()),
        ];
    }

    public function getDefaultActiveTab(): string | int | null
    {
        return 'me';
    }
}
