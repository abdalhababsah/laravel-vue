<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;


    protected $table = 'invoices';
    protected $fillable = [
        'order_id',
        'amount',
        'status',
        'issued_at',
    ];
    protected $dates = [
        'issued_at',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
