<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AboutSectionResource\Pages;
use App\Filament\Admin\Resources\AboutSectionResource\RelationManagers;
use App\Models\AboutSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutSectionResource extends Resource
{
    protected static ?string $model = AboutSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
    
                Forms\Components\Textarea::make('description')
                    ->rows(5)
                    ->columnSpanFull(),
    
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('about-sections')
                    ->imageEditor(),
    
                Forms\Components\Textarea::make('mission')
                    ->rows(4)
                    ->columnSpanFull(),
    
                Forms\Components\Textarea::make('vision')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
    
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
    
                Tables\Columns\TextColumn::make('mission')
                    ->limit(50),
    
                Tables\Columns\TextColumn::make('vision')
                    ->limit(50),
    
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListAboutSections::route('/'),
            'create' => Pages\CreateAboutSection::route('/create'),
            'edit' => Pages\EditAboutSection::route('/{record}/edit'),
        ];
    }
    public function images()
{
    return $this->hasMany(AboutImage::class);
}
}
