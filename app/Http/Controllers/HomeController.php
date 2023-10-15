<?php

namespace App\Http\Controllers;

use App\Models\Visita;
use App\Models\Producto;
use App\Models\Carrito;
use App\Models\Categoria;
use App\Models\Dato;
use App\Models\Orden_detalle;
use App\Models\Ordene;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



use Cart;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{



    //Ir a inicio
    public function home(Producto $producto, User $usuario)
    {
        // Comprueba si la cookie 'moneda' no está establecida o si su valor es incorrecto.
        if (!isset($_COOKIE['moneda']) || !in_array($_COOKIE['moneda'], ['usd', 'eur'])) {
            setcookie('moneda', 'usd', time() + 365 * 24 * 60 * 60);
            return redirect(route('home'));
        }

        $productos = $producto->where('stock', '>', 0)->take(8)->get();
        $usuarios = $usuario->all();


        return view('home', [
            'producto' => $productos,
            'usuario' => $usuarios,


        ]);
    }


    //Detalles producto
    public function detalles(Request $request)
    {

        $producto = Producto::find($request->id);

        $valoracion = $producto->valoracion;

        if ($valoracion == null) {
            $valoracion = 0;
        }
        $color = Dato::where('nombre', 'color')->first()->valor;
        return view('detalles', [
            'producto' => $producto,
            'valoracion' => $valoracion,


        ]);
    }

    //Mis Ordenes
    public function ordenes()
    {





        $color = Dato::where('nombre', 'color')->first()->valor;
        return view('ordenes', [

            'carrito' => Carrito::all(),




        ]);
    }


    //iframe tabla
    public function tabla()
    {



        return view('admin.tabla', [
            'ordenes' => Ordene::where('id_user', '' . Auth::user()->id . '')->get(),
            'orden_detalles' => Orden_detalle::all(),
        ]);
    }


    //cambiar a cup
    public function eur()
    {
        setcookie('moneda', 'eur', time() + 365 * 24 * 60 * 60);


        return back();
    }

    //cambiar a usd
    public function usd()
    {

        setcookie('moneda', 'usd', time() + 365 * 24 * 60 * 60);


        return back();
    }

    //Ir a Contacto
    public function contacto()
    {
        $color = Dato::where('nombre', 'color')->first()->valor;
        return view('contacto', [
            'carrito' => Carrito::all(),


        ]);
    }




    //Ir a carrito
    public function carrito()
    {
        $cartItems = Cart::getContent();
        return view('carrito', compact('cartItems'));
    }





    //Agregar a carrito

    public function agregar_carrito(Request $request)
    {
        // Encuentra el producto en la base de datos usando el $id
        $product = Producto::find($request->pid);

        // Agrega el producto al carrito
        Cart::add(array(
            'id' => $request->pid,
            'name' => $product->nombre,
            'price' => $product->preciousd,
            'quantity' => $request->cant,
            'attributes' => array(),
            'associatedModel' => $product // asociamos el modelo del producto
        ));

        return back();
    }


    // public function agregar_carrito_old(Request $request)
    // {

    //     $carrito_exist = Carrito::where('id_user', $request->uid)->where('id_producto', $request->pid)->first();

    //     if ($carrito_exist) {



    //         $actcarrito = Carrito::find($carrito_exist->id);
    //         $actcarrito->cantidad = $request->cant + $carrito_exist->cantidad;
    //         $actcarrito->save();
    //     } else {
    //         Carrito::create([
    //             'id_user' => $request->uid,
    //             'id_producto' => $request->pid,
    //             'cantidad' => $request->cant
    //         ]);
    //     }


    //     return redirect(route('carrito'));
    // }



    public function quitar_carrito($id)
    {
        $item = Cart::get($id);
        if ($item) {
            Cart::remove($id);
        }
        return redirect(route('carrito'));
    }

    public function sumar_carrito($id)
    {
        $item = Cart::get($id);
        if ($item && $item->quantity < $item->associatedModel->stock) {

            Cart::update($id, array(
                'quantity' => 1,
            ));
        }
        return redirect(route('carrito'));
    }

    public function restar_carrito($id)
    {
        $item = Cart::get($id);
        if ($item) {
            if ($item->quantity > 1) {
                Cart::update($id, array(
                    'quantity' => -1,
                ));
            } else {
                Cart::remove($id);
            }
        }
        return redirect(route('carrito'));
    }


    //pagina compra
    public function pagina_compra()
    {

        $carrito = Cart::getContent();
        return view('checkout', compact('carrito'));
    }



    public function ir_a_pagar(Request $request)
    {

        $id = $request->uid;
        $total = $request->total;
        $metodopago = $request->metodopago;
        $carrito_por_usuario = Carrito::where('id_user', $id);


        Ordene::create([


            'id_user' => $id,
            'total' =>  $total,
            'subtotal' => $total,
            'metodopago' => 'qvapay'

        ]);


        foreach ($carrito_por_usuario as $item) {
            Carrito::destroy([
                'id' => $item->id,
            ]);
        }



        return redirect(route('home'));
    }


    //Ir a Comprar
    public function shoping()
    {


        $productos = Producto::paginate(9);



        return view(
            'shop',
            [

                'producto' => $productos,

            ]
        );
    }

    public function buscar(Request $request)
    {
        $reques = $request->buscar;

        $productos =  Producto::whereRaw("`nombre` LIKE '%$reques%'  or `preciousd` = '$reques' ")->paginate(9);


        return view(
            'shop',
            [

                'producto' => $productos,



            ]
        );
    }
    public function cambiar_color(Request $request)
    {
        $dato = Dato::where('nombre', 'color')->first();
        $color = $request->color;
        $dato->valor = $color;
        $dato->save();
        return back();
    }

   
    

    //pagina de rmesas
    public function remesas()
    {

        return view('remesas');
    }

     //pagina de paqueteria
     public function paqueteria()
     {
 
         return view('paqueteria');
     }
 

     //mapa
     public function mapa()
     {
 
         return view('mapa');
     }
    

    public function prueba(Request $sandbox)
    {



        return $sandbox->all();
        // return view('home');
        // return header("Refresh:0");
    }
}
