<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{    
    //Defined Primary Key
    protected $primaryKey = "product_id";
    
    
    //Each Product has one category
    public function Category()
    {        
        return $this->hasOne('App\Models\Category', 'category_id', 'category_id');
    }
    
    //Each Product has one brand
    public function Brand()
    {        
//        $this->hasOne($relatedTo, $foreignKey, $localKey)
        return $this->hasOne('App\Models\Brand', 'brand_id', 'brand_id');
    }
}
