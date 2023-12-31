@extends('template')
@section('contenido')
    <section class="hero-normal">

        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Categorias</span>
                        </div>
                        <ul>
                            @for ($i = 0; $i < 11; $i++)
                                <li><a href="">Categoria {{ $i }}</a></li>
                            @endfor

                            {{-- @foreach ($categorias as $categoria)
                            
                        
                        <li><a href="{{$categoria->id}}">{{$categoria->nombre}}</a></li>
                        @endforeach --}}
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        </ul>
                        @include('_search')
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-whatsapp"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+1 7865926593</h5>
                                <span>Atenderemos Enseguida</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="" id="youtube">
                        <img src="img/hero/banner.jpg" alt="">
                        {{-- <iframe width="100%" height="98%" style="margin-bottom: 2%; border:none;"
                    src="https://www.youtube.com/embed/VldpThb0SY4">
                    </iframe>  --}}
                        {{-- <video src="videos/test.webm" width="100%" height="100%" controls></video> --}}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    {{-- @if ($oferta->count() > 3) --}}


    <section class="categories" style="display: none">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">

                    {{-- @foreach ($oferta as $item)
                 @php
                     $antes=$item->producto['precio'.$_COOKIE['moneda'].''];
                     $despues=$item['precio'.$_COOKIE['moneda'].''];
                 @endphp --}}


                    <div class="col-lg-3">
                        <div class="categories__item set-bg"
                            data-setbg="https://aymexico.com/wp-content/uploads/2021/11/HUARACHE-PISO-ARTESANAL-MEXICANO-SAHUAYO-MICHOACAN.jpg">
                            {{-- <div class="product__discount__percent" >-{{intval(($antes-$despues)*100/$antes) }}%</div>
                        <div class="product__discount__fecha" >Quedan {{date_diff(date_create(date('Y-m-d')), date_create($item->fecha_final))->d}} días </div> --}}
                            {{-- <h5 style="font-size: 0.7em;"><a href="#" style="font-size: 1.2em;">{{$item->producto->nombre}}<br><del style="color: grey"> ${{$item->producto['precio'.$_COOKIE['moneda'].'']}}</del> ${{$item['precio'.$_COOKIE['moneda'].'']}}</a></h5> --}}
                            <h5><a href="http://"> Zapatos Mujer</a></h5>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="categories__item set-bg"
                            data-setbg="https://i.etsystatic.com/23503619/r/il/06e6b0/3897355119/il_570xN.3897355119_2x9h.jpg">
                            {{-- <div class="product__discount__percent" >-{{intval(($antes-$despues)*100/$antes) }}%</div>
                        <div class="product__discount__fecha" >Quedan {{date_diff(date_create(date('Y-m-d')), date_create($item->fecha_final))->d}} días </div> --}}
                            {{-- <h5 style="font-size: 0.7em;"><a href="#" style="font-size: 1.2em;">{{$item->producto->nombre}}<br><del style="color: grey"> ${{$item->producto['precio'.$_COOKIE['moneda'].'']}}</del> ${{$item['precio'.$_COOKIE['moneda'].'']}}</a></h5> --}}
                            <h5><a href="http://"> Zapatos hombre</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg"
                            data-setbg="https://huarachesfactory.com/wp-content/uploads/2020/05/zp02464-Sandalia-artesanal-piso-hombre-mayorista-fabricante-calzado-zapatos-proveedor-sandalias-taller-maquilador.jpg">
                            {{-- <div class="product__discount__percent" >-{{intval(($antes-$despues)*100/$antes) }}%</div>
                        <div class="product__discount__fecha" >Quedan {{date_diff(date_create(date('Y-m-d')), date_create($item->fecha_final))->d}} días </div> --}}
                            {{-- <h5 style="font-size: 0.7em;"><a href="#" style="font-size: 1.2em;">{{$item->producto->nombre}}<br><del style="color: grey"> ${{$item->producto['precio'.$_COOKIE['moneda'].'']}}</del> ${{$item['precio'.$_COOKIE['moneda'].'']}}</a></h5> --}}
                            <h5><a href="http://"> Sandalias hombre</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg"
                            data-setbg="https://m.media-amazon.com/images/I/41H0A+106TL.jpg">
                            {{-- <div class="product__discount__percent" >-{{intval(($antes-$despues)*100/$antes) }}%</div>
                        <div class="product__discount__fecha" >Quedan {{date_diff(date_create(date('Y-m-d')), date_create($item->fecha_final))->d}} días </div> --}}
                            {{-- <h5 style="font-size: 0.7em;"><a href="#" style="font-size: 1.2em;">{{$item->producto->nombre}}<br><del style="color: grey"> ${{$item->producto['precio'.$_COOKIE['moneda'].'']}}</del> ${{$item['precio'.$_COOKIE['moneda'].'']}}</a></h5> --}}
                            <h5><a href="http://"> Sandalias Mujer</a></h5>
                        </div>
                    </div>
                    {{-- @endforeach --}}

                    {{-- <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-5.jpg">
                            <div class="product__discount__percent" >-20%</div>
                            <h5><a href="#">Carnes</a></h5>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section> 
    {{-- @endif --}}
    <!-- Categories Section End -->



    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Productos Destacados</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">Todos</li>
                            <li data-filter=".oranges">Carnes</li>

                            <li data-filter=".vegetables">Vegetables</li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($producto as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat" id="latestitem">
                        @auth
                            <form action="{{ route('agregar_carrito') }}" method="POST" id="addCartForm_{{ $item->id }}">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="pid">
                                <input type="hidden" value="1" name="cant">
                            </form>
                        @endauth
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg " data-setbg="{{ $item->foto }}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="{{ route('detalles', 'id=' . $item->id . '') }}"><i class="fa fa-info-circle"></i></a></li>
                                    @auth
                                        <li><a href="javascript:document.getElementById('addCartForm_{{ $item->id }}').submit()"><i class="fa fa-shopping-cart"></i></a></li>
                                    @else
                                        <li><a href="{{ route('login') }}"><i class="fa fa-shopping-cart"></i></a></li>
                                    @endauth
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="{{ route('detalles', '' . $item['id'] . '') }}">{{ $item['nombre'] }}</a></h6>
                                <h5>{{ $_COOKIE['moneda'] === 'usd' ? "$ " . $item->preciousd : "€ " . $item->preciousd * $exchangeRate }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </section>
    <!-- Featured Section End -->
    {{-- <section class="featured spad" style="padding-top: 10px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
    <div class="product__discount">
        <div class="section-title product__discount__title" style="text-align: center">
            <h2>En Oferta</h2>
        </div>
        <div class="row">
            <div class="product__discount__slider owl-carousel">
                @foreach ($oferta as $item)
 @php
     $antes=$item->producto['precio'.$_COOKIE['moneda'].''];
     $despues=$item['precio'.$_COOKIE['moneda'].''];
 @endphp
                <div class="col-lg-4">
                    <div class="product__discount__item" >
                        <div class="product__discount__item__pic set-bg"
                            data-setbg="{{$item->producto->foto}}">
                            <div class="product__discount__percent">-{{intval(($antes-$despues)*100/$antes) }}%</div>
                            <div class="product__discount__fecha" >Quedan {{date_diff(date_create(date('Y-m-d')), date_create($item->fecha_final))->d}} días </div>
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__discount__item__text">
                            
                            <h5><a href="#">{{$item->producto->nombre}}</a></h5>
                            <div class="product__item__price">${{$item['precio'.$_COOKIE['moneda'].'']}} <span>${{$item->producto['precio'.$_COOKIE['moneda'].'']}}</span></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</div>
</section> --}}
    <!-- Banner Begin -->
    {{-- <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    {{-- <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Blog Section End -->
@endsection
