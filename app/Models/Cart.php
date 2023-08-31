<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'userID',
        'productID',
        'productColorId',
        'quantity'
    ];
    public function product(): BelongsTo
    {
        return $this->belongsTo(product::class,'productID','id');
    }

    public function productColor(): BelongsTo
    {
        return $this->belongsTo(productColor::class,'productColorId','id');
    }
}
