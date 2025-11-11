<?php

namespace App\Http\Controllers; // <-- El namespace que debe coincidir con la línea 'use' en api.php

use App\Models\Product; // Importa el Modelo 'Product'
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Muestra una lista de todos los productos (Endpoint: GET /api/productos)
     */
    public function index()
    {
        // Obtiene todos los registros de la tabla 'productos'
        $productos = Product::all();

        // Retorna los datos como una respuesta JSON
        return response()->json([
            'status' => 'success',
            'total_productos' => count($productos),
            'data' => $productos
        ], 200);
    }
    
    /**
     * Muestra el producto especificado por ID (Endpoint: GET /api/productos/{id})
     */
    public function show(string $id)
    {
        // Busca el producto por su ID
        $producto = Product::find($id);

        // Si no se encuentra, devuelve un error 404 (Not Found)
        if (!$producto) {
            return response()->json([
                'status' => 'error',
                'message' => 'Producto no encontrado.'
            ], 404);
        }

        // Si se encuentra, devuelve los datos del producto en JSON
        return response()->json([
            'status' => 'success',
            'data' => $producto
        ], 200);
    }

    /**
    * Almacena un nuevo producto. (POST /api/productos)
    */

    public function store(Request $request)
    {
        // 1. Validación de los datos
        $request->validate([
            'nombre' => 'required|max:150',
            'marca' => 'required|max:100',
            'precio' => 'required|numeric|min:0',
            'categoria' => 'required|max:100',
        ]);

        // 2. Creación del producto en la base de datos
        $producto = Product::create($request->all());

        // 3. Retorna la respuesta
        return response()->json([
            'status' => 'success',
            'message' => 'Producto creado con éxito.',
            'data' => $producto
        ], 201); // 201 Created
    }

    /**
     * Actualiza el producto especificado. (PUT/PATCH /api/productos/{id})
     */
    public function update(Request $request, string $id)
    {
        // 1. Busca el producto por ID
        $producto = Product::find($id);

        if (!$producto) {
            return response()->json(['status' => 'error', 'message' => 'Producto no encontrado.'], 404);
        }
        
        // 2. Validación de los datos
        $request->validate([
            'nombre' => 'required|max:150',
            'precio' => 'required|numeric|min:0',
        ]);
        
        // 3. Actualización de los datos
        $producto->update($request->all());

        // 4. Retorna la respuesta
        return response()->json([
            'status' => 'success',
            'message' => 'Producto actualizado con éxito.',
            'data' => $producto
        ], 200);
    }

    /**
     * Elimina el producto especificado. (DELETE /api/productos/{id})
     */
    public function destroy(string $id)
    {
        $producto = Product::find($id);

        if (!$producto) {
            return response()->json(['status' => 'error', 'message' => 'Producto no encontrado.'], 404);
        }

        $producto->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Producto eliminado con éxito.'
        ], 200);
    }
}

