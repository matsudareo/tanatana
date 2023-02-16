<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;
    protected $fillable = ['id','fail_name'];

   // protected $table = 'Month';

    public function manegements(){
        return $this->hasMany('App\Models\Manegement');
    }
}
