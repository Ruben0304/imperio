<?php
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagosController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Carrito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//home routes
Route::controller(HomeController::class)->group(function (){

    Route::get('/inicio', 'home')->name('home');
    Route::get('/EUR', 'eur')->name('eur');
    Route::get('/USD', 'usd')->name('usd');
    Route::get('/reservar', 'reservar')->name('reservar');
    Route::get('contacto',  'contacto')->name('contacto');
    Route::get('detalles',  'detalles')->name('detalles');
    Route::get('carrito',  'carrito')->middleware('auth')->name('carrito');
    Route::post('addcart',  'agregar_carrito')->middleware('auth')->name('agregar_carrito'); 
    Route::get('removecart/{id}',  'quitar_carrito')->middleware('auth')->name('quitar_carrito'); 
    Route::get('sumar_carrito/{id}',  'sumar_carrito')->middleware('auth')->name('sumar_carrito'); 
    Route::get('restar_carrito/{id}',  'restar_carrito')->middleware('auth')->name('restar_carrito'); 
    Route::get('caja',  'pagina_compra')->middleware('auth')->name('pagina_compra'); 
    Route::post('paying',  'ir_a_pagar')->middleware('auth')->name('ir_a_pagar'); 
    Route::get('shoping',  'shoping')->name('shoping');
    Route::get('buscar',  'buscar')->name('buscar');
    Route::put('/cambiar_color',  'cambiar_color')->name('cambiar_color'); 
    Route::get('/tabla', 'tabla')->name('tabla');
    Route::get('/ordenes', 'ordenes')->name('ordenes');
    Route::get('remesas',  'remesas')->name('remesas');
    Route::get('paqueteria',  'paqueteria')->name('paqueteria');
    Route::get('mapa',  'mapa')->name('mapa');
});

//admin routes
Route::controller(AdminController::class)->group(function (){

    Route::get('/admin', 'agregar_producto')->middleware(['auth', 'verified'])->name('admin');
    Route::get('/agregar_producto', 'agregar_producto')->middleware(['auth', 'verified'])->name('agregar_producto');
    Route::get('/actualizar_producto', 'actualizar_producto')->middleware(['auth', 'verified'])->name('actualizar_producto');
    Route::get('/eliminar_producto', 'eliminar_producto')->middleware(['auth', 'verified'])->name('eliminar_producto');
    Route::delete('/eliminando_producto', 'eliminando_producto')->middleware(['auth', 'verified'])->name('eliminando_producto');
    Route::post('/creando', 'crear_producto')->middleware(['auth', 'verified'])->name('crear_producto');
    Route::put('/actualizando_producto', 'actualizando_producto')->middleware(['auth', 'verified'])->name('actualizando_producto');
    Route::get('/valor_cup', 'valor_cup')->middleware(['auth', 'verified'])->name('valor_cup');
    Route::get('/pedidos', 'pedidos')->middleware(['auth', 'verified'])->name('pedidos');
    Route::put('/cambio_cup', 'cambio_cup')->middleware(['auth', 'verified'])->name('cambio_cup');
    Route::put('/cambio_eur', 'cambio_eur')->middleware(['auth', 'verified'])->name('cambio_eur');
    Route::post('/actualizar_producto', 'buscar_producto_id')->middleware(['auth', 'verified'])->name('buscar_producto_id');
    
});
Route::controller(PagosController::class)->group(function (){

    Route::get('/pay', 'pagar_con_qvapay')->middleware(['auth', 'verified'])->name('pagar_con_qvapay');
    Route::get('procesar-pago', 'stripe')->middleware(['auth'])->name('procesar-pago');
    Route::get('qvapay_callback_ok', 'confirmar_qvapay')->middleware(['auth', 'verified'])->name('confirmar_qvapay');
    
});


Route::get('/add', function (Request $request) {
    return view('webservices.verificar_usuario',[
      'usuario' => $request->uid,
      'producto' => $request->pid,
      'cantidad' => $request->cant,
      'home' => HomeController::class
    ]);
})->name('redireccioniniciossdds');







//Redireccion a inicio
Route::get('/', function () {
    return redirect('/inicio');
})->name('redireccioninicio');

Route::get('/dashboard', function () {
    return redirect('/inicio');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';


Route::get('/vender', function () {
    return view('auth.crear_vendedor',[
        'carrito'=>Carrito::all(),
    ]);
})->middleware(['auth', 'verified'])->name('crear_vendedor');

Route::post('/registrar_vendedor', function () {
    return view('auth.crear_vendedor',[
        'carrito'=>Carrito::all(),
    ]);
})->middleware(['auth', 'verified'])->name('registrar_vendedor');
// Route::post('register', [RegisteredUserController::class, 'store']);






//Iniciar con google
Route::get('login-google', function () {
    return Socialite::driver('google')->redirect();
})->name('glogin');

 
Route::get('google-callback-url', function () {
    $user = Socialite::driver('google')->user();
     

    $user_exist= User::where('idsocial', $user -> id)-> where('redsocial','google')->first();
    $email_exist= User::where('email', $user -> email)->first();


    if ($email_exist) {
        return view('auth.login',[
            'carrito'=>Carrito::all(),
            'email_exist'=>true]);
    }
else {
    if ($user_exist) {
        Auth::login($user_exist);
    }else{
        $nuevo=User::create([
         'name'=> $user -> name,
         'idsocial'=> $user -> id,
         'email'=> $user -> email,
         'redsocial'=> 'google'
        ]);

        Auth::login($nuevo);
    }
    return redirect(route('home'));
}
   
})->name('gcallback');
//Fin GOOGLE




// Route::get('/login_facebook', function () {
//     return Socialite::driver('facebook')->redirect();
// });
// Route::get('/facebook_callback', function () {
//     $user = Socialite::driver('facebook')->user();
//     dd($user);
// });



