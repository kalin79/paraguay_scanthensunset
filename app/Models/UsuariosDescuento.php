<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariosDescuento extends Model
{
    use HasFactory;
    protected $table= 'usuarios_descuento';
    protected $fillable = ['ip_user', 'image','codigo','descuento','email','mayor_edad','tyc','fecha_registro','fecha_proximo_registro','active','porcentaje_sunset'];
}
