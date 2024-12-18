<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialsResource\Pages;
use App\Filament\Resources\TestimonialsResource\RelationManagers;
use App\Models\Testimonials;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimonialsResource extends Resource
{
    protected static ?string $model = Testimonials::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\BelongsToSelect::make('customer_id')
                ->relationship('customer','name')
                ->required(),
                Forms\Components\TextInput::make('comment')
                ->required(),
                Forms\Components\Select::make('rating')
                    ->required()
                    ->label('Rating')
                    ->options([
                        1 => '1 - Poor',
                        2 => '2 - Fair',
                        3 => '3 - Good',
                        4 => '4 - Very Good',
                        5 => '5 - Excellent',
                    ]),
                    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.name')
                    ->label('Customer Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('comment'),
                Tables\Columns\TextColumn::make('rating'),
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonials::route('/create'),
            'edit' => Pages\EditTestimonials::route('/{record}/edit'),
        ];
    }
}
