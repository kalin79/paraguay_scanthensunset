<?php

namespace App\Http\Controllers;

use App\Mail\RegisterClientNotification;
use App\Models\Descuentos;
use App\Models\HistorialImagenes;
use App\Models\UsuarioDescuentoMail;
use App\Models\UsuariosDescuento;
use Aws\AwsClient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Aws\Rekognition\RekognitionClient;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{


    public function index()
    {

        return view('home');
    }
    public function readImage(Request $request){
        // dd(env('AWS_KEY'));
        try {
            //dd(Carbon::now()->format('g'),date('g'));
            // dd($request->all());
            $hora_actual = (int)date('G');
            // dd($hora_actual);
            // original 5 - 7
            // if($hora_actual>=17 && $hora_actual<=19){
            if(true){
                // dd(getUserIpAddr());
                $count_users_bloqueo_ip = UsuariosDescuento::where('ip_user',getUserIpAddr())->whereDate('fecha_registro','>=',Carbon::now())->first();
                // dd($count_users_bloqueo_ip);
                if(!$count_users_bloqueo_ip || strtotime($count_users_bloqueo_ip->fecha_proximo_registro)<strtotime(date('Y-m-d'))){
                    if($request->hasFile('image')){
                        $destinationPath = public_path('/images/');
                        if(!File::isDirectory($destinationPath)){
                            File::makeDirectory($destinationPath, 0777, true, true);
                        }
                        $file = $request->image;

                        if($file->getClientOriginalExtension() == "jpeg" || $file->getClientOriginalExtension() =="jpg" || $file->getClientOriginalExtension() == "png")
                        {
                            $imagename = time().'-'. uniqid()  . "." . $file->getClientOriginalExtension();
                            // dd($file->move($destinationPath, $imagename));
                            $file->move($destinationPath, $imagename);
                            $client = new RekognitionClient([
                                'region' =>'us-east-1',
                                'version' =>'latest',
                                'credentials'=>[
                                    'key'=>'keyAmazon',
                                    'secret'=>'keySecret'
                                ]
                            ]);

                            $result = $client->detectLabels([
                                'Image' =>[
                                    'Bytes' => file_get_contents(public_path('/images/'.$imagename))
                                ],
                                'MaxLabels'=>20,
                                'MinConfidence'=>20
                            ]);

                            $historial = HistorialImagenes::create([
                                'response_api' =>json_encode($result["Labels"]),
                                'image'=>$imagename,
                                'fecha_registro' => date('Y-m-d')
                            ]);
                            $tiempo = "";
                            $tiempo_hora_real = 0;
                            $tiempo_min_real = 0;
                            $bool_imagen = true;

                            if(count($result["Labels"])>0){
                                // dd($result["Labels"]);
                                foreach($result["Labels"] as $labels){
                                    if(isset($labels['Name']) && $labels['Name']=='Sunset'){
                                        $porcentaje = (int)$labels['Confidence'];
                                        /*$descuento = $this->obtenerCodigo($porcentaje);
                                        if($descuento){*/
                                            //$descuento->update(['active'=>0]);
                                            $usuario_descuento=UsuariosDescuento::create([
                                                'ip_user'=>getUserIpAddr(),
                                                'image'=>$imagename,
                                                'porcentaje_sunset'=>$porcentaje,
                                                //'codigo'=>$descuento->codigo,
                                                //'descuento'=>$descuento->descuento,
                                                'mayor_edad'=>1,
                                                'tyc'=>1,
                                                'fecha_registro'=>date('Y-m-d'),
                                                'fecha_proximo_registro'=>Carbon::now()->addDay(1),

                                            ]);
                                            $historial->update([
                                                    'porcentaje_sunset'=>$porcentaje
                                                    // 'codigo'=>$descuento->codigo,
                                                    // 'descuento'=>$descuento->descuento]
                                            ]);
                                            $file=public_path('/images/'.$imagename);
                                            //Mail::to("ehuapayaromero@gmail.com")->send(new RegisterClientNotification($usuario_descuento,$file));

                                            return response()->json(['success' => true,'data' =>
                                                ['estado'=>1,'porcentaje'=>$porcentaje,'usuario_descuento'=>$usuario_descuento,'url_image'=>asset('/images').'/'.$imagename, 'historial_id' => $historial->id],
                                                'code' => 200],
                                                Response::HTTP_OK);
                                        //}
                                    }
                                    $bool_imagen = false;
                                }

                            }else{
                                $bool_imagen = false;
                            }

                            if(!$bool_imagen){

                                return response()->json(['success' => false,'data' => ['estado'=>0,'valorHora'=>'','error_message'=>'Imagen Invalida 1'], 'code' => 200],Response::HTTP_OK);

                            }
                        }else{
                            return response()->json(['success' => false,'data' => ['estado'=>0,'valorHora'=>'','error_message'=>'Imagen Invalida 2'], 'code' => 200],Response::HTTP_OK);
                        }


                    }else{
                        return response()->json(['success' => false,'data' => ['estado'=>0,'descuento'=>'','error_message'=>'Imagen Invalida 3'], 'code' => 200],Response::HTTP_OK);
                    }

                }else{
                    return response()->json(['success' => false,'data' => ['estado'=>0,'descuento'=>'','error_message'=>'Bloqueado', 'ip' => getUserIpAddr()], 'code' => 200],Response::HTTP_OK);
                }
            }else{
                // dd(2);
                return response()->json(['success' => false,'data' => ['estado'=>0,'descuento'=>'','error_message'=>'hora'], 'code' => 200],Response::HTTP_OK);
            }

        }catch (Exception $e){
            // dd(3);
            Log::info("ExceptionService =>".$e->getMessage());
            return response()->json(['success' => false,'data' => ['estado'=>0,'descuento'=>'','error_message'=>'Ocurrio un error=>'.$e->getMessage()], 'code' => 200],Response::HTTP_OK);

            //return response()->json(['estado'=>0,'valorHora'=>'','error_message'=>'Ocurrio un error=>'.$e->getMessage()]);
        }

    }

    function obtenerCodigo($porcentaje){
        $descuento = null;
        if($porcentaje>=0 && $porcentaje<=68){
            $descuento_ids_array = Descuentos::whereBetween('descuento',[20,20])->where('active',1)->get()->pluck('id')->toArray();
        }elseif($porcentaje>=69 && $porcentaje<=86){
            $descuento_ids_array = Descuentos::whereBetween('descuento',[25,25])->where('active',1)->get()->pluck('id')->toArray();
        }elseif($porcentaje>=87 && $porcentaje<=99){
            $descuento_ids_array = Descuentos::whereBetween('descuento',[30,30])->where('active',1)->get()->pluck('id')->toArray();
        }

        if(count($descuento_ids_array)>0){
            $id_aletorio_decuento = $descuento_ids_array[array_rand($descuento_ids_array)];
        }else{
            $descuento_all_ids_array = Descuentos::where('active',1)->get()->pluck('id')->toArray();
            if(count($descuento_all_ids_array)){
                $id_aletorio_decuento =$descuento_all_ids_array[array_rand($descuento_all_ids_array)];
            }
        }

        $descuento_all =  Descuentos::where('active',1)->get();
        if(count($descuento_all)>0){
            $decuentos_obj = Descuentos::where('id',$id_aletorio_decuento)->where('active',1)->first();
            if($decuentos_obj && $decuentos_obj->active == 1){
                $descuento = $decuentos_obj;
                //return response()->json(['success' => true,'data' => ['estado'=>1,'porcentaje'=>$porcentaje,'descuento'=>$descuento], 'code' => 200],Response::HTTP_OK);
            }else{
                return $this->obtenerCodigo($porcentaje);
            }
        }


        return  $descuento;

    }

    public function sendEmailUser(Request $request){
        $usuario_descuento = UsuariosDescuento::where('id',$request->usuario_descuento_id)->first();
        if($usuario_descuento->porcentaje_sunset){
            $descuento = $this->obtenerCodigo($usuario_descuento->porcentaje_sunset);
            if($descuento){

                // Lo que estoy agregando para guardar el log como corresponde...



                $historial = HistorialImagenes::find($request->historialId)->update([
                    'codigo'=>$descuento->codigo,
                    'descuento'=>$descuento->descuento
                ]);


                //******


                $descuento->update(['active'=>0]);
                $usuario_descuento->update([
                        'codigo'=>$descuento->codigo,
                        'descuento'=>$descuento->descuento,
                        'email'=>$request->email,
                        'active'=>1
                    ]
                );
                $file = null;
                Mail::to($request->email)->send(new RegisterClientNotification($usuario_descuento,$file));
                return response()->json(['success' => true, 'code' => 200,'descuento'=>$descuento->descuento,'codigo'=>$descuento->codigo,'porcentaje'=>$usuario_descuento->porcentaje_sunset,'url_image'=>asset('/images').'/'.$usuario_descuento->image],Response::HTTP_OK);
            }
        }

        return response()->json(['success' => false, 'code' => 200,'descuento'=>'','codigo'=>'','porcentaje'=>'','url_image'=>''],Response::HTTP_OK);

    }

    public function storeMail(Request $request){
        //$usuario_descuento = UsuariosDescuento::where('codigo',$request->codigo)->first();
        $email_descuento = UsuarioDescuentoMail::where('email',$request->email)->first();
        if(!$email_descuento){
            UsuarioDescuentoMail::create(['email'=>$request->email,'tyc'=>1]);
            return response()->json(['success' => true, 'code' => 200, 'info' => true],Response::HTTP_OK);
        }else{
            return response()->json(['success' => true, 'code' => 200, 'info' => false],Response::HTTP_OK);
        }

        
    }
}
