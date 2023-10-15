<?php

namespace App\Http\Controllers;

use App\Models\Dato;
use App\Models\Orden_detalle;
use App\Models\Ordene;
use App\Models\Producto;
use Illuminate\Http\Request;


use Illuminate\Support\Str;

class AdminController extends Controller
{
    //dashboard
    public function dashboard()
    {


        $ingresos_totales = Ordene::sum('total');
        return view('admin.dashboard', [


            'ingresos_totales' => $ingresos_totales
        ]);
    }

    //Agregar productos
    public function agregar_producto()
    {



        return view('admin.agregar_producto',);
    }

    //Actualizar productos
    public function actualizar_producto()
    {



        return view('admin.actualizar_producto', []);
    }

    //Actualizar productos
    public function eliminar_producto()
    {



        return view('admin.eliminar_producto', []);
    }




    //Creando productos
    public function crear_producto(Request $request)
    {


        $foto_nombre = $_FILES['foto']['name'];
        $nombrefinal = 'fotos_productos/' . (date('u') + date('s')) . Str::slug($request->nombre) . $foto_nombre;


        if (move_uploaded_file($_FILES['foto']['tmp_name'], $nombrefinal)) {


            Producto::create([
                'nombre' => $request->nombre,
                'preciousd' => $request->preciousd,
                'stock' => $request->stock,

                'foto' => $nombrefinal
            ]);
        } else {
            echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
        }
        return back();
    }

    //Actualizando productos
    public function actualizando_producto(Request $request)
    {
        $producto = Producto::find($request->id);
        $producto->nombre = $request->nombre;
        $producto->preciousd = $request->preciousd;
        $producto->stock = $request->stock;
        $producto->save();





        return back();
    }

    //Eliminando productos
    public function eliminando_producto(Request $request)
    {




        $producto = Producto::find($request->id)->first();

        $error = null;
        $producto->destroy();



        return view('admin.eliminar_producto', ['error' => $error]);
    }

    //Buscar productos para actualizar
    public function buscar_producto_id(Request $request)
    {

        $producto_encontrado = Producto::find($request->id)->first();
        $error = null;
        if ($producto_encontrado == null) {
            return view('admin.actualizar_producto', [
                'error' => $error
            ]);
        } else {
            return view('admin.actualizar_producto', [
                'producto_encontrado' => $producto_encontrado,
                'error' => $error
            ]);
        }
    }

    public function pedidos()
    {
        $orden = Ordene::all();
       

        return view('admin.tabla', [
            'ordenes' => Ordene::all(),
            'orden_detalles' => Orden_detalle::all(),
        ]);
    }

    public function valor_cup()
    {
        $cup = Dato::where('nombre', 'cambio_cup')->first()->valor;

        return view('admin.valor_cup', ['cup' => $cup]);
    }

    public function cambio_cup(Request $request)
    {
        $dato = Dato::where('nombre', 'cambio_cup')->first();
        $cambio = $request->valor;
        $dato->valor = $cambio;
        $dato->save();
        return back();
    }

    public function cambio_eur(Request $request)
    {
        $dato = Dato::where('nombre', 'cambio_eur')->first();
        $cambio = $request->valor;
        $dato->valor = $cambio;
        $dato->save();
        return back();
    }
}
