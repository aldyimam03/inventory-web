<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestInventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'division_id',
        'product_id',
        'variant_id',
        'quantity',
        'note',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
