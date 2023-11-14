<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Admin\Product;

class Review extends Model
{
    use HasFactory;

    public function get_user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function get_product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}