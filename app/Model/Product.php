<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'detail', 'price', 'stock', 'discount'];
    protected $primaryKey = 'id';

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}