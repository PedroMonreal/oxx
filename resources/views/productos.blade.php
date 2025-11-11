<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos OXXO API</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        #productos-lista { display: flex; flex-wrap: wrap; gap: 20px; margin-top: 20px; }
        .card-producto { border: 1px solid #ccc; padding: 15px; width: 200px; border-radius: 8px; box-shadow: 2px 2px 5px rgba(0,0,0,0.1); background-color: #f9f9f9; }
        .producto-precio { font-weight: bold; color: #e74c3c; font-size: 1.2em; }
    </style>
</head>
<body>

    <h1>Inventario de Productos OXXO (Desde API)</h1>

    <nav style="margin-bottom: 20px; padding: 10px; background-color: #eee; border-radius: 5px;">
        <a href="{{ url('/') }}" style="margin-right: 15px; text-decoration: none; font-weight: bold; color: #333;">Ver Inventario</a>
        <a href="{{ url('/crear') }}" style="margin-right: 15px; text-decoration: none; color: #007bff;">Agregar Producto</a>
        <a href="{{ url('/admin') }}" style="margin-right: 15px; text-decoration: none; color: #28a745;">Administrar (CRUD)</a>
    </nav>

    <div id="productos-lista">
        <p>Cargando productos...</p>
    </div>

    <script>
        // 1. Define la URL de tu API
        const API_URL = "{{ url('/api/productos') }}"; 
        const productosLista = document.getElementById('productos-lista');


        // Función para crear el HTML de un solo producto
       function crearCardProducto(producto) {
        // Convierte el string del precio a un número flotante (decimal)
        const precioNumerico = parseFloat(producto.precio);
        
        // Y luego aplica el toFixed(2)
        return `
            <div class="card-producto">
                <h3 class="producto-nombre">${producto.nombre}</h3>
                <p><strong>Marca:</strong> ${producto.marca}</p>
                <p><strong>Categoría:</strong> ${producto.categoria}</p>
                <p class="producto-precio">$${precioNumerico.toFixed(2)}</p> 
            </div>
        `;
     }

        // Función para obtener y mostrar los productos
        function cargarProductos() {
            // Utilizamos la API Fetch nativa de JavaScript
            fetch(API_URL)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al obtener la API: ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    // Borra el mensaje de "Cargando..."
                    productosLista.innerHTML = ''; 

                    // Verifica si hay datos y si la estructura es correcta (data.data)
                    if (data.status === 'success' && data.data.length > 0) {
                        
                        let htmlContenido = '';
                        data.data.forEach(producto => {
                            htmlContenido += crearCardProducto(producto);
                        });
                        
                        productosLista.innerHTML = htmlContenido;
                        
                    } else {
                        productosLista.innerHTML = '<p>No se encontraron productos o hubo un error en los datos de la API.</p>';
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    productosLista.innerHTML = `<p style="color: red;">Error al cargar los datos: ${error.message}. Verifica que Laragon y la API estén corriendo.</p>`;
                });
        }

        // Ejecuta la función al cargar la página
        cargarProductos();
    </script>

</body>
</html>