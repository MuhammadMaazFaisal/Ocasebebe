<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Length extends Model
{
    use HasFactory;

    protected $table = 'length';

    protected $fillable = ['name','stock','status'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
