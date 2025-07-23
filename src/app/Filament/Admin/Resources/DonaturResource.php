<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DonaturResource\Pages;
use App\Models\Donatur;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class DonaturResource extends Resource
{
    protected static ?string $model = Donatur::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Manajemen Donasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\TextInput::make('email')->required()->email(),
                Forms\Components\TextInput::make('no_hp')->required(),
                Forms\Components\TextInput::make('alamat')->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable(),

                Tables\Columns\TextColumn::make('email'),

                Tables\Columns\TextColumn::make('email_enkripsi')
                    ->label('Email Enkripsi')
                    ->formatStateUsing(fn ($state) =>
                        $state ? Str::limit($state, 20, '...') : '-'),

                Tables\Columns\TextColumn::make('no_hp'),

                Tables\Columns\TextColumn::make('no_hp_enkripsi')
                    ->label('No HP Enkripsi')
                    ->formatStateUsing(fn ($state) =>
                        $state ? Str::limit($state, 20, '...') : '-'),

                Tables\Columns\TextColumn::make('alamat')->wrap(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDonaturs::route('/'),
            'create' => Pages\CreateDonatur::route('/create'),
            'edit' => Pages\EditDonatur::route('/{record}/edit'),
        ];
    }
}
