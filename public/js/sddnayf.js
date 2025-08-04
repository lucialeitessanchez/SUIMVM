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

        // 🟢 Aca actualizás los controles nuevos
        controlarCamposHijos(364);

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

    //----------------------------------------------------------
    // Grupo 1: Víctima
    const camposVictima = [
        "sddnayf_new_sddnayf_1c",
        "sddnayf_new_sddnayf_1d",
        "sddnayf_new_sddnayf_1e",
        "sddnayf_new_sddnayf1fa",
        "sddnayf_new_sddnayf1fb",
        "sddnayf_new_sddnayf_1g",
        "sddnayf_new_sddnayf_1h"
    ];
    
    // Grupo 2: Agresor
    const camposAgresor = [
        "sddnayf_new_sddnayf_2c",
        "sddnayf_new_sddnayf_2d",
        "sddnayf_new_sddnayf_2e",
        "sddnayf_new_sddnayf_2fa",
        "sddnayf_new_sddnayf_2fb",
        "sddnayf_new_sddnayf_2g",
        "sddnayf_new_sddnayf_2h"
    ];
    
    // Sufijos del Grupo 3: Hijos (porque los IDs cambian por índice)
    const sufijosCamposHijos = [
        "sddnayf_3c",
        "sddnayf_3d",
        "sddnayf_3e",
        "sddnayf3fa",
        "sddnayf3fb",
        "sddnayf_3g",
        "sddnayf_3h"
    ];

    controlarCamposFijos("sddnayf_new_sddnayf_1b", camposVictima, 364);
    controlarCamposFijos("sddnayf_new_sddnayf_2b", camposAgresor, 364);
    controlarCamposHijos(364);

    function controlarCamposFijos(controlId, campos, valorParaHabilitar) {
        const control = document.getElementById(controlId);
        if (!control) return;
    
        const actualizar = () => {
            const habilitar = parseInt(control.value) === valorParaHabilitar;
            campos.forEach(id => {
                const campo = document.getElementById(id);
                if (campo) {
                    campo.disabled = !habilitar;
                }
            });
        };
    
        control.addEventListener("change", actualizar);
        actualizar();
    }


function controlarCamposHijos(valorParaHabilitar) {
    const controles = document.querySelectorAll("select[id$='_sddnayf_3b']");
    controles.forEach(control => {
        const actualizar = () => {
            const habilitar = parseInt(control.value) === valorParaHabilitar;
            const prefix = control.id.replace(/_sddnayf_3b$/, "");

            sufijosCamposHijos.forEach(sufijo => {
                const campoId = `${prefix}_${sufijo}`;
                const campo = document.getElementById(campoId);
                if (campo) {
                    campo.disabled = !habilitar;
                }
            });
        };

        control.addEventListener("change", actualizar);
        actualizar();
    });
}
    

   
});