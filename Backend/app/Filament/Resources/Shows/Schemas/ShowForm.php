<?php

namespace App\Filament\Resources\Shows\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ShowForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('age_recommendation'),
                TextInput::make('duration_minutes')
                    ->required()
                    ->numeric(),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->maxSize(20480),
                TextInput::make('url')
                    ->label('Előadás linkje (URL)')
                    ->url()
                    ->placeholder('https://...')
                    ->helperText('Opcionális külső link az előadás részleteihez'),
                Select::make('language')
                    ->label('Előadás nyelve')
                    ->options([
                        'hu'   => 'Magyar',
                        'ro'   => 'Román',
                        'both' => 'Magyar és Román',
                    ])
                    ->default('hu')
                    ->required()
                    ->helperText('Milyen nyelven tartják az előadást?'),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
