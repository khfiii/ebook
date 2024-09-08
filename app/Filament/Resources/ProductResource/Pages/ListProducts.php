<?php

namespace App\Filament\Resources\ProductResource\Pages;

use Filament\Actions;
use App\Models\Product;
use App\Enums\ProductType;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {

        return [
            'Ebooks' => Tab::make()
            ->modifyQueryUsing(fn(Builder $query)=> $query->whereHas('productType', fn($query)=> $query->where('name', ProductType::EBOOK)))
            ->badge(Product::withCount(['productType' => fn($query)=>$query->where('name', ProductType::EBOOK)])?->first()->product_type_count ?? 0),
            'Templates' => Tab::make()
            ->modifyQueryUsing(fn(Builder $query)=> $query->whereHas('productType', fn($query)=> $query->where('name', ProductType::TEMPLATE)))
            ->badge(Product::withCount(['productType' => fn($query)=>$query->where('name', ProductType::TEMPLATE)])?->first()->product_type_count ?? 0),
            'Assets' => Tab::make()
            ->modifyQueryUsing(fn(Builder $query)=> $query->whereHas('productType', fn($query)=> $query->where('name', ProductType::ASSET)))
            ->badge(Product::withCount(['productType' => fn($query)=>$query->where('name', ProductType::ASSET)])?->first()->product_type_count ?? 0),
        ];
        
    }

public function getDefaultActiveTab(): string | int | null
{
    return 'Ebooks';
}
}
