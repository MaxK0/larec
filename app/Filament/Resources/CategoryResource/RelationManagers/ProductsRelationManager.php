<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use App\Models\Product;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    protected static ?string $label = 'Товары';
    protected static ?string $pluralLabel = 'Товары';
    protected static ?string $modelLabel = 'Товары';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Название')
                    ->required(),

                Textarea::make('description')
                    ->label('Описание'),

                TextInput::make('price')
                    ->label('Цена')
                    ->required()
                    ->integer(),

                FileUpload::make('image')
                    ->label('Изображение')
                    ->image(),

                Placeholder::make('created_at')
                    ->label('Создано')
                    ->content(fn(?Product $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Изменено')
                    ->content(fn(?Product $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('image')
                    ->label('Изображение'),

                TextColumn::make('price')
                    ->label('Цена'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
