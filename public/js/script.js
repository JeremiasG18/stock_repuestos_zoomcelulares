function mostrarMarcas(){
    const contenedorMarcas = document.querySelector('.contenedorMarcas');

    const url = 'http://localhost/stock_repuestos_zoomcelulares/src/ajax/ajax_marca.php';
    const method = 'POST';
    const body = {
        buscar: 'marca'
    };

    fetch(url,{
        method: method,
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(body)
    })
    .then(response => response.json())
    .then(data => {
        contenedorMarcas.innerHTML = '';
        for (let i = 0; i < data.length; i++) {
            const p = document.createElement('p');
            p.textContent = data[i].marca;
            contenedorMarcas.appendChild(p);
        }
    });
    return contenedorMarcas;

}

function mostrarModelos(modelo){
    const contenedorModelo = document.querySelector('.contenedorModelos');
    contenedorModelo.innerHTML = '';
    const url = 'http://localhost/stock_repuestos_zoomcelulares/src/ajax/ajax_modelo.php';
    const body = new FormData();
    // if (modelo != '') {
    //     body.append('')
    // }
    body.append(
        'buscar', 'modelo'
    );
    fetch(url, {
        method: 'POST',
        body: body
    })
    .then(respuesta => respuesta.json())
    .then(data => {
        for (let i = 0; i < data.length; i++) {
            const p = document.createElement('p');
            p.textContent = data[i].modelo;
            contenedorModelo.appendChild(p);   
        }
    })
    return contenedorModelo;
}

// function selectMarcas(){

//     const selectMarcas = document.querySelector('#marcas');

//     const url = 'http://localhost/stock_repuestos_zoomcelulares/src/ajax/ajax_marca.php';
//     const body = {
//         buscar: 'marca'
//     };
//     fetch(url, {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json'
//         },
//         body: JSON.stringify(body)
//     })
//     .then(respuesta => respuesta.json())
//     .then(datos => {
//         for (let i = 0; i < datos.length; i++) {
//             const option = document.createElement('option');
//             option.value = datos[i].id_mar;
//             option.textContent = datos[i].marca;
//             selectMarcas.appendChild(option);
//         }
//     })

//     return selectMarcas;
    
// }

const formulario = document.querySelectorAll('.form');
formulario.forEach((form) =>{
    form.addEventListener('submit', (e) =>{
        e.preventDefault();
        
        const formData = new FormData(form);
        const url = form.action;
        const method = form.method;
        
        fetch(url,{
            method: method,
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.title == 'success') {
                form.reset();
            }
            
            if (window.location.href == 'http://localhost/stock_repuestos_zoomcelulares/?view=modelos') {
                mostrarModelos();
            }

            if (window.location.href == 'http://localhost/stock_repuestos_zoomcelulares/?view=marcas') {
                mostrarMarcas();
            }
        })
        .catch(error => {
            console.error('Error en la solicitud:', error);
        })
    })
});

const buscador = document.querySelectorAll('.formSearch');
buscador.forEach(buscar =>{
    buscar.addEventListener('submit', (e)=>{
        e.preventDefault();
        const formData = new FormData(buscar);
        fetch(buscar.action, {
            method: buscar.method,
            body: formData
        })
        .then(respuesta => respuesta.json())
        .then(data => {
            showDataSearch(data);
        })
        .catch(error =>{
            console.error('Hubo un error del servidor: ' + error); 
        });
    });
});


if (window.location.href == 'http://localhost/stock_repuestos_zoomcelulares/?view=marcas') {
    mostrarMarcas();
}

if (window.location.href == 'http://localhost/stock_repuestos_zoomcelulares/?view=modelos') {
    mostrarModelos();
}

function showDataSearch(data){
    const contenedorModelo = document.querySelector('.contenedorModelos');
    contenedorModelo.innerHTML = '';    
    for (let i = 0; i < data.length; i++) {
        const p = document.createElement('p');
        p.textContent = data[i].modelo;
        contenedorModelo.appendChild(p);   
    }
    return contenedorModelo;
}