<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = ['customer', 'review', 'star', 'product_id'];
    protected $primaryKey = 'id';

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}