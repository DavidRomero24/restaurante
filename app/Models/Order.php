<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table='orders';

    protected $fillable=['product_id','customer_id','date','total','status'];

    protected $guarded=['id','status', 'registerby','created_at','updated_at'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }


    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
