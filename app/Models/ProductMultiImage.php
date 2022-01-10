<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMultiImage extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function productImage(){
        return $this->belongsTo(ProductMultiImage::class);
    }
    
}
