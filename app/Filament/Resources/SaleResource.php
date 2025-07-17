<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaleResource\Pages;
use App\Models\Sale;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\{
    TextInput,
    DatePicker
};
use Filament\Tables\Columns\{
    TextColumn,
    BadgeColumn
};

class SaleResource extends Resource
{
    protected static ?string $model = Sale::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'Laporan Penjualan';
    protected static ?string $navigationGroup = 'Laporan';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama_pembeli')
                ->required()
                ->maxLength(255),
            DatePicker::make('tanggal_penjualan')
                ->required(),
            TextInput::make('total_item')
                ->numeric()
                ->required()
                ->minValue(1),
            TextInput::make('total_pendapatan')
                ->numeric()
                ->prefix('Rp')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('nama_pembeli')->searchable()->sortable(),
            TextColumn::make('tanggal_penjualan')->date()->sortable(),
            TextColumn::make('total_item'),
            TextColumn::make('total_pendapatan')->money('IDR'),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSales::route('/'),
            'create' => Pages\CreateSale::route('/create'),
            'edit' => Pages\EditSale::route('/{record}/edit'),
        ];
    }
}
