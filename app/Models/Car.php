<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type_car;

class Car extends Model
{
    use HasFactory;

    protected $table="cars";

    protected $fillable =[
        'name',
        'description',
        'image'       
    ];
    public function type_car(){

        return $this->belongsTo('App\Models\Type_car','type_id','id');
    }
}
