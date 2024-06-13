<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'image', 'description', 'price', 'expiration_date', 'amount', 'status'];

    protected $guarded = ['id', 'status', 'registerby', 'created_at', 'updated_at'];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
