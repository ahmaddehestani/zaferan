<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'stock_id',
        'name'
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function shops()
    {
        return $this->hasMany(ProductShop::class);
    }
}
