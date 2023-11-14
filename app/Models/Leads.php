<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Product;

class Leads extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'leads', 'id', 'product_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'leads', 'id', 'user_id');
    }
}
