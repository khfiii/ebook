<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia,  SoftDeletes;

    

    protected $fillable = ['name','author', 'description', 'price', 'product_type_id'];

    public function productType():BelongsTo
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }
}
