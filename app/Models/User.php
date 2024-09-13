<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'number',
        'isAdmin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'created_by');
    }

    public function userAddresses()
    {
        return $this->hasMany(UserAddress::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'created_by');
    }

    public function createdProducts()
    {
        return $this->hasMany(Product::class, 'created_by');
    }

    public function updatedProducts()
    {
        return $this->hasMany(Product::class, 'updated_by');
    }

    public function deletedProducts()
    {
        return $this->hasMany(Product::class, 'deleted_by');
    }
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }


public function scopeFiltered(Builder $query)
{
    $query
        ->when(request('name'), function (Builder $q) {
            $q->where('name', 'like', '%' . request('name') . '%');
        })
        ->when(request('email'), function (Builder $q) {
            $q->where('email', 'like', '%' . request('email') . '%');
        })
        ->when(request('isAdmin'), function (Builder $q) {
            $q->where('isAdmin', request('isAdmin'));
        });
}

}
