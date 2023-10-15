<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description"
        content="Imperio es la principal tienda online en Cuba para compras al por menor, remesas y envíos de paquetería. Precios en USD con cambio automático a Euros. ">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imperio: Tienda Online en Cuba | Envío de Remesas y Paquetería</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: black;
            color: whitesmoke;
            overflow: hidden;
        }
    
        .logo-container {
            position: absolute;
            top: 38%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            opacity: 0;
            animation: fade-in 1.5s forwards;
        }
    
        @keyframes fade-in {
            0% {
                opacity: 0;
                transform: translate(-50%, -60%);
            }
            100% {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }
    
        .logo {
            width: 300px;
        }
    
        .nav {
            list-style: none;
            text-align: center;
            padding: 10px; /* Ajustar el espaciado para dispositivos móviles */
            position: absolute;
            top: 48%;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
        }
    
        .nav li {
            margin: 0 5px; /* Ajustar el espaciado entre los enlaces para dispositivos móviles */
            font-size: 18px; /* Tamaño de fuente más pequeño para dispositivos móviles */
            opacity: 0;
            animation: slide-in 1s forwards;
        }
    
        .nav a {
            text-decoration: none;
            color: whitesmoke;
            transition: transform 0.3s, color 0.3s;
        }
    
        .nav a:hover {
            transform: scale(1.1);
            color: #3c64ccda;
        }
    
        @keyframes slide-in {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
    
        @media (max-width: 768px) { /* Estilos para dispositivos móviles */
            .logo-container {
                top: 30%; /* Ajustar la posición del logo en dispositivos móviles */
            }
    
            .logo {
                width: 250px; /* Ajustar el tamaño del logo en dispositivos móviles */
            }
    
            .nav {
                flex-direction: column;
                align-items: center;
                top: 38%; /* Centrar verticalmente en dispositivos móviles */
            }
    
            .nav li {
                margin: 3px 0; /* Espaciado aún menor entre los enlaces en dispositivos móviles */
                font-size: 16px; /* Tamaño de fuente aún más pequeño para dispositivos móviles */
                opacity: 0;
                animation: slide-in 1s forwards;
            }
        }
    </style>
    
    
    
    
    

</head>

<body>
    <div class="logo-container">
        <img src="img/logolargoblanco.png" alt="logo" class="logo">
    </div>

    <ul class="nav">
        <li><a href="{{ route('shoping') }}">🛒 Alimentos</a></li>
        <li><a href="{{ route('remesas') }}">💰 Remesas</a></li>
        <li><a href="{{ route('paqueteria') }}">📦 Paqueteria</a></li>
        <li><a href="{{ route('contacto') }}">📞 Contacto</a></li>
    </ul>

</body>

</html>
