<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioDescuentoMail extends Model
{
    use HasFactory;
    protected $table= 'usuario_descuento_mail';
    protected $fillable = ['usuario_descuento_id', 'email','tyc'];

}
