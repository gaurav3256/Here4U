<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamResource\Pages;
use App\Filament\Resources\TeamResource\RelationManagers;
use App\Models\Team;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
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

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Team';
    protected static ?string $navigationGroup = 'Team Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Team Member Information')
                    ->description('Provide the necessary details for each team member, Each member should have unique details to identify them.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Member Name')
                            ->placeholder('Enter member name')
                            ->rules('required|string|min:3')
                            ->validationMessages([
                                'required' => 'Please enter member name',
                                'string' => 'Please enter string value only',
                                'min' => 'The member name must be at least :min characters',
                            ]),
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->placeholder('Enter member email address')
                            ->rules('required|email|unique:teams,email|min:3')
                            ->validationMessages([
                                'required' => 'Please enter :attribute',
                                'email' => 'Please enter valid email only',
                                'unique' => 'This email is already registered',
                                'min' => 'The :attribute must be at least :min characters',
                            ]),
                        TextInput::make('phone')
                            ->label('Phone Number')
                            ->placeholder('Enter your phone number')
                            ->rules('required|digits:10')
                            ->validationMessages([
                                'required' => 'Please enter :attribute',
                                'digits' => 'Phone number must be exactly :digits digits',
                            ]),
                        FileUpload::make('image')
                            ->label('Profile Image')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('teams')
                            ->preserveFilenames()
                            ->storeFileNamesIn('original_file')
                            ->columnSpan(3),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('phone'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->successNotification(
                        Notification::make()
                            ->title('Member Deleted')
                            ->body('The team member has been deleted successfully.')
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
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
}
