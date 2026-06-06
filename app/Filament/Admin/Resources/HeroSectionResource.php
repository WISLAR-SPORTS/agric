<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\HeroSectionResource\Pages;
use App\Models\HeroSection;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;

// Forms
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;

// Tables
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;

class HeroSectionResource extends Resource
{
    protected static ?string $model = HeroSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->required()
                ->maxLength(255),

            TextInput::make('subtitle')
                ->maxLength(255),

            Textarea::make('description')
                ->rows(4)
                ->columnSpanFull(),

            TextInput::make('button_text')
                ->label('Button Text')
                ->maxLength(255),

                TextInput::make('button_link')
                ->label('Button Link')
                ->rules(['regex:/^\/[a-zA-Z0-9\/_-]*$/'])
                ->helperText('Use internal links like /about or /contact'),

            FileUpload::make('background_image')
                ->image()
                ->directory('hero-sections')
                ->imageEditor(),

            Toggle::make('status')
                ->afterStateUpdated(function ($state, $record) {
                    if ($state && $record) {
                        HeroSection::where('id', '!=', $record->id)
                            ->update(['status' => false]);
                    }
                }),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            ImageColumn::make('background_image')
                ->label('Background'),

            TextColumn::make('title')
                ->searchable()
                ->sortable(),

            TextColumn::make('subtitle')
                ->limit(30),

            TextColumn::make('button_text')
                ->label('Button'),

            BooleanColumn::make('status'),

            TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
        ])
        ->actions([
            \Filament\Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            \Filament\Tables\Actions\BulkActionGroup::make([
                \Filament\Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHeroSections::route('/'),
            'create' => Pages\CreateHeroSection::route('/create'),
            'edit' => Pages\EditHeroSection::route('/{record}/edit'),
        ];
    }
}