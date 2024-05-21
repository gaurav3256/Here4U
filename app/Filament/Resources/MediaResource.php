<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaResource\Pages;
use App\Filament\Resources\MediaResource\RelationManagers;
use App\Models\Collection;
use App\Models\Media;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Media';
    protected static ?string $navigationGroup = 'Media Library';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Media Collection')
                    ->description('Provide details for the gallery collection. Select a category and upload multiple images that belong to this collection.')
                    ->schema([
                        Select::make('collection_id')
                            ->label('Collection')
                            ->options(Collection::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        FileUpload::make('path')
                            ->label('Image')
                            ->placeholder('Upload an image')
                            ->image()
                            ->imageEditor()
                            ->multiple() // Allow multiple file uploads
                            ->storeFileNamesIn('name')
                            ->disk('public')
                            ->directory('images')
                            ->preserveFilenames()
                            ->rules('required|image')
                            ->validationMessages([
                                'required' => 'Please upload :attribute',
                                'image' => 'Please upload a valid image',
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('collection.name'),
                ImageColumn::make('path')->label('Images'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Media Deleted')
                            ->body('The media has been deleted successfully.'),
                    ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMedia::route('/'),
            'create' => Pages\CreateMedia::route('/create'),
            'edit' => Pages\EditMedia::route('/{record}/edit'),
        ];
    }
}
