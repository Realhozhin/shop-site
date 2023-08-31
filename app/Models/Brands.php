<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = 'brands';

    protected $fillable = [
        'name',
        'slug',
        'status',
        'categoryID'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryID', 'id');
    }
}
