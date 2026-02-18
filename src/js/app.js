document.addEventListener("DOMContentLoaded", function() {
    eventListeners();

    darkMode();
});

function darkMode() {
    const prefiereDarkMode = window.matchMedia("(prefers-color-scheme: dark)");
    const darkModeBoton = document.querySelector(".dark-mode-boton");
   
    if(prefiereDarkMode.matches) {
        document.body.classList.add("dark-mode");
    }else {
        document.body.classList.remove("dark-mode");
    }

    prefiereDarkMode.addEventListener("change", function() {
    if(prefiereDarkMode.matches) {
        document.body.classList.add("dark-mode");
    }else {
        document.body.classList.remove("dark-mode");
    }
    });
    
    darkModeBoton.addEventListener("click", function() {
        document.body.classList.toggle("dark-mode");
    });
}

function eventListeners() {
    const mobileMenu = document.querySelector(".mobile-menu");

    mobileMenu.addEventListener("click", navegacionResponsive);

    //Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener("click", mostrarMetodosContacto));

}

function navegacionResponsive(){
    const navegacion = document.querySelector(".navegacion");

    if(navegacion.classList.contains("mostrar")) {
       navegacion.classList.remove("mostrar");
    }else {
        navegacion.classList.add("mostrar");
    }
}
function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector("#contacto");
    if(e.target.value === "telefono") {
        contactoDiv.innerHTML = `
            <label for="telefono">Numero de Telefono:</label>
            <input type="tel" id="telefono" name="contacto[telefono]" placeholder="Tu telefono">

            <p>Eliga la fecha y la hora para la llamada</p>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="contacto[hora]" min="09:00" max="18:00">
        `;
    }else {
        contactoDiv.innerHTML = `
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="contacto[email]" placeholder="Tu email" required>
        `;
    }
}
