<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Carreras - MiUdenar</title>
    
    <link rel="stylesheet" crossorigin href="assets/compiled/css/app.css">
    <link rel="stylesheet" crossorigin href="assets/compiled/css/app-dark.css">
</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active shadow-sm">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <h4 class="text-primary mt-2">🎓 MiUdenar</h4>
                        </div>
                        <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path><g transform="translate(-210 -1)"><path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path><circle cx="220.5" cy="11.5" r="4"></circle><path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path></g></g></svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                        </div>
                        <div class="sidebar-toggler x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Tablas</li>
                        <li class="sidebar-item">
                            <a href="index.php" class='sidebar-link'>
                                <span>👨‍🎓 Estudiantes</span>
                            </a>
                        </li>
                        <li class="sidebar-item active">
                            <a href="carreras.php" class='sidebar-link'>
                                <span>📚 Carreras</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Gestión de Carreras</h3>
                            <p class="text-subtitle text-muted">Añade, edita y elimina los programas académicos.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="page-content">
                <section class="section">
                    <div class="row mb-4 justify-content-center">
                        <div class="col-12 col-md-8 col-lg-6"> 
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" id="buscador" class="form-control form-control-lg rounded-pill shadow-sm" placeholder="  Buscar por código, nombre o facultad...">
                                <div class="form-control-icon d-flex align-items-center justify-content-center h-100 mt-0 ms-2 position-absolute top-0 start-0">
                                    <i class="bi bi-search text-muted" style="position: relative; top: -8px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-transparent d-flex justify-content-between align-items-center border-bottom">
                            <h5 class="m-0 text-primary">Listado de Carreras</h5>
                            <button class="btn btn-success shadow-sm" data-bs-toggle="modal" data-bs-target="#createModal">
                                + Nueva Carrera
                            </button>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre del Programa</th>
                                            <th>Facultad</th>
                                            <th class="text-end pe-4">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabla-carreras">
                                        <tr>
                                            <td colspan="4" class="text-center py-4">
                                                <div class="spinner-border text-primary" role="status"></div>
                                                <p class="mt-2 text-muted">Cargando datos...</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div id="mensaje-vacio" class="alert alert-warning text-center mt-3 d-none" role="alert">
                        No hay carreras registradas en el sistema.
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Modal  crear-->
    <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Nueva Carrera</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-crear">
                    <div class="modal-body" id="vista-formulario">
                        <div class="mb-3">
                            <label>Código (Ej. SIS01)</label>
                            <input type="text" name="degree_id" class="form-control" maxlength="5" required>
                        </div>
                        <div class="mb-3">
                            <label>Nombre de la Carrera</label>
                            <input type="text" name="degree_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Facultad</label>
                            <input type="text" name="faculty" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-body text-center d-none py-5" id="vista-cargando">
                        <div class="spinner-border text-success mb-3" role="status" style="width: 3rem; height: 3rem;"></div>
                        <h5>Guardando...</h5>
                    </div>
                    <div class="modal-body text-center d-none py-4" id="vista-exito">
                        <h1 class="display-1 text-success mb-3">✔️</h1>
                        <h3 class="text-success">¡Acción exitosa!</h3>
                        <p class="text-muted" id="mensaje-exito-texto"></p>
                    </div>
                    <div class="modal-footer" id="footer-normal">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="modal-footer d-none" id="footer-exito">
                        <button type="button" class="btn btn-success w-100" data-bs-dismiss="modal">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal  editar-->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title">Editar Carrera</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-editar">
                    <div class="modal-body" id="vista-formulario-edit">
                        <div class="mb-3">
                            <label>Código (No modificable)</label>
                            <input type="text" id="edit-degree-id" name="degree_id" class="form-control bg-light" readonly required>
                        </div>
                        <div class="mb-3">
                            <label>Nombre de la Carrera</label>
                            <input type="text" id="edit-degree-name" name="degree_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Facultad</label>
                            <input type="text" id="edit-faculty" name="faculty" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-body text-center d-none py-5" id="vista-cargando-edit">
                        <div class="spinner-border text-warning mb-3" role="status" style="width: 3rem; height: 3rem;"></div>
                        <h5>Actualizando...</h5>
                    </div>
                    <div class="modal-body text-center d-none py-4" id="vista-exito-edit">
                        <h1 class="display-1 text-warning mb-3">✔️</h1>
                        <h3 class="text-warning">¡Actualización exitosa!</h3>
                        <p class="text-muted" id="mensaje-exito-texto-edit"></p>
                    </div>
                    <div class="modal-footer" id="footer-normal-edit">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning">Guardar Cambios</button>
                    </div>
                    <div class="modal-footer d-none" id="footer-exito-edit">
                        <button type="button" class="btn btn-warning w-100" data-bs-dismiss="modal">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal  borrar-->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-borrar">
                    <input type="hidden" id="delete-degree-id" name="degree_id">
                    <div class="modal-body text-center py-4" id="vista-formulario-delete">
                        <h4 class="text-danger mb-3">¿Estás seguro?</h4>
                        <p>Vas a eliminar permanentemente la carrera:</p>
                        <h5 id="delete-nombre-display" class="fw-bold"></h5>
                        <p class="text-muted small mt-3">Esta acción no se puede deshacer y puede afectar a los estudiantes inscritos.</p>
                    </div>
                    <div class="modal-body text-center d-none py-5" id="vista-cargando-delete">
                        <div class="spinner-border text-danger mb-3" role="status" style="width: 3rem; height: 3rem;"></div>
                        <h5>Eliminando...</h5>
                    </div>
                    <div class="modal-body text-center d-none py-4" id="vista-exito-delete">
                        <h1 class="display-1 text-danger mb-3">🗑️</h1>
                        <h3 class="text-danger">¡Eliminado!</h3>
                        <p class="text-muted" id="mensaje-exito-texto-delete"></p>
                    </div>
                    <div class="modal-footer" id="footer-normal-delete">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Sí, Eliminar</button>
                    </div>
                    <div class="modal-footer d-none" id="footer-exito-delete">
                        <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>   

    <script src="assets/static/js/components/dark.js"></script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/compiled/js/app.js"></script>

    <script>
        let todasLasCarreras = [];

        function cargarDatos() {
            fetch('api/carreras.php')
                .then(respuesta => respuesta.json())
                .then(datos => {
                    todasLasCarreras = datos; 
                    const tbody = document.getElementById('tabla-carreras');
                    const mensajeVacio = document.getElementById('mensaje-vacio');

                    if (datos.length === 0) {
                        tbody.innerHTML = ''; 
                        mensajeVacio.classList.remove('d-none');
                    } else {
                        mensajeVacio.classList.add('d-none');
                        renderTable(datos, tbody); 
                    }
                })
                .catch(error => console.error('Error al cargar:', error));
        }

        function renderTable(datos, tbody) {
            const filasHTML = datos.map(carrera => {
                return `
                    <tr>
                        <td class="fw-bold ps-4">#${carrera.degree_id}</td>
                        <td>${carrera.degree_name}</td>
                        <td><span class="text-muted">${carrera.faculty}</span></td>
                        <td class="pe-4">
                            <div class="d-flex justify-content-end flex-wrap gap-2">
                                <button class="btn btn-sm btn-outline-warning" 
                                    onclick="abrirModalEditar('${carrera.degree_id}', '${carrera.degree_name}', '${carrera.faculty}')">
                                    ✏️
                                </button>
                                <button class="btn btn-sm btn-outline-danger" 
                                    onclick="abrirModalBorrar('${carrera.degree_id}', '${carrera.degree_name}')">
                                    🗑️
                                </button>
                            </div>
                        </td>
                    </tr>
                `;
            });
            tbody.innerHTML = filasHTML.join('');
        }

        // ================= CREAR (POST) =================
        const formCrear = document.getElementById('form-crear');
        formCrear.addEventListener('submit', function(evento) {
            evento.preventDefault();
            const vistaForm = document.getElementById('vista-formulario');
            const vistaCarga = document.getElementById('vista-cargando');
            const vistaExito = document.getElementById('vista-exito');
            const footerNormal = document.getElementById('footer-normal');
            const footerExito = document.getElementById('footer-exito');

            vistaForm.classList.add('d-none'); footerNormal.classList.add('d-none'); vistaCarga.classList.remove('d-none');

            const datosNuevos = Object.fromEntries(new FormData(formCrear));

            fetch('api/carreras.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(datosNuevos)
            })
            .then(res => res.json())
            .then(resultado => {
                vistaCarga.classList.add('d-none');
                if (resultado.status === 'success') {
                    vistaExito.classList.remove('d-none'); footerExito.classList.remove('d-none');
                    document.getElementById('mensaje-exito-texto').innerText = resultado.mensaje;
                    cargarDatos(); 
                } else {
                    alert("Error: " + resultado.mensaje);
                    vistaForm.classList.remove('d-none'); footerNormal.classList.remove('d-none');
                }
            }).catch(() => { alert("Error de conexión"); vistaCarga.classList.add('d-none'); vistaForm.classList.remove('d-none'); footerNormal.classList.remove('d-none'); });
        });

        document.getElementById('createModal').addEventListener('hidden.bs.modal', function () {
            formCrear.reset();
            document.getElementById('vista-formulario').classList.remove('d-none'); document.getElementById('footer-normal').classList.remove('d-none');
            document.getElementById('vista-cargando').classList.add('d-none'); document.getElementById('vista-exito').classList.add('d-none'); document.getElementById('footer-exito').classList.add('d-none');
        });
        
        // ================= EDITAR (PUT) =================
        let modalEdicion;
        function abrirModalEditar(id, name, faculty) {
            document.getElementById('edit-degree-id').value = id;
            document.getElementById('edit-degree-name').value = name;
            document.getElementById('edit-faculty').value = faculty;

            document.getElementById('vista-formulario-edit').classList.remove('d-none'); document.getElementById('footer-normal-edit').classList.remove('d-none');
            document.getElementById('vista-cargando-edit').classList.add('d-none'); document.getElementById('vista-exito-edit').classList.add('d-none'); document.getElementById('footer-exito-edit').classList.add('d-none');

            modalEdicion = new bootstrap.Modal(document.getElementById('editModal'));
            modalEdicion.show();
        }

        const formEditar = document.getElementById('form-editar');
        formEditar.addEventListener('submit', function(evento) {
            evento.preventDefault(); 
            const vistaForm = document.getElementById('vista-formulario-edit'); const vistaCarga = document.getElementById('vista-cargando-edit');
            const vistaExito = document.getElementById('vista-exito-edit'); const footerNormal = document.getElementById('footer-normal-edit'); const footerExito = document.getElementById('footer-exito-edit');

            vistaForm.classList.add('d-none'); footerNormal.classList.add('d-none'); vistaCarga.classList.remove('d-none');

            const datosEditados = Object.fromEntries(new FormData(formEditar));

            fetch('api/carreras.php', {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(datosEditados)
            })
            .then(res => res.json())
            .then(resultado => {
                vistaCarga.classList.add('d-none');
                if (resultado.status === 'success') {
                    vistaExito.classList.remove('d-none'); footerExito.classList.remove('d-none');
                    document.getElementById('mensaje-exito-texto-edit').innerText = resultado.mensaje;
                    cargarDatos(); 
                } else {
                    alert("Error: " + resultado.mensaje);
                    vistaForm.classList.remove('d-none'); footerNormal.classList.remove('d-none');
                }
            }).catch(() => { alert("Error de conexión"); vistaCarga.classList.add('d-none'); vistaForm.classList.remove('d-none'); footerNormal.classList.remove('d-none'); });
        });

        // ================= BORRAR (DELETE) =================
        let modalBorrado;
        function abrirModalBorrar(id, name) {
            document.getElementById('delete-degree-id').value = id;
            document.getElementById('delete-nombre-display').innerText = name;

            document.getElementById('vista-formulario-delete').classList.remove('d-none'); document.getElementById('footer-normal-delete').classList.remove('d-none');
            document.getElementById('vista-cargando-delete').classList.add('d-none'); document.getElementById('vista-exito-delete').classList.add('d-none'); document.getElementById('footer-exito-delete').classList.add('d-none');

            modalBorrado = new bootstrap.Modal(document.getElementById('deleteModal'));
            modalBorrado.show();
        }

        const formBorrar = document.getElementById('form-borrar');
        formBorrar.addEventListener('submit', function(evento) {
            evento.preventDefault();
            const vistaForm = document.getElementById('vista-formulario-delete'); const vistaCarga = document.getElementById('vista-cargando-delete');
            const vistaExito = document.getElementById('vista-exito-delete'); const footerNormal = document.getElementById('footer-normal-delete'); const footerExito = document.getElementById('footer-exito-delete');

            vistaForm.classList.add('d-none'); footerNormal.classList.add('d-none'); vistaCarga.classList.remove('d-none');

            const id = document.getElementById('delete-degree-id').value;

            fetch('api/carreras.php', {
                method: 'DELETE',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ degree_id: id }) 
            })
            .then(res => res.json())
            .then(resultado => {
                vistaCarga.classList.add('d-none');
                if (resultado.status === 'success') {
                    vistaExito.classList.remove('d-none'); footerExito.classList.remove('d-none');
                    document.getElementById('mensaje-exito-texto-delete').innerText = resultado.mensaje;
                    cargarDatos(); 
                } else {
                    alert("Error: " + resultado.mensaje);
                    vistaForm.classList.remove('d-none'); footerNormal.classList.remove('d-none');
                }
            }).catch(() => { alert("Error de conexión"); vistaCarga.classList.add('d-none'); vistaForm.classList.remove('d-none'); footerNormal.classList.remove('d-none'); });
        });

        // ================= BUSCADOR EN TIEMPO REAL =================
        const inputBuscador = document.getElementById('buscador');
        inputBuscador.addEventListener('input', function(evento) {
            const textoBuscado = evento.target.value.toLowerCase();
            const tbody = document.getElementById('tabla-carreras');
            const carrerasFiltradas = todasLasCarreras.filter(carrera => {
                const datos = `${carrera.degree_id} ${carrera.degree_name} ${carrera.faculty}`.toLowerCase();
                return datos.includes(textoBuscado);
            });
            renderTable(carrerasFiltradas, tbody);
        });

        document.addEventListener('DOMContentLoaded', cargarDatos);
    </script>
</body>
</html>