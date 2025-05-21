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

    if (binfo.id != '') {
        body.append(
            'id', binfo.id
        );
    }

    fetch(url, {
        method: 'POST',
        body: body
    })
    .then(respuesta => respuesta.json())
    .then(data => {
        funcion(data);
    })
}

function selectDatos(data){
    let select;
    let option;
    if (data[0].marca) {
        select = document.querySelector('.selectMarcas');
        option = '<option value="0">Seleccione una Marca</option>'
    }else{
        select = document.querySelector('.selectModelos');
        option = '<option value="0">Seleccione un Modelo</option>'
    }
    select.innerHTML = '';
    select.innerHTML = option;
    for (let i = 0; i < data.length; i++) {
        const option = document.createElement('option');
        for (let key in data[i]) {
            if (key == 'marca') {
                option.value = data[i].id_mar;
                option.innerText = data[i].marca;
            }else if (key == 'modelo') {
                option.value = data[i].id_mod;
                option.innerText = data[i].modelo;
            }            
        }        
        select.appendChild(option);
    }
    return select;
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

            if (window.location.href == 'http://localhost/stock_repuestos_zoomcelulares/?view=repuestos') {
                const url = 'http://localhost/stock_repuestos_zoomcelulares/src/ajax/ajax_marca.php';
                const binfo = {
                    accion: 'buscar',
                    clase: 'marca'
                }
                listar(url, binfo, selectDatos)
                listar(
                    'http://localhost/stock_repuestos_zoomcelulares/src/ajax/ajax_repuesto.php',
                    {
                        accion: 'buscar',
                        clase: 'repuesto'
                    },
                    mostrarDate
                )
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
    const url = 'http://localhost/stock_repuestos_zoomcelulares/src/ajax/ajax_marca.php';
    const binfo = {
        accion: 'buscar',
        clase: 'marca'
    }
    listar(url, binfo, selectDatos)

    const url2 = 'http://localhost/stock_repuestos_zoomcelulares/src/ajax/ajax_modelo.php';
    const binfo2 = {
        accion: 'buscar',
        clase: 'modelo'
    }
    listar(url2, binfo2, mostrarDatos);
}

if (window.location.href == 'http://localhost/stock_repuestos_zoomcelulares/?view=repuestos') {
    const url = 'http://localhost/stock_repuestos_zoomcelulares/src/ajax/ajax_marca.php';
    const binfo = {
        accion: 'buscar',
        clase: 'marca'
    };
    listar(url, binfo, selectDatos);

    const selectMarcas = document.querySelector('.selectMarcas');
    const selectModelos = document.querySelector('.selectModelos');
    selectModelos.setAttribute('disabled', 'disabled');
    selectMarcas.addEventListener('change', (e) => {
        const id = e.target.value;
        const url = 'http://localhost/stock_repuestos_zoomcelulares/src/ajax/ajax_modelo.php';
        const binfo = {
            accion: 'buscar_por_id',
            clase: 'modelo',
            id: id
        }
        selectModelos.removeAttribute('disabled');
        selectModelos.innerHTML = '<option value="0">Seleccione un Modelo</option>';
        listar(url, binfo, selectDatos);
    });

    listar(
        'http://localhost/stock_repuestos_zoomcelulares/src/ajax/ajax_repuesto.php',
        {
            accion: 'buscar',
            clase: 'repuesto'
        },
        mostrarDate
    )
}

function mostrarDate(data){
    const contenedor = document.querySelector('.contenedor');
    contenedor.innerHTML = '';
    for (let i = 0; i < data.length; i++) {
        const p = document.createElement('p');
        p.innerText = `Marca: ${data[i].marca} - Modelo: ${data[i].modelo} - Repuesto: ${data[i].repuesto} - Stock: ${data[i].stock}`;
        contenedor.appendChild(p);
    }
    return contenedor;
}