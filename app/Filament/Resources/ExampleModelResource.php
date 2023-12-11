<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExampleModelResource\Pages;
use App\Filament\Resources\ExampleModelResource\RelationManagers;
use App\Models\ExampleModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ExampleModelResource extends Resource
{
    protected static ?string $model = ExampleModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Repeater::make('example_json')
                    ->simple(Forms\Components\TextInput::make('name'))
                    ->default([''])
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                //
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
            'index' => Pages\ListExampleModels::route('/'),
            'create' => Pages\CreateExampleModel::route('/create'),
            'edit' => Pages\EditExampleModel::route('/{record}/edit'),
        ];
    }
}
