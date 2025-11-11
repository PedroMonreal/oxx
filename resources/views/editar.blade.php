<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto #{{ $id }}</title>
    <style> /* Estilos básicos */
        body { font-family: Arial, sans-serif; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 15px; cursor: pointer; background-color: #3498db; color: white; border: none; border-radius: 4px; }
        .mensaje { padding: 10px; margin-top: 15px; border-radius: 5px; }
        .success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>

    <h1>Editar Producto #{{ $id }}</h1>

    <div id="mensaje-feedback" class="mensaje" style="display: none;"></div>
    
    <p id="loading-msg">Cargando datos del producto...</p>

    <form id="form-editar-producto" style="display: none;"> 
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" min="0" required>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <input type="text" id="categoria" name="categoria" required>
        </div>
        <button type="submit">Actualizar Producto</button>
    </form>
    
    <p><a href="{{ url('/admin') }}">Volver a Administración</a></p>

    <script>
        const PRODUCT_ID = {{ $id }};
        const API_URL = "{{ url('/api/productos') }}" + "/" + PRODUCT_ID;
        const form = document.getElementById('form-editar-producto');
        const feedback = document.getElementById('mensaje-feedback');
        const loadingMsg = document.getElementById('loading-msg');

        // Función para cargar los datos del producto actual (usando GET)
        function cargarDatosProducto() {
            fetch(API_URL)
                .then(response => response.json())
                .then(res => {
                    loadingMsg.style.display = 'none';
                    
                    if (res.status === 'success') {
                        const producto = res.data;
                        // Llenar el formulario con los datos actuales
                        document.getElementById('nombre').value = producto.nombre;
                        document.getElementById('marca').value = producto.marca;
                        // Aseguramos que el precio sea numérico para el input
                        document.getElementById('precio').value = parseFloat(producto.precio).toFixed(2);
                        document.getElementById('categoria').value = producto.categoria;
                        form.style.display = 'block'; // Mostrar el formulario
                    } else {
                        feedback.className = 'mensaje error';
                        feedback.style.display = 'block';
                        feedback.innerHTML = `Error: ${res.message}`;
                    }
                })
                .catch(error => {
                    loadingMsg.style.display = 'none';
                    feedback.className = 'mensaje error';
                    feedback.style.display = 'block';
                    feedback.innerHTML = `Error de red al cargar datos: ${error.message}`;
                });
        }
        
        // Función para enviar la actualización (Método PATCH)
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            feedback.style.display = 'none';

            const formData = new FormData(form);
            const productoData = Object.fromEntries(formData.entries());

            fetch(API_URL, {
                method: 'PATCH', // Usamos PATCH para actualizar el recurso
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Token de seguridad
                },
                body: JSON.stringify(productoData)
            })
            .then(response => response.json())
            .then(res => {
                feedback.style.display = 'block';
                if (res.status === 'success') {
                    feedback.className = 'mensaje success';
                    feedback.innerHTML = `**Éxito:** ${res.message}`;
                    // Recargar los datos para confirmar la actualización (opcional)
                    cargarDatosProducto(); 
                } else {
                    feedback.className = 'mensaje error';
                    let msg = res.message || 'Error desconocido al actualizar.';
                    if (res.status === 422 && res.body.errors) {
                        msg += '<br><ul>' + Object.values(res.body.errors).map(e => `<li>${e[0]}</li>`).join('') + '</ul>';
                    }
                    feedback.innerHTML = `**Error (${res.status}):** ${msg}`;
                }
            })
            .catch(error => {
                feedback.style.display = 'block';
                feedback.className = 'mensaje error';
                feedback.innerHTML = `**Error de red:** ${error.message}.`;
            });
        });

        // Iniciar la carga de datos al abrir la página
        cargarDatosProducto();
    </script>

</body>
</html>