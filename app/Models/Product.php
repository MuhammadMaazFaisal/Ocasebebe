<?php

namespace App\Models\BackendModels;

use BinaryCats\Sku\HasSku;
use App\Models\FrontendModels\Order;
use App\Models\FrontendModels\Review;
use BinaryCats\Sku\Concerns\SkuOptions;
use Illuminate\Database\Eloquent\Model;
use App\Models\BackendModels\ProductAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    use HasFactory;
    use HasSku;
// $protected=['']
    public function skuOptions() : SkuOptions
    {
        return SkuOptions::make()
            ->from(['label', 'another_field'])
            ->target('sku')
            ->using('EdifyEliteExtensions-')
            ->forceUnique(false)
            ->generateOnCreate(true)
            ->refreshOnUpdate(false);
    }

    public function parentCategory()
    {
        return $this->belongsTo(ParentCategory::class, 'parent_category_id');
    }

    public function get_main_category(){
        return $this->belongsTo(MainCategory::class,'main_category_id');
    }
    public function get_sub_category(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
    public function get_brand_name(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function order(){
        return $this->hasOne(Order::class,'product_id')->withDefault();
    }


    public function product_attribute(){
        return $this->hasOne(ProductAttribute::class, 'product_id','id');
    }

    public function get_ratings(){
        return $this->hasMany(Review::class,'product_id');
    }
    public function length()
{
    return $this->belongsTo(Length::class);
}

public function setlength_idattribute($value)
{
    $this->attributes['length_id'] = json_encode($value);
}
public function getlength_idattribute($value)
{
    return $this->attributes['length_id'] = json_decode($value);
}

}
