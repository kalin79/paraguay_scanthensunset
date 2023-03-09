<?php

namespace App\Models;

use App\Traits\Audit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Descuentos extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Audit;

    protected $fillable = ['codigo', 'descuento','active','created_user_id','updated_user_id','deleted_user_id'];

}
