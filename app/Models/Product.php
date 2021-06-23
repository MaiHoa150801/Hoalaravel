<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type_Product;

class Product extends Model
{
    use HasFactory;
    protected $table="products";

   

    public function type_product(){
        return $this->belongsTo('App\Models\Type_Product','id_type','id');
    }
}
