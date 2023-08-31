<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class productColor extends Model
{
    use HasFactory;

    protected $table = 'products_colors';

    protected$fillable = [
        'product_id',
        'color_id',
        'quantity'
    ];
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
}
