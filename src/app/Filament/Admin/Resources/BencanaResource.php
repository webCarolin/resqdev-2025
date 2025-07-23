<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BencanaResource\Pages;
use App\Models\Bencana;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BencanaResource extends Resource
{
    protected static ?string $model = Bencana::class;

    protected static ?string $navigationIcon = 'heroicon-o-fire';
    protected static ?string $navigationGroup = 'Manajemen Donasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_bencana')
                    ->required(),
                Forms\Components\TextInput::make('lokasi')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'belum ditangani' => 'Belum Ditangani',
                        'dalam proses' => 'Dalam Proses',
                        'selesai' => 'Selesai',
                    ])
                    ->default('belum ditangani')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_bencana')->searchable(),
                Tables\Columns\TextColumn::make('lokasi'),
                Tables\Columns\BadgeColumn::make('status')->colors([
                    'danger' => 'belum ditangani',
                    'warning' => 'dalam proses',
                    'success' => 'selesai',
                ]),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->dateTime(),
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
            'index' => Pages\ListBencanas::route('/'),
            'create' => Pages\CreateBencana::route('/create'),
            'edit' => Pages\EditBencana::route('/{record}/edit'),
        ];
    }
}
