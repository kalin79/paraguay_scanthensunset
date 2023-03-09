<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialImagenes extends Model
{
    use HasFactory;
    protected  $table = 'historial_imagenes';
    protected  $fillable = ['response_api','image','fecha_registro','porcentaje_sunset','descuento','codigo'];
}
