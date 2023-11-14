<?php

namespace App\Models;

use App\Models\Admin\Product;
use App\Models\Admin\AttributeValue;
use App\Models\Admin\Length;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function attributeValue(){
        return $this->belongsTo(AttributeValue::class,'color_id');
    }
    public function lengthvalue(){

        return $this->belongsTo(Length::class,'length');
    }

}