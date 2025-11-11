<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <style> /* Estilos básicos para el formulario */
        body { font-family: Arial, sans-serif; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; }
        .mensaje { padding: 10px; margin-top: 15px; border-radius: 5px; }
        .success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>

    <h1>Agregar Nuevo Producto</h1>

    <div id="mensaje-feedback" class="mensaje" style="display: none;"></div>

    <form id="form-crear-producto">
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
        <button type="submit">Guardar Producto</button>
    </form>
    
    <p><a href="{{ url('/inventario') }}">Volver al Inventario</a></p>

    <script>
        const form = document.getElementById('form-crear-producto');
        const feedback = document.getElementById('mensaje-feedback');
        const API_URL = "{{ url('/api/productos') }}"; // URL del endpoint POST

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            feedback.style.display = 'none';

            // 1. Recolectar datos del formulario
            const formData = new FormData(form);
            const productoData = Object.fromEntries(formData.entries());

            // 2. Enviar datos a la API (Método POST)
            fetch(API_URL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify(productoData)
            })
            .then(response => response.json().then(data => ({
                status: response.status,
                body: data
            })))
            .then(res => {
                feedback.style.display = 'block';
                
                if (res.status === 201) { // 201 Created
                    feedback.className = 'mensaje success';
                    feedback.innerHTML = `**Éxito:** ${res.body.message} (ID: ${res.body.data.id})`;
                    form.reset(); // Limpia el formulario
                } else {
                    // Manejar errores de validación (422) o de servidor (500)
                    feedback.className = 'mensaje error';
                    let msg = res.body.message || 'Error desconocido al guardar.';
                    if (res.status === 422 && res.body.errors) {
                        // Muestra errores de validación de Laravel
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
    </script>

</body>
</html>