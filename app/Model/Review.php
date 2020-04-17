<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = ['customer', 'review', 'star', 'product_id'];
    protected $primaryKey = 'id';
}