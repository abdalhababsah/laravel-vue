<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hex_code',
    ];

    /**
     * Get the products that have this color.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_colors');
    }
}
