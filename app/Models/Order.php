<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_price',
        'status',
        'session_id',
        'user_address_id',
        'created_by',
        'user_id',
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


    public function scopeFiltered(Builder $query, Request $request)
    {
        $query
            ->when($request->input('searchQuery'), function (Builder $q) use ($request) {
                $q->whereHas('user', function (Builder $q) use ($request) {
                    $q->where('name', 'like', '%' . $request->input('searchQuery') . '%');
                });
            })
            ->when($request->input('status'), function (Builder $q) use ($request) {
                $statuses = explode(',', $request->input('status'));
                $q->whereIn('status', $statuses);
            });
    }

}
