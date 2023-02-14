<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    use HasFactory;
    protected $fillable = ['id','month_id','categoly_id','merchandise','amont','all_weight','stock_weight','stock_amont'];
}
