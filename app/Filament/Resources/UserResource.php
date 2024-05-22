<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Users';
    protected static ?string $navigationGroup = 'Users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('User information')
                    ->description('Provide the necessary details about the user.')
                    ->schema([
                        TextInput::make('name')
                            ->label('User Name')
                            ->placeholder('Enter user name')
                            ->rules('required|string|min:3')
                            ->validationMessages([
                                'required' => 'Please enter :attribute',
                                'string' => 'Please enter string value only',
                                'min' => 'The :attribute must be at least :min characters',
                            ])
                            ->live(),
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->placeholder('Enter your email address')
                            ->rules('required|email|min:3')
                            ->validationMessages([
                                'required' => 'Please enter :attribute',
                                'email' => 'Please enter valid email only',
                                'min' => 'The :attribute must be at least :min characters',
                            ])
                            ->live(),
                        TextInput::make('password')
                            ->label('Password')
                            ->password()
                            ->placeholder('Enter your password')
                            ->rules('required|string|min:3')
                            ->validationMessages([
                                'required' => 'Please enter :attribute',
                                'string' => 'Please enter string value only',
                                'min' => 'The :attribute must be at least :min characters',
                            ])
                            ->live(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('created_at'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->successNotification(
                        Notification::make()
                            ->title('User Deleted')
                            ->body('The user has been deleted successfully.')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
