<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogsResource\Pages;

use App\Models\Blog;

use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BlogsResource extends Resource
{
    protected static ?string $model = Blog::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Blogs';
    protected static ?string $navigationGroup = 'Blog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Blog information')
                        ->description('Fill out the details of the blog post. Provide a catchy title, a concise summary, and upload a relevant image. Write the body content using the rich text editor.')
                        ->schema([
                            TextInput::make('title')
                                ->label('Title')
                                ->live(onBlur: true)
                                ->afterStateUpdated(
                                    fn (Set $set, ?string $state, string $operation) => $operation === 'create' ? $set(
                                        path: 'slug',
                                        state: Str::slug($state) . '-' . now()->format('Y-m-d')
                                    ) : null
                                )
                                ->rules('required|string|min:3')
                                ->validationMessages([
                                    'required' => 'Please enter :attribute',
                                    'string' => 'Please enter string value only',
                                    'min' => 'The :attribute must be at least :min characters',
                                ]),

                            TextInput::make('slug')
                                ->label('Slug')
                                ->disabled()
                                ->dehydrated(),

                            MarkdownEditor::make('summary')
                                ->label('Summary')
                                ->rules('required|min:3')
                                ->validationMessages([
                                    'required' => 'Please enter :attribute',
                                    'min' => 'The :attribute must be at least :min characters',
                                ])
                                ->live() // Add live() here
                                ->columnSpan(2),

                            FileUpload::make('image')
                                ->label('Image')
                                ->placeholder('Upload an image')
                                ->image()
                                ->imageEditor()
                                ->disk('public')
                                ->directory('blogs')
                                ->preserveFilenames()
                                ->rules('required|image')
                                ->validationMessages([
                                    'required' => 'Please upload :attribute',
                                    'image' => 'Please upload a valid image',
                                ])
                                ->live() // Add live() here
                                ->columnSpan(2),

                            Builder::make('body')
                                ->label('Body Content')
                                ->blocks([
                                    Builder\Block::make('section_title')
                                        ->label('Section Title')
                                        ->schema([
                                            TextInput::make('title')
                                                ->label('Title')
                                                ->rules('required|string|min:3')
                                                ->validationMessages([
                                                    'required' => 'Please enter :attribute',
                                                    'string' => 'Please enter string value only',
                                                    'min' => 'The :attribute must be at least :min characters',
                                                ])
                                                ->live(), // Add live() here

                                            Select::make('level')
                                                ->options([
                                                    'h1' => 'Heading 1',
                                                    'h2' => 'Heading 2',
                                                    'h3' => 'Heading 3',
                                                    'h4' => 'Heading 4',
                                                    'h5' => 'Heading 5',
                                                    'h6' => 'Heading 6',
                                                ])
                                                ->rules('required')
                                                ->validationMessages([
                                                    'required' => 'Please select :attribute',
                                                ])
                                                ->live(), // Add live() here
                                        ]),
                                    Builder\Block::make('paragraph')
                                        ->schema([
                                            MarkdownEditor::make('content')
                                                ->label('Content')
                                                ->rules('required|min:3')
                                                ->validationMessages([
                                                    'required' => 'Please enter :attribute',
                                                    'min' => 'The :attribute must be at least :min characters',
                                                ])
                                                ->live(), // Add live() here
                                        ]),
                                ])->columnSpan(2)->collapsible(true),

                        ])->columns(2),
                ])->columnSpan(2),

                Section::make('Meta Data')->schema([
                    Toggle::make('is_published'),

                    Placeholder::make('created_at')
                        ->label('Created At')
                        ->content(fn (Blog $blog): ?string => $blog->created_at?->diffForHumans())
                        ->hidden(fn (Blog $blog) => $blog->id === null),

                    Placeholder::make('updated_at')
                        ->label('Updated At')
                        ->content(fn (Blog $blog): ?string => $blog->updated_at?->diffForHumans())
                        ->hidden(fn (Blog $blog) => $blog->id === null),

                    Placeholder::make('Created by')
                        ->label('Created by')
                        ->content(fn (Blog $blog): ?string => $blog->user->name)
                        ->hidden(fn (Blog $blog) => $blog->id === null),

                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('title'),
                ToggleColumn::make('is_published')->label('Published'),
                TextColumn::make('created_at')->label('Post Date')->dateTime('d-m-Y'),
                TextColumn::make('user.name')->label('Created By'),
                // ->hidden(fn (Blog $blog): bool => $blog->user_id !== auth()->user()->id),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->successNotification(
                        Notification::make()
                            ->title('Blog Deleted')
                            ->body('The blog post has been deleted successfully.')
                            ->success()
                            ->icon('heroicon-o-check-circle')
                            ->duration('3000'),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlogs::route('/create'),
            'edit' => Pages\EditBlogs::route('/{record}/edit'),
        ];
    }
}
