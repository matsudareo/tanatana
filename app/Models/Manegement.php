<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Manegement extends Model
{
    use HasFactory;

    protected $fillable = ['id','month_id','categoly_id','merchandise','amont','all_weight','deleted_at','created_at','updated_at', 'stock_weight', 'stock_amont'];

//    protected $table = 'Manegement';

    use SoftDeletes;

    public function month(){
        return $this->belongsTo('App\Models\Month');
    }

    
}
