function mostrarDatos(data){
    const contenedor = document.querySelector('.contenedor');
    contenedor.innerHTML = '';    
    for (let i = 0; i < data.length; i++) {
        const div = document.createElement('div');
        const p = document.createElement('p');
        const b = document.createElement('b');
        for (let key in data[i]) {
            if (key !== '0' && key !== '1') {
                if (key.includes('id')){
                    p.setAttribute('data-id', data[i][key]);
                }

                b.innerText = `${key}: `;
                p.appendChild(b);
                p.innerText = data[i][key];
            }
            div.appendChild(p);
        }
        contenedor.appendChild(div);
    }

    return contenedor;
}

function listar(url, binfo, funcion){
    const body = new FormData();
    body.append(
        binfo.accion, binfo.clase
    );
    fetch(url, {
        method: 'POST',
        body: body
    })
    .then(respuesta => respuesta.json())
    .then(data => {
        funcion(data);
    })
}

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
buscador.forEach(fmBuscador =>{
    fmBuscador.addEventListener('submit', (e)=>{
        e.preventDefault();
        const formData = new FormData(fmBuscador);
        fetch(fmBuscador.action, {
            method: fmBuscador.method,
            body: formData
        })
        .then(respuesta => respuesta.json())
        .then(data => {
            mostrarDatos(data);
        })
        .catch(error =>{
            console.error('Hubo un error del servidor: ' + error); 
        });
    });
});


if (window.location.href == 'http://localhost/stock_repuestos_zoomcelulares/?view=marcas') {
    const url = 'http://localhost/stock_repuestos_zoomcelulares/src/ajax/ajax_marca.php';
    const binfo = {
        accion: 'buscar',
        clase: 'marca'
    }
    listar(url, binfo, mostrarDatos)
}

if (window.location.href == 'http://localhost/stock_repuestos_zoomcelulares/?view=modelos') {
    const url = 'http://localhost/stock_repuestos_zoomcelulares/src/ajax/ajax_modelo.php';
    const binfo = {
        accion: 'buscar',
        clase: 'modelo'
    }
    listar(url, binfo, mostrarDatos);
}