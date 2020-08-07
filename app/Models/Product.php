<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'name', 'stock', 'price',
    ];

    protected $casts = [
        'id' => 'integer',
        'stock' => 'integer',
        'price' => 'double',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];
}
