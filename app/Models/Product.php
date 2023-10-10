<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{

// $protected=['']
    use HasFactory;
    protected $fillable = [
        'category',
        'product_name',
        'price',
        'discount_price',
        'image',
        'multiple_image',
        'status',
        'description',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

}
