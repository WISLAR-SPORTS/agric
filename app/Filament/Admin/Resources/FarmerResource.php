<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FarmerResource\Pages;
use App\Models\Farmer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FarmerResource extends Resource
{
    protected static ?string $model = Farmer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('farmer_number')
                    ->disabled()
                    ->dehydrated(false),

                Forms\Components\TextInput::make('first_name')
                    ->required(),

                Forms\Components\TextInput::make('last_name')
                    ->required(),

                Forms\Components\Select::make('gender')
                    ->options([
                        'Male' => 'Male',
                        'Female' => 'Female',
                    ]),

                Forms\Components\DatePicker::make('date_of_birth'),

                Forms\Components\TextInput::make('phone')
                    ->tel(),

                Forms\Components\TextInput::make('email')
                    ->email(),

                Forms\Components\TextInput::make('national_id'),

                Forms\Components\TextInput::make('district'),

                Forms\Components\TextInput::make('sub_county'),

                Forms\Components\TextInput::make('village'),

                Forms\Components\TextInput::make('farm_size')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('farmer_number')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('first_name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('last_name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('phone'),

                Tables\Columns\TextColumn::make('district'),

                Tables\Columns\TextColumn::make('created_at')
                    ->date()
                    ->sortable(),
            ])
           
            ->headerActions([
                Tables\Actions\Action::make('export_farmers_excel')
                    ->label('Export Farmers Excel')
                    ->url(route('farmers.export.excel'))
                    ->openUrlInNewTab(),
            
                Tables\Actions\Action::make('export_users_excel')
                    ->label('Export Users Excel')
                    ->url(route('users.export.excel'))
                    ->openUrlInNewTab(),
            
                Tables\Actions\Action::make('export_users_pdf')
                    ->label('Export Users PDF')
                    ->url(route('users.export.pdf'))
                    ->openUrlInNewTab(),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFarmers::route('/'),
            'create' => Pages\CreateFarmer::route('/create'),
            'edit' => Pages\EditFarmer::route('/{record}/edit'),
        ];
    }
}