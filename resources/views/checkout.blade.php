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




    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">

            <div class="checkout__form">
                <h4>Detalles de factura</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Nombre<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Apellidos<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Pais <span>*</span></p>
                                <input type="text" value="Cuba" disabled>
                            </div>
                            <div class="checkout__input">
                                <p>Pais donde realiza el pago<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Dirección<span>*</span></p>
                                <input type="text" placeholder="Calle" class="checkout__input__add">
                                <input type="text" placeholder="Número de casa, edificio, etc (Todos los detalles) ">
                            </div>
                            <div class="checkout__input">
                                <p>Provincia<span>*</span></p>
                                <input type="text" value="La Habana" disabled>
                            </div>
                            <div class="checkout__input">
                                <p>Municipio<span>*</span></p>
                                <input type="text">
                            </div>
                            {{-- <div class="checkout__input">
                                <p>Codigo Postal<span>*</span></p>
                                <input type="text">
                            </div> --}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Telefono<span>*</span></p>
                                        <input type="text" placeholder="Celular o fijo en Cuba">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Create an account?
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Create an account by entering the information below. If you are a returning customer
                                please login at the top of the page</p>
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="text">
                            </div> --}}
                            {{-- <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div> --}}
                            <div class="checkout__input">
                                <p>Notas<span>*</span></p>
                                <input type="text"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>

               
                    </form>
                <div class="col-lg-4 col-md-6">
                    <div class="checkout__order">
                        <h4>Tu orden</h4>
                        <div class="checkout__order__products">Productos <span>Total</span></div>
                        <ul>
                            @auth
                                @php $subtotal = 0; @endphp
                                @foreach ($carrito as $item)
                                    @if ($item->quantity > $item->associatedModel->stock)
                                        <!-- no se hace nada si la cantidad es mayor que el stock -->
                                    @else
                                        <li><i>{{ $item->quantity }} -
                                            </i>{{ $item->associatedModel->nombre }}<span>
                                                {{ $_COOKIE['moneda'] === 'usd' ? "$ " . $item->associatedModel->preciousd * $item->quantity : "€ " . $item->associatedModel->preciousd * $exchangeRate * $item->quantity }}</span>
                                        </li>
                                        @php $subtotal += $_COOKIE['moneda'] === 'usd' ? $item->associatedModel->preciousd * $item->quantity : $item->associatedModel->preciousd * $exchangeRate * $item->quantity; @endphp
                                    @endif
                                @endforeach
                            @endauth
                        </ul>
                        <div class="checkout__order__subtotal">Subtotal <span>{{ $_COOKIE['moneda'] === 'usd' ? "$ " . $subtotal : "€ " . $subtotal }}</span></div>
                        <div class="checkout__order__subtotal">Envio <span>$0.00</span></div>
                        <div class="checkout__order__subtotal">Descuento <span>$0.00</span></div>
                        <div class="checkout__order__subtotal">Impuestos <span>$0.00</span></div>
                        <div class="checkout__order__total">Total <span>{{ $_COOKIE['moneda'] === 'usd' ? "$ " . $subtotal : "€ " . $subtotal }}</span></div>
                
                        <form action="{{ route('pagar_con_qvapay') }}" method="POST">
                            @csrf
                            <input type="hidden" name='uid' value="{{ Auth::user()->id }}">
                            <input type="hidden" name='total' value="{{ $subtotal }}">
                            <input type="hidden" name='remote_id' value="{{ $subtotal }}">
                
                            <div class="checkout__input__checkbox">
                                <h5>Metodos de Pago</h5>
                                {{-- <label for="qvapay">
                                    Qvapay
                                    <input type="radio" id="qvapay" name="metodopago" value="qvapay" checked>
                                </label>
                                <br> --}}
                                <label for="efectivo">
                                    Tarjeta de credito
                                    <input type="radio" id="efectivo" name="metodopago" value="credito">
                                </label>
                                <button type="submit" class="site-btn">Pagar</button>
                        </form>
                    </div>
                </div>
                
                
            
        </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
