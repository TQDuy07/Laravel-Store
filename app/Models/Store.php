<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Store extends Model
{
    use HasFactory;
    protected $table = 'stores';

    protected $fillable = [
        'id',
        'user_id',
        'store_name',
        'address',
        'phone',
        'created_at',
        'updated_at'
    ];

    public function validateData(array $data)
    {
        $validator = Validator::make($data, [
            'id' => 'numeric',
            'user_id' => 'required|integer',
            'store_name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string'
        ]);

        if ($validator->fails()) {
            return false;
        }
        return true;
    }
}
