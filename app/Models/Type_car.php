<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Type_car extends Model
{
    use HasFactory;

    protected $table = 'type_cars';
	protected $fillable =[
        'type'       
    ];
    public function cars(){
        return $this->hasMany('App\Models\Car','type_id','id');
    }
    
}
