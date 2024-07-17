<?php

namespace App\Http\Services\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function all(): Collection
    {
        return Product::all();
    }

    public function store(array $payload)
    {
        return Product::create([
            'stock_id' => $payload['stock_id'],
            'name'     => $payload['name'],
        ]);
    }
    public function update($eloquent,array $payload)
    {
        return $eloquent->update([
            'stock_id' => $payload['stock_id'],
            'name'     => $payload['name'],
        ]);
    }


}
