<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tag',
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
// "App\Models\Product", "products_tags", "tag_id", "product_id"