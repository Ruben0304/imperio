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
                <form action="" class="sendPay" id="calculator-form" method="post" accept-charset="utf-8">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Moneda de Envío<span>*</span></p>
                                <select required="" id="c_remittance" class="calculator-field" name="remittance">
                                    <option value="" selected="selected">Seleccione</option>
                                    <option value="2">USD</option>
                                    <option value="3">EUR</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Moneda que Recibe<span>*</span></p>
                                <select required="" id="c_currencyPay" class="calculator-field" name="currency">
                                    <option value="" selected="selected">Seleccione</option>
                                    <option value="8">MLC</option>
                                    <option value="2">USD</option>
                                    <option value="7">MN</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__input">

                                <p>Cantidad a Enviar<span>*</span></p>
                                <input id="c_amountToPay" name="amountToSend" type="number" min="1" step=".01"
                                    max="3000" class="form-control calculator-field" required>
                                <div id="error-message" style="display: none; color: red;">El mínimo de envío es 100
                                </div>
                                <input id="c_amountToPayReal" type="hidden" name="amountToSendReal">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Beneficiario Recibe<span>*</span></p>
                                <input readonly="" id="amountToBeneficiary" name="amountBeneficiary" type="number"
                                    min="1" step=".01" class="form-control calculator-field">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Nombre y Apellidos<span>*</span></p>
                                    <input type="text" required>
                                </div>
                            </div>

                        </div>

                        <div class="checkout__input">
                            <p>Dirección en Cuba<span>*</span></p>
                            <input type="text" placeholder="Calle, Municipio, Provincia" class="checkout__input__add"
                                required>
                            <input type="text" placeholder="Número de casa, edificio, etc (Todos los detalles) "
                                required>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Carnet de Identidad ( de quien recibe )<span>*</span></p>
                                    <input type="text" placeholder="Numero de carnet de identidad" required
                                        pattern="[0-9]{11}" title="Ingresa un número válido de 11 dígitos">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Entrega<span>*</span></p>
                                    <select required="" id="c_deliveryMethod" class="calculator-field"
                                        name="deliveryMethod">
                                        <option value="" selected="selected">Seleccione</option>
                                        <option value="domicilio">Entrega a Domicilio</option>
                                        <option value="recogida">Recogida en Tienda</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <p>🚚 Lo haremos en menos de 24h </p>

                    <div class="checkout__input" style="text-align: center;">
                        <button id="c_submit" type="submit" class="site-btn">Continuar</button>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // Obteniendo referencias a los elementos del formulario
            let amountToPay = document.querySelector("#c_amountToPay");
            let amountToBeneficiary = document.querySelector("#amountToBeneficiary");
            let errorMessage = document.querySelector("#error-message");
            let submitButton = document.querySelector("#c_submit");

            // Manejo de eventos al cambiar los valores de los campos
            amountToPay.addEventListener("input", updateBeneficiaryAmount);
            amountToPay.addEventListener("input", validateAmount);

            function updateBeneficiaryAmount() {
                // Establecer el valor del campo "Beneficiario recibe" a 0.9091 (1/1.10) veces la "Cantidad a enviar"
                amountToBeneficiary.value = (0.9091 * amountToPay.value).toFixed(2);
            }

            function validateAmount() {
                if (amountToPay.value < 100) {
                    errorMessage.style.display = "block";
                    submitButton.disabled = true;
                } else {
                    errorMessage.style.display = "none";
                    submitButton.disabled = false;
                }
            }
        });
    </script>
@endsection
