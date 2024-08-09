<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'color_id',
    ];

    /**
     * Get the product that owns this color association.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the color that is associated with the product.
     */
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
