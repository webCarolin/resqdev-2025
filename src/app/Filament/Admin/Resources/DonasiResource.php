<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DonasiResource\Pages;
use App\Models\Donasi;
use App\Models\Donatur;
use App\Models\Bencana;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DonasiResource extends Resource
{
    protected static ?string $model = Donasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = 'Manajemen Donasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('donatur_id')
                    ->label('Donatur')
                    ->options(Donatur::pluck('nama', 'id'))
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('bencana_id')
                    ->label('Bencana')
                    ->options(Bencana::pluck('nama_bencana', 'id'))
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('jumlah_donasi')
                    ->label('Jumlah Donasi')
                    ->numeric()
                    ->required(),

                Forms\Components\DatePicker::make('tanggal_donasi')
                    ->label('Tanggal Donasi')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('donatur.nama')
                    ->label('Donatur')
                    ->searchable(),

                Tables\Columns\TextColumn::make('bencana.nama_bencana')
                    ->label('Bencana'),

                Tables\Columns\TextColumn::make('jumlah_donasi')
                    ->label('Jumlah Donasi')
                    ->money('IDR', true),

                Tables\Columns\TextColumn::make('tanggal_donasi')
                    ->label('Tanggal Donasi')
                    ->date(),
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
            'index' => Pages\ListDonasis::route('/'),
            'create' => Pages\CreateDonasi::route('/create'),
            'edit' => Pages\EditDonasi::route('/{record}/edit'),
        ];
    }
}
