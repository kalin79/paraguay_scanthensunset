<?php

namespace App\Http\Controllers;

use App\Models\UsuariosDescuento;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {

        return view('pages.cliente.index');
        //return new ProductResource(Product::finterAndPaginate(request('q'), request('cat'),$paginate,$from,$promotion_rule_id));
    }

    public function load(){

        $usuarios_descuentos=UsuariosDescuento::orderBy('fecha_registro','desc')->paginate(20);
        return view('pages.cliente.partials.load',compact('usuarios_descuentos'));
    }
}
