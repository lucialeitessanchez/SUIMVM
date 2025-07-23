document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("hijosVictima-collection");
    const addButton = document.getElementById("add-hijo");

    if (!container || !addButton) return;

    let index = parseInt(container.dataset.index);

    addButton.addEventListener("click", function () {
        const prototype = container.dataset.prototype;
        const newForm = prototype.replace(/__name__/g, index);
        const div = document.createElement("div");
        div.classList.add("hijo-item", "mb-3");
        div.innerHTML = newForm;
        container.appendChild(div);
        index++;
        container.dataset.index = index;

        // Botón de eliminar
        div.querySelectorAll(".remove-hijo").forEach((btn) => {
            btn.addEventListener("click", () => div.remove());
        });
    });

    // Inicializar los botones de eliminar existentes
    container.querySelectorAll(".remove-hijo").forEach((btn) => {
        btn.addEventListener("click", function () {
            btn.closest(".hijo-item").remove();
        });
    });
});