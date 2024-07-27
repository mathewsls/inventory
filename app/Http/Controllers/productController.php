<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use illuminate\support\Facades\Validator;

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
      $validator = Validator::make(
        $request->all(),
        [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }
        $productos = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            ]);
            return response()->json(['message' => 'Producto creado con exito'], 201);
    }
}
