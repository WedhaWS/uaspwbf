<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrdersResource\Pages;
use App\Filament\Resources\OrdersResource\RelationManagers;
use App\Models\Orders;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersResource extends Resource
{
    protected static ?string $model = Orders::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\BelongsToSelect::make('user_id')
                    ->relationship('user', 'name')
                    ->label('User'),
                Forms\Components\BelongsToSelect::make('promo_code_id')
                    ->relationship('promoCode', 'code')
                    ->label('Promo Code')
                    ->live() // Membuat reaktif
                    ->afterStateUpdated(function (callable $set, $state, $get) {
                        $productPrice = optional(\App\Models\Product::find($get('product_id')))->price ?? 0;
                        $discountAmount = optional(\App\Models\PromoCode::find($state))->discount_amount ?? 0;
                        $set('total_amount', max(0, $productPrice - $discountAmount)); // Pastikan tidak negatif
                    }),
                Forms\Components\BelongsToSelect::make('product_id')
                    ->relationship('product', 'name')
                    ->label('Product')
                    ->live() // Membuat komponen reaktif
                    ->afterStateUpdated(
                        function (callable $set, $state, $get) {
                            $discountAmount = optional(\App\Models\PromoCode::find($get('promo_code_id')))->discount_amount ?? 0;
                            $productPrice = optional(\App\Models\Product::find($state))->price ?? 0;
                            $set('total_amount', max(0, $productPrice - $discountAmount));
                            $set('end_date', \Carbon\Carbon::now()->addDays(optional(\App\Models\Product::find($state))->duration + 1)->format('Y-m-d'));
                        }
                    )
                    ->required(),
                Forms\Components\DateTimePicker::make('order_date')
                    ->label('Order Date')
                    ->required(),
                Forms\Components\TextInput::make('total_amount')
                    ->label('Total Amount')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('address')
                    ->label('Address')
                    ->required(),
                Forms\Components\TextInput::make('city')
                    ->label('City')
                    ->required(),
                Forms\Components\TextInput::make('postal_code')
                    ->label('Postal Code')
                    ->required(),
                Forms\Components\DatePicker::make('start_date')
                    ->label('Start Date')
                    ->required()
                    ->default(fn() => now()->addDay()), // Start date = today + 1

                Forms\Components\DatePicker::make('end_date')
                    ->label('End Date')
                    ->required()
                    ->default(function ($livewire) {
                        $productId = $livewire->data['product_id'] ?? null;

                        if ($productId) {
                            $product = \App\Models\Product::find($productId);
                            if ($product && $product->duration) {
                                return now()->addDays($product->duration + 1);
                            }
                        }

                        return now()->addDay(); // Default fallback if product_id is not set
                    }),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User'),
                Tables\Columns\TextColumn::make('promoCode.code')
                    ->label('Promo Code'),
                Tables\Columns\TextColumn::make('product.name')
                    ->label('Product'),
                Tables\Columns\TextColumn::make('order_date')
                    ->label('Order Date'),
                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Total Amount'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status'),
                Tables\Columns\TextColumn::make('address')
                    ->label('Address'),
                Tables\Columns\TextColumn::make('city')
                    ->label('City'),
                Tables\Columns\TextColumn::make('postal_code')
                    ->label('Postal Code'),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Start Date'),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('End Date'),

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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrders::route('/create'),
            'edit' => Pages\EditOrders::route('/{record}/edit'),
        ];
    }
}
