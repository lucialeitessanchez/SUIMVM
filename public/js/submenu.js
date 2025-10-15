    document.addEventListener("DOMContentLoaded", function () {
    // Manejo del submenú en "justiciayseguridad.html"
    if (window.location.pathname.includes("justiciayseguridad_form.html.twig")) {
        document.getElementById("subMenu").style.display = "block";
    }

    // Función para ocultar/mostrar el menú
    function toggleMenu() {
        document.getElementById("subMenu").classList.toggle("d-none");
    }

    // Manejo de la selección del ítem 911 en el menú
    document.getElementById("menu-911").addEventListener("click", function () {
        // Quitar la clase "active" de todos los elementos del menú
        document.querySelectorAll(".nav-link").forEach(item => item.classList.remove("active"));
        this.classList.add("active");

        // Ocultar todos los acordeones antes de mostrar el de 911
        document.querySelectorAll(".accordionContainer").forEach(acc => acc.style.display = "none");

        // Mostrar el acordeón específico del 911
        document.getElementById("accordionContainer911").style.display = "block";
    });

    // Manejo de la selección del ítem denuncias previas en el menú
    document.getElementById("menu-denunciasPrevias").addEventListener("click", function () {
        // Quitar la clase "active" de todos los elementos del menú
        document.querySelectorAll(".nav-link").forEach(item => item.classList.remove("active"));
        this.classList.add("active");

        // Ocultar todos los acordeones antes de mostrar el de 911
        document.querySelectorAll(".accordionContainer").forEach(acc => acc.style.display = "none");

        // Mostrar el acordeón específico del 911
        document.getElementById("accordionContainerDenunciasPrevias").style.display = "block";
    });

    // Manejo del toggle para mostrar el input de archivo si hay audio
    const toggleAudio = document.getElementById("hayAudio911");
    const fileInput = document.querySelector("#hayAudio911").closest(".accordion-body").querySelector("input[type='file']");

    // Ocultar el input de archivo al cargar la página
    fileInput.style.display = "none";

    // Evento para mostrar/ocultar el campo de archivo
    toggleAudio.addEventListener("change", function () {
        fileInput.style.display = this.checked ? "block" : "none";
    });

        // Manejo de la selección Servicio penitenciario en el menú
    document.getElementById("menu-servicioPenitenciario").addEventListener("click", function () {
        // Quitar la clase "active" de todos los elementos del menú
        document.querySelectorAll(".nav-link").forEach(item => item.classList.remove("active"));
        this.classList.add("active");

        // Ocultar todos los acordeones antes de mostrar el de 911
        document.querySelectorAll(".accordionContainer").forEach(acc => acc.style.display = "none");

        // Mostrar el acordeón específico del 911
        document.getElementById("accordionContainerservicioPenitenciario").style.display = "block";
    })
});
