<?php

namespace App\Filament\Resources\Properties;

use App\Filament\Resources\Properties\Pages\ManageProperties;
use App\Models\Property;
use App\Models\PropertyType;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\SelectFilter;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;

    protected static ?string $recordTitleAttribute = 'title';
    
    protected static \UnitEnum|string|null $navigationGroup = 'Property Management';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Property Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),
                            
                        Textarea::make('description')
                            ->required()
                            ->rows(4)
                            ->columnSpan(2),
                            
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('₹'),
                            
                        Select::make('property_type_id')
                            ->label('Property Type')
                            ->options(PropertyType::all()->pluck('name', 'id'))
                            ->required(),
                    ])
                    ->columns(2),
                    
                Section::make('Location')
                    ->schema([
                        TextInput::make('address')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),
                            
                        TextInput::make('city')
                            ->required()
                            ->maxLength(255),
                            
                        TextInput::make('state')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(2),
                    
                Section::make('Property Features')
                    ->schema([
                        TextInput::make('cabins')
                            ->label('Cabins')
                            ->required()
                            ->numeric()
                            ->minValue(1),
                            
                        TextInput::make('bathrooms')
                            ->required()
                            ->numeric()
                            ->minValue(1),
                            
                        TextInput::make('area')
                            ->label('Area')
                            ->required()
                            ->numeric()
                            ->minValue(1)
                            ->suffix('sq ft'),
                            
                        Select::make('work_station')
                            ->label('Work Station')
                            ->options([
                                'Modular' => 'Modular',
                                'Normal' => 'Normal',
                            ])
                            ->default('Normal')
                            ->required(),
                            
                        Select::make('status')
                            ->options([
                                'available' => 'Available',
                                'sold' => 'Sold',
                                'rented' => 'Rented',
                            ])
                            ->default('available')
                            ->required(),
                    ])
                    ->columns(4),
                    
                Section::make('Settings')
                    ->schema([
                        Toggle::make('featured')
                            ->label('Featured Property')
                            ->helperText('Featured properties appear on homepage'),
                    ]),
                    
                Section::make('Property Images')
                    ->schema([
                        FileUpload::make('property_images')
                            ->label('Upload Images')
                            ->multiple()
                            ->image()
                            ->directory('properties')
                            ->disk('public')
                            ->visibility('public')
                            ->maxFiles(10)
                            ->reorderable()
                            ->imagePreviewHeight('200')
                            ->loadingIndicatorPosition('center')
                            ->panelAspectRatio('16:9')
                            ->removeUploadedFileButtonPosition('top-right')
                            ->uploadButtonPosition('center')
                            ->helperText('Upload up to 10 images. Recommended size: 800x600px')
                            ->columnSpanFull(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->size(80)
                    ->square()
                    ->getStateUsing(function ($record) {
                        if ($record->property_images && count($record->property_images) > 0) {
                            return asset('storage/' . $record->property_images[0]);
                        }
                        return asset('images/img_1.jpg');
                    }),
                    
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                    
                TextColumn::make('price')
                    ->money('INR')
                    ->sortable(),
                    
                TextColumn::make('city')
                    ->searchable(),
                    
                TextColumn::make('propertyType.name')
                    ->label('Type'),
                    
                TextColumn::make('cabins')
                    ->suffix(' cabins'),
                    
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'available' => 'success',
                        'sold' => 'danger',
                        'rented' => 'warning',
                    }),
                    
                BooleanColumn::make('featured'),
            ])
            ->filters([
                SelectFilter::make('property_type_id')
                    ->label('Property Type')
                    ->options(PropertyType::all()->pluck('name', 'id')),
                    
                SelectFilter::make('status')
                    ->options([
                        'available' => 'Available',
                        'sold' => 'Sold',
                        'rented' => 'Rented',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => ManageProperties::route('/'),
        ];
    }
}
