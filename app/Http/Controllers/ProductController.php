<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function search(Request $request)
    {
        $perPage = !empty($request->input('per_page')) ? $request->input('per_page') : 10;
        $page = !empty($request->input('page')) ? $request->input('page') : 1;

        $product_name = $request->input('product_name', '');
        $description = $request->input('description', '');

        $query = Product::query();
        if (!empty($product_name)) {
            $query->where('product_name', 'like', '%' . $product_name . '%');
        }
        if (!empty($description)) {
            $query->where('description', 'like', '%' . $description . '%');
        }

        $items = $query->paginate($perPage, ['*'], 'page', $page)->toArray();

        if (empty($items['data'])) {
            $items = $query->paginate($perPage, ['*'], 'page', 1)->toArray();
        }

        if (!empty($items['data'])) {
            return response()->json($items['data']);
        }
        return response()->json([]);
    }

    public function create(Request $request)
    {
        $data = [
            'store_id' => $request->input('store_id', ''),
            'product_name' => $request->input('product_name', ''),
            'description' => $request->input('description', ''),
            'price' => $request->input('price', ''),
            'quantity' => $request->input('quantity', '')
        ];
        $model = new Product($data);
        if ($model->validateData($data)) {
            if ($model->save()) {
                return response()->json(['message' => 'Save Product Success'], 200);
            }
        }
        return response()->json(['message' => 'Save Product False'], 200);
    }

    public function update(Request $request)
    {
        $id = $request->input('id') ? intval($request->input('id')) : '';
        $model = Product::where('id', $id)->first();
        if (!empty($model)) {
            $model->store_id = !empty($request->input('store_id')) ? $request->input('store_id') : $model->store_id;
            $model->product_name = !empty($request->input('product_name')) ? $request->input('product_name') : $model->product_name;
            $model->description = !empty($request->input('description')) ? $request->input('description') : $model->description;
            $model->price = !empty($request->input('price')) ? (float)$request->input('price') : (float)$model->price;
            $model->quantity = !empty($request->input('quantity')) ? $request->input('quantity') : $model->quantity;

            if ($model->validateData($model->toArray())) {
                if ($model->save()) {
                    return response()->json(['message' => 'Update Product Success'], 200);
                }
            }
        }
        return response()->json(['message' => 'Update Product False'], 200);
    }

    public function delete($id)
    {
        $model = Product::where('id', $id)->first();
        if (!empty($model)) {
            if ($model->delete()) {
                return response()->json(['message' => 'Delete Product Success'], 200);
            }
            return response()->json(['message' => 'Delete Product False'], 200);
        }
        return response()->json(['message' => 'Delete Product False'], 200);
    }

    public function detail($id)
    {
        $model = Product::where('id', $id)->first();
        if (!empty($model)) {
            return response()->json(['message' => 'Get detail Product Success', 'data' => $model], 200);
        }
        return response()->json(['message' => 'Get detail Product Success', 'data' => []], 200);
    }
}
