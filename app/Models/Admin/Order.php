<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Product;
use App\Models\User;
use App\Models\Admin\Length;
use App\Models\Admin\OrderDetails;

class Order extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }

    // public function billing_address(){
    //     return $this->hasOne(UserAddress::class, 'id','billing_address_id');
    // }
    // public function shipping_address(){
    //     return $this->hasOne(UserAddress::class, 'id','shipping_address_id');
    // }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function full_name($id)
    {
        $user = User::find($id);
        return ucfirst($user->name);
        // return ucfirst($user->first_name).' '.ucfirst($user->last_name);
    }

    // public function order_product(){
    //     return $this->hasMany(BillingInfo::class, 'order_id');
    // }

    // public function order_address(){
    //     return $this->hasOne(OrderAddress::class, 'order_id');
    // }
    // public function lengthProducts()
    // {
    //     return $this->hasMany(Length::class, 'order_id');
    // }
    public function lengthvalue()
    {
        return $this->hasMany(Length::class);
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetails::class);
    }
}
