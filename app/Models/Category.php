<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{    
    //Defined Primary Key
    protected $primaryKey = "category_id";
    
    //Each Brand has many Products
    public function Products()
    {        
        return $this->hasMany('App\Models\Product', 'category_id', 'category_id');
    }
   
}
