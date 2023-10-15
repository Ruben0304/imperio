@extends('template')
@section('contenido')
    <!-- Hero Section Begin -->
    
    <section class="hero hero-normal">


        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Categorias</span>
                        </div>
                        <ul>
                            @foreach ($categorias as $categoria)
                                <li><a href="{{ $categoria->id }}">{{ $categoria->nombre }}</a></li>
                            @endforeach
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        </ul>
                        @include('_search')
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+1 7865926593</h5>
                                <span>Atenderemos Enseguida</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->



    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Productos</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $subtotal = 0; @endphp
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td class="shoping__cart__item" style="width: 630px;">
                                            <img src="{{ $item->associatedModel->foto }}" alt=""
                                                style="max-width: 100%; width: 110px">
                                            <h5>{{ $item->name }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ $_COOKIE['moneda'] === 'usd' ? "$ " . $item->associatedModel->preciousd : "€ " . $item->associatedModel->preciousd * $exchangeRate }}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <a href="{{ route('restar_carrito', $item->id) }}"><span
                                                            class="dec qtybtn">-</span></a>
                                                    <input type="text" value={{ $item->quantity }}>
                                                    <a href="{{ route('sumar_carrito', $item->id) }}"><span
                                                            class="inc qtybtn">+</span></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            {{ $_COOKIE['moneda'] === 'usd' ? "$ " . $item->associatedModel->preciousd * $item->quantity : "€ " . $item->associatedModel->preciousd * $exchangeRate * $item->quantity }}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a href="{{ route('quitar_carrito', $item->id) }}"><span
                                                    class="icon_close"></span></a>
                                        </td>
                                    </tr>
                                    @php $subtotal += ($_COOKIE['moneda'] === 'usd' ? $item->associatedModel->preciousd * $item->quantity : $item->associatedModel->preciousd * $exchangeRate * $item->quantity); @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Descuentos</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">Aplicar Cupon</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Este sería el precio</h5>
                        <ul>
                            <li>Subtotal <span>{{ $_COOKIE['moneda'] === 'usd' ? "$ " . $subtotal : "€ " . $subtotal }}</span></li>
                            <li>Total <span>{{ $_COOKIE['moneda'] === 'usd' ? "$ " . $subtotal : "€ " . $subtotal }}</span></li>
                        </ul>
                       

                        <a href="{{ route('mapa') }}" class="primary-btn"> Ir a Pagar &#128176;</a>
                 
                    </div>
                   
                        
                        
                    
                    
                    {{-- <script src="https://js.stripe.com/v3/"></script>
                    <script>
                        var stripe = Stripe(env('STRIPE_KEY'));
                        var elements = stripe.elements();
                        var card = elements.create('card');
                        card.mount('#card-element');
                    
                        document.getElementById('payment-form').addEventListener('submit', function (event) {
                            event.preventDefault();
                    
                            stripe.createPaymentMethod('card', card).then(function (result) {
                                if (result.error) {
                                    // Manejar errores si los hay
                                } else {
                                    // Envía el ID del PaymentMethod al servidor para procesar el pago
                                    fetch('/procesar-pago', {
                                        method: 'POST',
                                        headers: { 'Content-Type': 'application/json' },
                                        body: JSON.stringify({ 
                                            payment_method_id: result.paymentMethod.id,
                                        }),
                                    })
                                    .then(function (response) {
                                        return response.json();
                                    })
                                    .then(function (data) {
                                        // Maneja la respuesta del servidor
                                        if (data.success) {
                                            // El pago fue exitoso
                                        } else {
                                            // El pago falló
                                        }
                                    });
                                }
                            });
                        });
                    </script> --}}
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
