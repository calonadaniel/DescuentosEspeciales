<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use App\Models\descuentoAdicional;
use App\Carbon\Carbon;
class descuentoAdicionalController extends Controller
{
    public function index() {
        //Al utilizar Raw Sql tener cuidado por ataques de SQL Injection
        //Para esta aplicacion no se esta utilizando

        $listaProductos = descuentoAdicional::from('descuentoAdicional as da')
        ->select('da.itemlookupcode','da.tipoDesc','i.description','da.fechaInicia','da.fechaFinaliza','da.requisitos','da.descuento','dept.id as departmentID','dept.name as departmentName')
        ->join ('item as i', 'da.itemlookupcode','=','i.itemlookupcode')
        ->join ('department as dept', 'i.departmentid','=','dept.id')
        ->orderby('i.description')
        ->paginate(2000);
        //->get();

        //Lista de departamentos para el selector en el Modal-Add en caso de añadirlo a futuro
        $listaDepartamentos = item::from('item as i')
        ->select('dept.name as departmentName','i.departmentid as departmentID')
        ->join('department as dept','i.departmentid','=','dept.id')
        ->groupby('dept.name','i.departmentid')
        ->orderby('dept.name', 'asc')
        //->distinct()
        ->get();
        //dd($listaDepartamentos);

        return view('index', compact('listaProductos','listaDepartamentos'));

    }



    public function store(Request $request) {

        $action = "add";

        $producto = $this->fillabledata($action, $request);
        //dd($producto);
     
 
        $producto = json_decode($producto, true);

        //descuentoAdicional::create($producto);
        
        if(item::where('itemlookupcode', $producto['itemlookupcode'])->exists()){

            try {
                descuentoAdicional::firstorCreate($producto);
             } catch ( \Exception $e) {
                  //var_dump($e->errorInfo );
             }
            
        } 

        //descuentoAdicional::firstorCreate($producto);

        return redirect()->route('index');
    } 




     public function update(Request $request) {
        
        $action = "edit";

        //dd($request);
        request()->validate([
            $action.'_itemlookupcode' =>'required',
        ]);

        $producto = $this->fillabledata($action, $request);
        $producto = json_decode($producto, true);
        //$itemlookupcode = $request->input($action.'_itemlookupcode');

        if(item::where('itemlookupcode', $producto['itemlookupcode'])->exists()){
            descuentoAdicional::where('itemlookupcode','=',$producto['itemlookupcode'])->update($producto);
        } 
        return redirect()->route('index');
     }


     public function destroy(Request $request)
     {
        //dd($request);
         $action = "delete";
         request()->validate([
             $action.'_itemlookupcode' =>'required',
         ]);
         $itemlookupcode = $request->input($action.'_itemlookupcode');

         /* echo "<pre>";print_r($borrar); die;*/
         //Primero borro todo lo relacionado a las tablas que dependen del id_expediente
         //$borrarProducto = expediente::findorFail($id_expediente);
         descuentoAdicional::where('itemlookupcode','=',$itemlookupcode)->delete();
         return redirect()->route('index');
     }


    /*Funcion que se utiliza para recibir los datos del formulario en los Modales
    Al usar esta funcion evito repetir este codigo en las funciones para crear, editar y borrar
    Solo necesito llamar esta funcion y colocarle los parametros de action(add, edit, delete, etc..) y el request(datos del modal)*/ 
    public function fillabledata($action, $request) {

        //Validacion BackEnd de los datos de l formulario del Modal
         request()->validate([
             $action.'_itemlookupcode' => 'required|string',
             $action.'_tipo_descuento' => 'required|string', 
             //$action.'_description' => 'required|string', 
             $action.'_descuento' =>'required|numeric',
             $action.'_fecha_inicia' => 'required|date',
             $action.'_fecha_finaliza' => 'required|date',
             $action.'requisitos' => 'nullable|string',
         ]);


        //Una vez validados creo un json con los datos
        $producto = array(     
            'itemlookupcode' => $request->input($action.'_itemlookupcode'),
            'tipoDesc'=> $request->input($action.'_tipo_descuento'),
            //'description'=>$request->input($action.'_description'),
            'descuento'=>$request->input($action.'_descuento'),
            'fechaInicia'=>$request->input($action.'_fecha_inicia'),
            'fechaFinaliza'=>$request->input($action.'_fecha_finaliza'),
            'requisitos'=>$request->input($action.'_requisitos'),
        );

        //Retornar el json creado
        return json_encode($producto);
    }


    //Funcion del AJAX para la busqueda en vivo en el Modal-Add consultar el autocomplete.js
    public function search() {
        $searchResult = item::select('itemlookupcode','description','departmentid','dept.name as departmentName')
        ->join ('department as dept', 'item.departmentID','=','dept.id')
        ->orderby('itemlookupcode', 'asc')
        ->get();

        return response()->json($searchResult);
    }

}

