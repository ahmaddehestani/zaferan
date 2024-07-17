<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'nature',//sale( خروجی از انبار) buy(ورودی به انبار)
        'stock_id',
        'product_id',
        'shop_id',
        'date',
        'amount'
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function getProductReport($nature, $productId, $starDate, $endDate)
    {
        return $this->query()
                    ->where('nature', $nature)
                    ->where('product_id', $productId)
                    ->whereBetween('date', [$starDate, $endDate])->get();
    }

    public function getShopReport($productId, $shopId, $starDate, $endDate)
    {
        return $this->query()
                    ->where('product_id', $productId)
                    ->where('shop_id', $shopId)
                    ->whereBetween('date', [$starDate, $endDate])->get();
    }


}
