<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function multiImage(){
        return $this->hasMany(ProductMultiImage::class);
    }
    public function productAttribute(){
        return $this->hasMany(Attribute::class);
    }

    public static function filterArray(){
        $filterArray['sleeve'] = array('short sleeve','logn sleeve','full sleeve','sleeve less');
        $filterArray['fabric'] = array('cutton','pholester','wool'); 
        $filterArray['occassion'] = array('casul','formal'); 
    }
}
 