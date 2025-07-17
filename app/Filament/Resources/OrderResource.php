<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use App\Models\Sale;
use Filament\Forms\Form;
use Filament\Forms\Components\{
    TextInput,
    DatePicker,
    Select
};
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\{
    TextColumn,
    BadgeColumn
};
use Filament\Tables\Actions\{
    Action,
    EditAction,
    DeleteAction,
    BulkActionGroup,
    DeleteBulkAction
};
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action as NotificationAction;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Pesanan';
    protected static ?string $navigationGroup = 'Manajemen Pesanan';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama_pemesan')
                ->required()
                ->maxLength(255),

            TextInput::make('no_wa')
                ->tel()
                ->required()
                ->maxLength(20),

            DatePicker::make('tanggal_pesan')
                ->required(),

            Select::make('menu_id')
                ->relationship('menu', 'nama')
                ->searchable()
                ->required(),

            TextInput::make('jumlah')
                ->numeric()
                ->minValue(1)
                ->required(),

            Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'konfirmasi' => 'Konfirmasi',
                    'dibatalkan' => 'Dibatalkan',
                    'selesai' => 'Selesai',
                ])
                ->default('pending')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_pemesan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('no_wa')
                    ->label('No WA'),

                TextColumn::make('menu.nama')
                    ->label('Menu'),

                TextColumn::make('jumlah'),

                TextColumn::make('tanggal_pesan')
                    ->date()
                    ->label('Tanggal')
                    ->sortable(),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'konfirmasi',
                        'danger' => 'dibatalkan',
                        'primary' => 'selesai',
                    ]),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),

                Action::make('Konfirmasi')
                    ->label('Konfirmasi')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->action(fn (Order $record) => $record->update(['status' => 'konfirmasi']))
                    ->visible(fn (Order $record) => $record->status === 'pending'),

                Action::make('Batalkan')
                    ->label('Batalkan')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->action(fn (Order $record) => $record->update(['status' => 'dibatalkan']))
                    ->visible(fn (Order $record) => $record->status !== 'dibatalkan'),

                Action::make('Selesaikan')
                    ->label('Selesaikan')
                    ->icon('heroicon-o-check-circle')
                    ->color('primary')
                    ->action(function (Order $record) {
                        // Update status
                        $record->update(['status' => 'selesai']);

                        // Simpan data penjualan
                        Sale::create([
                            'nama_pembeli' => $record->nama_pemesan,
                            'tanggal_penjualan' => $record->tanggal_pesan,
                            'total_item' => $record->jumlah,
                            'total_pendapatan' => $record->menu->harga * $record->jumlah,
                        ]);

                        // Siapkan pesan WhatsApp testimoni
                        $formLink = 'https://docs.google.com/forms/d/e/1FAIpQLScu18SXEEiowI33xxZLaUHujKRtfn-kwAdeX8U503u4nWhwbw/viewform?usp=header'; // Ganti dengan link Google Form asli
                        $pesan = urlencode(
                            "Halo *{$record->nama_pemesan}*,\n\n" .
                            "Terima kasih telah memesan *{$record->menu->nama}* di toko kami! 😊\n\n" .
                            "Mohon kesediaannya untuk mengisi testimoni melalui link berikut ya:\n" .
                            "$formLink\n\n" .
                            "Salam hangat 💖"
                        );

                        $waNumber = preg_replace('/[^0-9]/', '', $record->no_wa);

                    if (str_starts_with($waNumber, '0')) {
                        $waNumber = '62' . substr($waNumber, 1);
                    }

                    $url = "https://wa.me/$waNumber?text=$pesan";

                    Notification::make()
                        ->title('Pesanan Diselesaikan')
                        ->body('Silakan kirim link testimoni ke pelanggan.')
                        ->success()
                        ->actions([
                            NotificationAction::make('Kirim Form')
                                ->url($url)
                                ->button()
                                ->color('success')
                                ->openUrlInNewTab(),
                        ])
                        ->send();

                    })
                    ->visible(fn (Order $record) => $record->status === 'konfirmasi'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
