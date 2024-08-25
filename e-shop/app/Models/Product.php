<?php

namespace App\Models;
use Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory, HasSlug, SoftDeletes;


    protected $fillable = [
        'title',
        'slug',
        'description',
        'published',
        'in_stock',
        'quantity',
        'price',
        'created_by',
        'updated_by',
        'deleted_by',
        'brand_id',
        'category_id',
    ];

    public function wishlistItems()
    {
        return $this->hasMany(WishlistItem::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product_images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    // filtering
    public function scopeFiltered(Builder $query)
    {
        $query
            ->when(request('brands'), function (Builder $q) {
                $q->whereIn('brand_id', request('brands'));
            })
            ->when(request('categories'), function (Builder $q) {
                $q->whereIn('category_id', request('categories'));
            })
            ->when(request('prices'), function (Builder $q) {
                $q->whereBetween('price', [
                    request('prices.from', 0),
                    request('prices.to', 1000),
                ]);
            })
            ->when(request('colors'), function (Builder $q) {
                $q->whereHas('colors', function (Builder $q) {
                    $q->whereIn('color_id', request('colors'));
                });
            });
    }
}
