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
    