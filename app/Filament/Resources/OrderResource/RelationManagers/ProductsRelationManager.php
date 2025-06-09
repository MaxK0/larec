<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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

                TextInput::make('quantity')
                    ->integer()
                    ->label('Количество'),

                Select::make('category_id')
                    ->label('Категория')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                FileUpload::make('image')
                    ->label('Изображение')
                    ->image(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('image')
                    ->label('Изображение'),

                TextColumn::make('price')
                    ->label('Цена'),

                TextColumn::make('category.name')
                    ->label('Категория')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('quantity')
                    ->label('Количество')
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
