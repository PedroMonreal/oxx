<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administración de Productos OXXO</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h1 { border-bottom: 2px solid #333; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn-action { padding: 5px 10px; margin-right: 5px; cursor: pointer; border-radius: 3px; }
        .btn-edit { background-color: #3498db; color: white; border: none; }
        .btn-delete { background-color: #e74c3c; color: white; border: none; }
        .success { color: #2ecc71; font-weight: bold; }
        .error { color: #e74c3c; font-weight: bold; }
    </style>
</head>
<body>

    <h1>Administración de Productos</h1>
    <p>
        <a href="{{ url('/crear') }}">Agregar Nuevo Producto</a> | 
        <a href="{{ url('/inventario') }}">Ver Inventario</a>
    </p>
    
    <div id="mensaje-feedback"></div>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="productos-tabla-cuerpo">
            <tr><td colspan="6">Cargando productos...</td></tr>
        </tbody>
    </table>

    <script>
        const API_URL = "{{ url('/api/productos') }}";
        const cuerpoTabla = document.getElementById('productos-tabla-cuerpo');
        const feedback = document.getElementById('mensaje-feedback');

        // Función para mostrar mensajes
        function mostrarMensaje(type, message) {
            feedback.innerHTML = `<p class="${type}">${message}</p>`;
            setTimeout(() => { feedback.innerHTML = ''; }, 5000);
        }

        // --- FUNCIONES CRUD DEL LADO DEL CLIENTE ---
        
        // 1. CARGAR Y LISTAR PRODUCTOS (READ)
        function cargarProductos() {
            cuerpoTabla.innerHTML = '<tr><td colspan="6">Cargando productos...</td></tr>';

            fetch(API_URL)
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success' && data.data.length > 0) {
                        cuerpoTabla.innerHTML = ''; // Limpiar mensaje de carga
                        data.data.forEach(producto => {
                            cuerpoTabla.innerHTML += crearFilaProducto(producto);
                        });
                    } else {
                        cuerpoTabla.innerHTML = '<tr><td colspan="6">No se encontraron productos.</td></tr>';
                    }
                })
                .catch(error => {
                    mostrarMensaje('error', `Error al cargar: ${error.message}.`);
                    cuerpoTabla.innerHTML = '<tr><td colspan="6" class="error">Fallo en la conexión API.</td></tr>';
                });
        }

        // 2. ELIMINAR PRODUCTO (DELETE)
        function eliminarProducto(id) {
            if (!confirm(`¿Estás seguro de que quieres eliminar el Producto #${id}?`)) {
                return; // Cancelar si el usuario no confirma
            }

            fetch(`${API_URL}/${id}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Token de seguridad de Laravel
                }
            })
            .then(res => res.json().then(data => ({status: res.status, body: data})))
            .then(res => {
                if (res.status === 200) {
                    mostrarMensaje('success', res.body.message);
                    cargarProductos(); // Recargar la tabla
                } else {
                    mostrarMensaje('error', res.body.message || 'Error desconocido al eliminar.');
                }
            })
            .catch(error => {
                mostrarMensaje('error', `Error de red: ${error.message}`);
            });
        }
        
        // 3. CREAR LA FILA HTML
        function crearFilaProducto(producto) {
            const precio = parseFloat(producto.precio).toFixed(2); // Asegura el formato
            
            return `
                <tr id="producto-${producto.id}">
                    <td>${producto.id}</td>
                    <td>${producto.nombre}</td>
                    <td>${producto.marca}</td>
                    <td>${producto.categoria}</td>
                    <td>$${precio}</td>
                    <td>
                        <button class="btn-action btn-edit" onclick="window.location='{{ url('/editar') }}/${producto.id}'">Editar</button>
                        <button class="btn-action btn-delete" onclick="eliminarProducto(${producto.id})">Eliminar</button>
                    </td>
                </tr>
            `;
        }

        // Ejecutar al cargar la página
        cargarProductos();
    </script>

</body>
</html>