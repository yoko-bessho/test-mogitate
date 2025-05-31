<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Season;

class ProductSeason extends Model
{
    use HasFactory;


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
};
