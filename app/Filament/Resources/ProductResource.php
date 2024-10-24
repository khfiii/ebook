<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Livewire\Component;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProductType;
use Filament\Resources\Resource;    
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\ProductResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Section::make('General Product')
               ->columns(2)
               ->schema([
                TextInput::make('name')
                ->required(),
                TextInput::make('author')
                ->required(),
                TextInput::make('price')
                ->required()
                ->numeric(),
                Select::make('product_type_id')
                ->relationship('productType', 'name')
                ->required(),
                Textarea::make('description')
                ->required()
                ->columnSpanFull(),
               ]),
               Section::make('Media Product')
               ->columns(2)
               ->schema([
                SpatieMediaLibraryFileUpload::make('cover')
                ->disk('file')
                ->collection(function(Get $get){
                    return str(ProductType::find($get('product_type_id'))->name)->append('-cover'); 
                })
                ->image()
                ->imageEditor()
                ->imageEditorAspectRatios([
                    '16:9',
                    '4:3',
                    '1:1',
                ])
                ->required(),
                SpatieMediaLibraryFileUpload::make('file')
                ->collection(function(Get $get){
                    return str(ProductType::find($get('product_type_id'))->name)->append('-file'); 
                })
                ->required(),
               ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
