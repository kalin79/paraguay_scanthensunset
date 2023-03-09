<?php

namespace App\Imports;

use App\Models\Descuentos;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToArray;

class DescuentoImport implements ToArray
{
    private $rows = 0;
    public $response = ["result" => 1, "message" => ''];

    public function __construct()
    {

    }
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //
    }
    public function array(array $array)
    {
        $products = $array[0];

        foreach ($products as $line => $product) {

            if ($line > 0) {

                $codigo = str_replace(' ','',$product[0]);
                $descuento = str_replace(' ','',$product[1]);

                //dd($product,$codigo,$descuento);
                if($codigo){
                    $obDescuento = Descuentos::where('codigo', $codigo)->first();

                    if (!$obDescuento) {


                        $array_data_cliente = [

                            'codigo' => $codigo,
                            'descuento'=>$descuento,
                            'active' => 1
                        ];
                        $decuento = Descuentos::create($array_data_cliente);

                    }


                    ++$this->rows;
                }

            }
        }


        /*DB::commit();

        $this->response = ["result" => 1, "message" => ""];

    } catch (\Exception $e) {
        DB::rollback();
        $this->response = ["result" => 0, "message" => "No se pudo realizar la importación: ".$e->getMessage()];
        return false;
    }*/



    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
}
