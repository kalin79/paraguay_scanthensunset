<?php

namespace App\Http\Controllers;

use App\Imports\DescuentoImport;
use App\Models\Descuentos;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class DescuentoController extends Controller
{
    public function index()
    {

        return view('pages.descuento.index');
        //return new ProductResource(Product::finterAndPaginate(request('q'), request('cat'),$paginate,$from,$promotion_rule_id));
    }

    public function load(){

        $descuentos=Descuentos::orderBy('codigo','desc')->paginate(20);
        return view('pages.descuento.partials.load',compact('descuentos'));
    }

    /*-public function create(){
        $ubicaciones = Tipos::byMasterId(TypeUbicacion::master())->get();
        $promotores = Promotor::all();
        $eventos = Evento::where('active',1)->get();
        return view('pages.socios.modals.create',compact('ubicaciones','promotores'));
    }





    public function store(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $request['tipo_ubicacion_id'] = TypeUbicacion::DISCOTECA;
        $data = $request->all();

        $socio = Socio::create($data);
        $codigo = strtoupper(substr($socio->nombres,0,3)) ."-".strtoupper(substr($socio->apellidos,0,3));
        $codigo.= "-".uniqueKey(8,true,false,true);
        $codigo.= "-".uniqueKey(4,true,false,true);
        $codigo.= "-".uniqueKey(4,true,false,true);
        $codigo.= "-".uniqueKey(12,true,false,true);
        $socio->update([
            'codigo'=>$codigo
        ]);
        $imagen_code = storage_path('app/public/socios/' . $socio->id . '/qrcodes/' . $socio->codigo . '.png');
        $file = null;
        if (!is_file($imagen_code)) {

            Storage::makeDirectory('public/socios/' . $socio->id . '/qrcodes/');
            $url = url('admin/socio/verificar-datos/'.$socio->id);
            $qr = new QR_BarCode();
            $qr->url($url);
            $qr->qrCode(400,$imagen_code);
            $socio->update([
                'imagen_qr' => $socio->codigo . '.png'
            ]);
        }
        return response()->json(true);
    }

    public function edit(Socio $socio){
        $ubicaciones = Tipos::byMasterId(TypeUbicacion::master())->get();
        $promotores = Promotor::all();
        $eventos = Evento::where('active',1)->get();
        return view('pages.socios.modals.update',compact('socio','ubicaciones','promotores','eventos'));
    }

    public function update(Request $request,Socio $socio)
    {
        if(!$request->ajax()) return redirect('/');
        $data = $request->all();
        $socio->update($data);

        return response()->json(true);

    }

    public function destroy(Request $request, Socio $socio){
        if(!$request->ajax()) return redirect('/');

        DB::beginTransaction();
        try {

            $socio->delete();

            DB::commit();
        } catch (\Exception $exc) {
            DB::rollBack();

            abort(500);
        }
        return response()->json(["rpt"=>1]);
    }
    public function active(Request $request){
        $socio = Socio::findOrFail($request->id);
        $socio->active = 1;
        if($socio->save()){

            return response()->json(["rpt"=>1]);
        }
    }
    public function desactive(Request $request){
        $socio = Socio::findOrFail($request->id);
        $socio->active = 0;
        if($socio->save()){

            return response()->json(["rpt"=>1]);
        }
    }*/

    public function formImport(){

        return view('pages.descuento.modals.import-excel');
    }

    public function  importSave(Request $request){
        ini_set("memory_limit", -1);
        // $import = new SociosImport($request->evento_id);
        $import = new DescuentoImport();
        // dd($request->file('file-excel'));
        $a = Excel::toArray($import, $request->file('file_excel'));
        $import->array($a);
        return response()->json(true);
    }

}
