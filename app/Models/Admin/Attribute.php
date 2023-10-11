<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    // protected $fillable = ['product_id','attribute','attribute_value','stock'];

    public function get_attr(){
        return $this->hasMany(AttributeValue::class,'attribute_id');
    }


}
