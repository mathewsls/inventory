<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Validator;

class productController extends Controller
{
    public function index() {
        $productos = Product::all();
        if ($productos->isEmpty()) {
            return response([
                'message' => 'No hay productos disponibles'
                ], 404);
        }

        return response()->json($productos, 200);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $producto = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,

        ]);
        if (!$producto) {
            $data = [
                'message' => 'Error al crear el estudiante',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'student' => $producto,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function show($id) {
        $producto = Product::find($id);
        if (!$producto) {
            return response([
                'message' => 'No se encontro el producto'
                ], 404);
                }
        return response()->json($producto, 200);
    }
    public function destroy($id) {
        $producto = Product::find($id);
        if (!$producto) {
            return response([
                'message' => 'No se encontro el producto'
                ], 404);
                }
        $producto->delete();
        return response()->json(['message' => 'Producto eliminado con exito'], 200);
        }

        public function update(Request $request, $id){
            $producto = Product::find($id);
            if (!$producto) {
                return response([
                    'message' => 'No se encontro el producto'
                    ], 404);
                    }
            $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'price' => 'required|numeric',
                    'description' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->messages()], 422);
                }
            $producto->name = $request->name;
            $producto->price = $request->price;
            $producto->description = $request->description;
            $producto->save();
            return response()->json(['message' => 'Producto actualizado con exito'], 200);
            }
}

