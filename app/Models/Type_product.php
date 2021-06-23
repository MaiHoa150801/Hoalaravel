<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Type_product extends Model
{
    use HasFactory;
    protected $table="Type_products";

    protected $fillable =[
        name,
        description,
        image
    ];

    public function products(){
        return $this->hasMany('App\Models\Product','id_type','id');
    }
}
