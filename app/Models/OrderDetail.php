<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'amount',
        'subtotal',
        'registerby'
    ];

    
    protected $guarded=['id','status', 'registerby','created_at','updated_at'];
    public function product() {
        return $this->belongsTo(Product::class);
    }

    

    public function order() {
        return $this->belongsTo(Order::class);
    }
}