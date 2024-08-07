<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_price',
        'status',
        'session_id',
        'user_address_id',
        'created_by',
        'updated_by',
    ];

    public function userAddress()
    {
        return $this->belongsTo(UserAddress::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
