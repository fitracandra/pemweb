<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TransactionResource\Pages;
use App\Filament\Admin\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('kode_transaksi')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),

            Forms\Components\Select::make('pelanggan_id')
                ->relationship('pelanggan', 'nama')
                ->required(),

            Forms\Components\Select::make('product_id')
                ->label('Produk')
                ->relationship('product', 'nama')
                ->required()
                ->reactive()
                ->afterStateUpdated(function ($state, callable $set) {
                    $product = \App\Models\Product::find($state);
                    if ($product) {
                        $set('jumlah', $product->harga);
                    }
                }),

            Forms\Components\Select::make('jenis')
                ->options([
                    'debit' => 'Debit',
                    'kredit' => 'Kredit',
                ])
                ->required(),

            Forms\Components\TextInput::make('jumlah')
                ->numeric()
                ->required(),

            Forms\Components\Textarea::make('keterangan'),

            Forms\Components\DatePicker::make('tanggal')
                ->required(),
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('kode_transaksi')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('pelanggan.nama')->label('Pelanggan')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('product.nama')->label('Produk')->sortable(),
            Tables\Columns\TextColumn::make('jenis')->sortable(),
            Tables\Columns\TextColumn::make('jumlah')->money('IDR'),
            Tables\Columns\TextColumn::make('tanggal')->date(),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
