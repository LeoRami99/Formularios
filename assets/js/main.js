//funnctio to extrac data form https://www.datos.gov.co/resource/gdxc-w37w.json

const getData = async () => {
    let url = "https://www.datos.gov.co/resource/gdxc-w37w.json";
    let response = await fetch(url);
    let data = await response.json();
    return data;
};


// Se trae el select de departamentos
const selectDepartamentos = document.getElementById("departamentos");
// Consumir la API y colocar los departamentos en el select
const getDepartamentos = async () => {
    let url =
        "https://www.datos.gov.co/resource/gdxc-w37w.json?$query=SELECT%20%60dpto%60%2C%20%60cod_depto%60%20GROUP%20BY%20%60dpto%60%2C%20%60cod_depto%60";
    let response = await fetch(url);
    let data = await response.json();
    // eliminar los cod_dpto que contengan letra o caracter especiales
    let dataClean = data.filter((item) => {
        return !item.cod_depto.includes(" ");
    });
    // ordenar el array alfabeticamente
    dataClean.sort((a, b) => {
        if (a.dpto < b.dpto) {
            return -1;
        }
        if (a.dpto > b.dpto) {
            return 1;
        }
        return 0;
    });
    dataClean.unshift({dpto: "Seleccionar un departamento", cod_depto: ""})
    dataClean.forEach(element => {
        let option = document.createElement("option");
        // Agregar que el seleccionar un departamento este por default seleccionado
        if (element.cod_depto == "") {
            option.selected = true;
        }


        option.value = element.dpto;
        option.text = element.dpto;
        selectDepartamentos.appendChild(option);
    });
};
getDepartamentos();

// Se trae el select de municipios
const selectMunicipios = document.getElementById("municipios");

// hacer que cuando se seleccione un departamento se muestren los municipios con jquery
$("#departamentos").change(function () {
    selectMunicipios.innerHTML = "";
    let depto = $(this).val();  
    let url ='https://www.datos.gov.co/resource/gdxc-w37w.json?dpto='+depto;
    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
           let data = response;
           data.forEach(element => {
                let option = document.createElement("option");
                option.value = `${element.cod_mpio +"-"+ element.nom_mpio}`;
                option.text = element.nom_mpio;
                selectMunicipios.appendChild(option);
           });
        },
    });
})


// Json de Partios politicos de colombia
const partidos_politicos = [
    // {
    //     "nombre": "Alianza Verde",
    //     "sigla": "AV",
    //     "logo": "https://alianzaverde.org.co/images/demo/logo/logo_big_v1.png",
    // },
    // {
    //     "nombre": "Centro Democrático",
    //     "sigla": "CD",
    //     "logo": "https://www.centrodemocratico.com/wp-content/uploads/2019/05/cropped-logo-1.png",
    // },
    // {
    //     "nombre": "Colombia Humana",
    //     "sigla": "CH",
    //     "logo": "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/Logo_Colombia_Humana.png/220px-Logo_Colombia_Humana.png",
    // },
    {
        "nombre":"Fuerza Ciudadana",
        "sigla": "FC",
        "logo": "https://fuerzaciudadana.com.co/wp-content/uploads/2022/05/LOGOFUERZA.png"

    }
    // {
    //     "nombre": "Colombia Humana",
    //     "sigla": "CH",
    //     "logo": "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/Logo_Colombia_Humana.png/220px-Logo_Colombia_Humana.png",
    // },
    // {
    //     "nombre": "Colombia Humana",
    //     "sigla": "CH",
    //     "logo": "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/Logo_Colombia_Humana.png/220px-Logo_Colombia_Humana.png",
    // },
    // {
    //     "nombre": "Colombia Humana",
    //     "sigla": "CH",
    //     "logo": "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/Logo_Colombia_Humana.png/220px-Logo_Colombia_Humana.png",
    // },
    // {
    //     "nombre": "Colombia Humana",
    //     "sigla": "CH",
    //     "logo": "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/Logo_Colombia_Humana.png/220px-Logo_Colombia_Humana.png",
    // },
]

const divPartidosPoliticos = document.getElementById("partido_politico");
divPartidosPoliticos.classList.add("text-center", "scroll-container");

partidos_politicos.forEach(element => {
    let div = document.createElement("div");
    div.classList.add("form-check", "m-2");
    let input = document.createElement("input");
    input.classList.add("form-check-input", "hide-radio");
    input.setAttribute("required", true);
    input.type = "radio";
    input.name = "partido_politico";
    input.id = element.sigla;
    input.value = element.sigla;
    let label = document.createElement("label");
    label.classList.add("form-check-label", "text-center", "m-2");
    label.for = element.sigla;
    let img = document.createElement("img");
    img.src = element.logo;
    img.classList.add("img-fluid");
    img.width = 200;
    img.alt = element.nombre;
    label.appendChild(img); // Envolvemos la imagen en la etiqueta label
    let span = document.createElement("p");
    span.innerHTML = element.nombre;
    label.appendChild(span);
    label.addEventListener("click", function() {
        input.checked = true;
        // Recorremos todos los radio buttons y deseleccionamos los labels que no correspondan al radio button seleccionado
        document.querySelectorAll('input[name="partido_politico"]').forEach(rb => {
            let lbl = rb.parentElement.querySelector("label");
            if (rb.checked) {
                lbl.classList.add("selected");
            } else {
                lbl.classList.remove("selected");
            }
        });
    });
    div.appendChild(input);
    div.appendChild(label);
    divPartidosPoliticos.appendChild(div);
});
// Estilos CSS para la clase adicional "selected"
const selectedStyles = `
  border-radius: 10px;
  padding: 10px;
  border: 2px solid #007bff;
  box-shadow: inset 0px 0px 10px 0px black;
  transition: all 0.3s ease;
`;

const style = document.createElement("style");
style.innerHTML = `
  .selected {
    ${selectedStyles}
  }
  @media (max-width: 576px) {
    .scroll-container {
      overflow: scroll;
      white-space: nowrap;
    }
  }
`;
document.head.appendChild(style);

const aspirante = document.querySelector("#aspirante");
const militante = document.querySelector("#militante");
// selector
const selector_aspirante = document.querySelector("#cargo_asp");
// textarea
const textarea_militante = document.querySelector("#info_militante");

$("#aspirante_militante").change(function() {
    switch ($(this).val()) {
        case "aspirante":
            aspirante.classList.remove("d-none");
            militante.classList.add("d-none");
            // y hacer un disbale de los campos de militante
            textarea_militante.disabled = true;
            selector_aspirante.disabled = false;
            break;
        case "militante":
            aspirante.classList.add("d-none");
            militante.classList.remove("d-none");
            selector_aspirante.disabled = true;
            textarea_militante.disabled = false;
            break;
        case "ambos":
            aspirante.classList.remove("d-none");
            militante.classList.remove("d-none");
            selector_aspirante.disabled = false;
            textarea_militante.disabled = false;
            break;
        default:
            break;
    }
})



