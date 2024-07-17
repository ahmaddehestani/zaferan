<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductShop extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'shop_id',
        'quantity',
        'price',
    ];

    public function shops(): HasMany
    {
        return $this->hasMany(Shop::class);
    }
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function scopeAvailable(): Collection
    {
        return $this->query()->where('quantity','>',0)->get();
    }
}
