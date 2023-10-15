<?php

namespace App\Http\Controllers;

use App\Models\Ordene;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;

use Cart;
use Illuminate\Support\Facades\Http;

class PagosController extends Controller
{

  public function calculateDistance($location)
    {
        // El token de acceso de Mapbox debe estar almacenado en una variable de entorno
        $mapboxToken = "sk.eyJ1IjoicnViZW4wMzA0IiwiYSI6ImNsa2xwcTJpbzA2YWQzam54NjhsZ3RjYjMifQ.-R7U7-DuoK2_R77bQJKS3A";

        $fixedLocation = '-82.46179838936656,23.090916961379236'; // Havana, Cuba

        $response = Http::get("https://api.mapbox.com/directions/v5/mapbox/driving/{$fixedLocation};{$location}?access_token={$mapboxToken}");

        $responseBody = json_decode($response->body(), true);

        if ($response->failed() || empty($responseBody['routes'])) {
            throw new \Exception('Fallo al calcular distancia');
        }

        $distanceInMeters = $responseBody['routes'][0]['distance'];
        $distanceInKilometers = $distanceInMeters / 1000;

        return $distanceInKilometers;
    }
  public function stripe(Request $request)
  {
   
    Stripe::setApiKey(env('STRIPE_SECRET'));

    // Obtenemos los productos del carrito
    $cartItems = Cart::getContent();

    // Creamos una array de line_items para Stripe
    $lineItems = [];
    // dd($cartItems);
    foreach ($cartItems as $item) {
      $lineItems[] = [
        'price_data' => [
          'currency' => $_COOKIE['moneda'],
          'product_data' => [
            'name' => $item->associatedModel->nombre, // Nombre del producto en el carrito
            'images' =>['https://cdn.dribbble.com/users/586829/screenshots/4085732/untitled-2.jpg'] 
          ],
          'unit_amount' => $item->associatedModel->preciousd * 100, // Precio del producto en el carrito en centavos
        ],
        'quantity' => $item->quantity, // Cantidad del producto en el carrito
      ];
    }
    $lineItems[] = [
      'price_data' => [
          'currency' => $_COOKIE['moneda'],
          'product_data' => [
              'name' => 'Costo de envío',
          ],
          'unit_amount' => (round($this->calculateDistance($request->location) * 0.5 * 100,0)), // Incluye solo el costo de envío
      ],
      'quantity' => 1, // Solo una vez
  ];

    // Agregar los métodos de pago disponibles
    if ($_COOKIE['moneda'] == 'usd') {
      $payment_methods = ['card','link','cashapp'];
    }
    elseif ($_COOKIE['moneda'] == 'eur') {
      $payment_methods = ['card','link'];
    }
   

    $session = Session::create([
      'payment_method_types' => $payment_methods,
      'line_items' => $lineItems,
      'mode' => 'payment',
      
      'success_url' => route('home'),
      'cancel_url' => route('home'),
      
    ]);



    // Redirigir al cliente a la página de pago de Stripe
    return redirect()->to($session->url);
  }

















  public function pagar_con_qvapay(Request $request)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://qvapay.com/api/v1/create_invoice',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{
        "app_id": "' . env('qvapay_id') . '",
        "app_secret": "' . env('qvapay_secret') . '",
        "amount": "0.1",
        "description": "Comprar con Qvapay orden",
        "remote_id": "QVA004",
        "signed": 1
      }',
      CURLOPT_HTTPHEADER => array(

        'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);
    $data = json_decode($response, true);


    $signedUrl = $data["signedUrl"];
    //       $transation_uuid=$data["transation_uuid"];

    //       curl_close($curl);
    return redirect($signedUrl);
  }


  public function confirmar_qvapay(Request $request)
  {
    $appid = env('qvapay_id');
    $appsecret = env('qvapay_secret');


    $transaction_uuid = $request->transaction_uuid;






    // $curl = curl_init();

    // curl_setopt_array($curl, array(
    //   CURLOPT_URL => 'https://qvapay.com/api/',
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_ENCODING => '',
    //   CURLOPT_MAXREDIRS => 10,
    //   CURLOPT_TIMEOUT => 0,
    //   CURLOPT_FOLLOWLOCATION => true,
    //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //   CURLOPT_CUSTOMREQUEST => 'GET',
    //   CURLOPT_POSTFIELDS =>'{
    //     "app_id": "'.env('qvapay_id').'",
    //     "app_secret": "'.env('qvapay_secret').'",
    //     "transaction_uuid": "'.$transaction_uuid.'"
    //   }',
    //   CURLOPT_HTTPHEADER => array(
    //     'Accept: application/json'
    //   ),
    // ));

    // $response = curl_exec($curl);

    // curl_close($curl);

    // $data=json_decode($response,true);
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://qvapay.com/api/v1/transactions/' . $transaction_uuid . '?app_id=' . $appid . '&app_secret=' . $appsecret . '',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_HTTPHEADER => array(

        'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);

    $data = json_decode($response, true);

    if ($data == null) {
      return 'Error orden no encontrada';
    } else {


      $appidpago = env("qvapay_id_pagos");
      $idapp = $data["app_id"];
      $status = $data["status"];
      $amount = $data["amount"];
      $username = $data["paid_by"]["username"];
      $name = $data["paid_by"]["name"];
      $lastname = $data["paid_by"]["lastname"];
      $appuser = $data["owner"]["username"];
      curl_close($curl);

      $verificar_uuid = Ordene::where('transaction_uuid', $transaction_uuid)->get();
      if ($verificar_uuid->count() > 0) {
        return "Error: Esta orden ya ha sido acreditada";
      } else {
        if ($status == "paid" && $idapp = $appidpago) {
          Ordene::create([


            'id_user' => Auth::user()->id,
            'total' =>  $amount,
            'subtotal' => $amount,
            'transaction_uuid' => $transaction_uuid,
            'usuario_remoto' => $username,
            'metodopago' => 'qvapay'

          ]);
          return redirect(route('home'));
        } else {
          return 'Orden no pagada o incorrecta';
        }

        // return redirect(route('home'));

      }
    }
  }
}
