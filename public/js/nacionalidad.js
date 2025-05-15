document.addEventListener("DOMContentLoaded", function () {

    const nacionalidades = [
        "Argentina", "Alemana", "Boliviana", "Brasileña", "Canadiense",
        "Chilena", "China", "Colombiana", "Coreana", "Cubana",
        "Danesa", "Ecuatoriana", "Egipcia", "Española", "Estadounidense",
        "Filipina", "Francesa", "Griega", "Guatemalteca", "Haitiana",
        "Hondureña", "India", "Indonesa", "Inglesa", "Iraní",
        "Irlandesa", "Israelí", "Italiana", "Japonesa", "Libanesa",
        "Malaya", "Marroquí", "Mexicana", "Nicaragüense", "Noruega",
        "Neozelandesa", "Panameña", "Paraguaya", "Peruana", "Polaca",
        "Portuguesa", "Puertorriqueña", "Rumana", "Rusa", "Salvadoreña",
        "Sueca", "Suiza", "Tailandesa", "Tunecina", "Turca",
        "Ucraniana", "Uruguaya", "Venezolana", "Vietnamita"
    ];

        const select = document.getElementById('nacionalidad');
        nacionalidades.forEach(nacionalidad => {
            const option = document.createElement('option');
            option.value = nacionalidad;
            option.text = nacionalidad;
            select.appendChild(option);
        });
    });
    
