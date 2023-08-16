<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'store_id',
        'product_name',
        'description',
        'price',
        'quantity',
        'created_at',
        'updated_at'
    ];

    public function validateData(array $data)
    {
        $validator = Validator::make($data, [
            'id' => 'numeric',
            'store_id' => 'required|integer',
            'product_name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return false;
        }
        return true;
    }
}
