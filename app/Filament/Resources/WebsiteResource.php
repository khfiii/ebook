<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Website;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\WebsiteResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\WebsiteResource\RelationManagers;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class WebsiteResource extends Resource {
    protected static ?string $model = Website::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form( Form $form ): Form {
        return $form
        ->schema( [
            Forms\Components\TextInput::make( 'slug' )
            ->required(),
            TinyEditor::make( 'content' )
            ->showMenuBar()
            ->toolbarSticky( true )
            ->columnSpanFull()
        ] );
    }

    public static function table( Table $table ): Table {
        return $table
        ->columns( [
            Tables\Columns\TextColumn::make( 'slug' )
            ->searchable(),
            Tables\Columns\TextColumn::make( 'created_at' )
            ->dateTime()
            ->sortable()
            ->toggleable( isToggledHiddenByDefault: true ),
            Tables\Columns\TextColumn::make( 'updated_at' )
            ->dateTime()
            ->sortable()
            ->toggleable( isToggledHiddenByDefault: true ),
        ] )
        ->filters( [
            //
        ] )
        ->actions( [
            Tables\Actions\EditAction::make(),
        ] )
        ->bulkActions( [
            Tables\Actions\BulkActionGroup::make( [
                Tables\Actions\DeleteBulkAction::make(),
            ] ),
        ] );
    }

    public static function getRelations(): array {
        return [
            //
        ];
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListWebsites::route( '/' ),
            'create' => Pages\CreateWebsite::route( '/create' ),
            'edit' => Pages\EditWebsite::route( '/{record}/edit' ),
        ];
    }
}
