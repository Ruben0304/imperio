(() => {


document.addEventListener("DOMContentLoaded", async () => {




    try {
        // Preferiblemente debería ser la URL absoluta
        // Ejemplo: http://localhost/contador_visitas_php_avanzado/contador/registrar_visita.php
        const url = "http://localhost/tualimento/public/registrar_visita/registrar_visita.php";
        const payload = {
            pagina: document.title,
            url: window.location.href,
        };
        const respuestaRaw = await fetch(url, {
            method: "POST",
            body: JSON.stringify(payload),
        });
        const respuesta = await respuestaRaw.json();
        if (!respuesta) {
            console.log("Error registrando visita");
        }
    } catch (e) {
        console.log("Error registrando visita: " + e);
    }
});
})();