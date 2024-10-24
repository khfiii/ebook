<?php

namespace App\Models;

use App\Models\Post;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model implements HasMedia {
    use HasFactory, InteractsWithMedia,  SoftDeletes;

    protected $fillable = [ 'name', 'author', 'description', 'price', 'product_type_id' ];

    public function productType():BelongsTo {
        return $this->belongsTo( ProductType::class, 'product_type_id' );
    }

    public function posts() {
        return $this->hasMany( Post::class );
    }
}
