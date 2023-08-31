<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'brand',
        'smallDescription',
        'description',
        'originalPrice',
        'sellingPrice',
        'quantity',
        'trending',
        'status',
        'metaTitle',
        'metaKeywords',
        'mataDescription',
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function productImage(){
        return $this->hasMany(productImage::class,'product_id','id');
    }
    public function productColor()
    {
        return $this->hasMany(productColor::class, 'product_id', 'id');
    }
}
