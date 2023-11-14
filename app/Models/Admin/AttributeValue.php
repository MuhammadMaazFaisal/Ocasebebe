<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    // public function get_attr(){
    //     return $this->belongsTo(Variant::class,'variants_id');
    // }
    public function attribute_value()
    {
        return $this->hasOne(AttributeValue::class, 'id');
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
}
