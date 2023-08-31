<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wishlist extends Model
{
    use HasFactory;

    // protected $table = 'whislists';

    protected $fillable =[
        'userID',
        'productID'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(product::class, 'productID', 'id');
    }
}
