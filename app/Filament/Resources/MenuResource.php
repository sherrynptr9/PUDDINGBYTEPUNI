<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Models\Menu;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationLabel = 'Daftar Menu';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup = 'Manajemen Menu';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('nama')
                ->label('Nama Menu')
                ->required()
                ->maxLength(255),

            Textarea::make('deskripsi')
                ->label('Deskripsi Menu')
                ->maxLength(500),

            TextInput::make('harga')
                ->label('Harga')
                ->numeric()
                ->required()
                ->prefix('Rp'),

            FileUpload::make('gambar')
                ->label('Gambar')
                ->image()
                ->directory('menus')
                ->imagePreviewHeight('150')
                ->nullable(),

            Toggle::make('is_favorit')
                ->label('Tandai sebagai Favorit')
                ->default(false),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama Menu')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('harga')
                    ->label('Harga')
                    ->money('IDR'),

                ImageColumn::make('gambar')
                    ->label('Foto')
                    ->circular(),

                IconColumn::make('is_favorit')
                    ->label('Favorit')
                    ->boolean()
                    ->trueIcon('heroicon-s-star')
                    ->falseIcon('heroicon-s-star')
                    ->trueColor('warning')
                    ->falseColor('gray'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
