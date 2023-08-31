<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $fillable=[
        'name',
        'slug',
        'description',
        'image',
        'status',
        'metaTitle',
        'metaKeywords',
        'metaDescription',
    ];
    public function products()
    {
        return $this->hasmany(product::class,'category_id','id');
    }

    public function brands()
    {
        return $this->hasmany(Brands::class,'categoryID','id')->where('status','on');
    }
}
