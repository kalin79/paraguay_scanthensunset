<?php

namespace App\Http\Controllers;

use App\Models\HistorialImagenes;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function index(){
        $historial_data = HistorialImagenes::orderBy('fecha_registro','desc')->orderBy('id','desc')->paginate(10);
        return view('pages.historial.index',compact('historial_data'));
    }
}
