document.addEventListener("DOMContentLoaded", function () {
        const filas = document.querySelectorAll("#caso-body tr");
    
        filas.forEach(fila => {
        fila.addEventListener("click", function () {
            const id = this.querySelector("td[id='casoId']")?.textContent.trim();
    
            if (id) {
            fetch('/guardar-caso-sesion', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ idCaso: id })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Seleccionaste el caso "+id,
                        showConfirmButton: false,
                        timer: 1500
                    });
                // podés redirigir o actualizar algo
                } else {
                console.error("Error:", data.error);
                }
            });
            }
        });
        });
    });    
    
    
    /*
    
    document.addEventListener("DOMContentLoaded", () => {
        const tableBody = document.getElementById("caso-body");
    
        function fetchCasos() {
        fetch("casos.json")
            .then((response) => response.json())
            .then((data) => {
            const casos = data.casos;
            tableBody.innerHTML = "";
    
            casos.forEach((caso, index) => {
                const row = document.createElement("tr");
    
                row.innerHTML = `
                <td>Caso ${String(index + 1).padStart(3, '0')}</td>
                <td>${caso.fecha}</td>
                <td>${caso.localidad}</td>
                <td>${caso.institucion || 'SMGyD'}</td>
                <td>
                    <span class="badge text-bg-primary rounded-pill">${caso.actualizaciones || Math.floor(Math.random() * 15 + 1)}</span>
                    <i class="fas fa-eye"></i>
                </td>
                `;
    
                tableBody.appendChild(row);
            });
            })
            .catch((error) => {
            console.error("Error al cargar los casos:", error);
            });
        }
    
        fetchCasos();
    });
    */