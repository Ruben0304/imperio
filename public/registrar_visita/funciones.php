<?php
function registrarVisita($pagina, $url)
{
    
    $ip = $_SERVER["REMOTE_ADDR"] ?? "";
    $servidor="localhost";
    $usuario='root';
    $contraseña="";
    $base="tualimento";
    $consulta = new mysqli($servidor,$usuario,$contraseña,$base);
    $regisvisita="INSERT INTO `visitas` (   `ip`, `pagina`,  `url`) VALUES ( '$ip', '$pagina', ' $url');";
    mysqli_query($consulta, $regisvisita);
    
   
}

