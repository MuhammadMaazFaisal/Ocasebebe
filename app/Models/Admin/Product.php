<?php

namespace App\Models\Admin;

use App\Models\Admin\Order;
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

    public function parentCategory()
    {
        return $this->belongsTo(ParentCategory::class);
    }

    public function length()
    {
        return $this->belongsTo(Length::class);
    }

    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
}
