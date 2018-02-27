<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //Defined Primary Key
    protected $primaryKey = "brand_id";
    
    //Each Brand has many Products
    public function Products()
    {        
        return $this->hasMany('App\Models\Product', 'brand_id', 'brand_id');
    }
}
